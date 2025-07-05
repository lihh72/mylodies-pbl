<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart as CartModel;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CartComponent extends Component
{
    public $cartItems = [];
    public $quantities = [];
    public $globalStartDate;
    public $globalEndDate;
    public $minDate;
public $datesMismatch = false;

    public function mount()
    {
        $this->minDate = now()->format('m/d/Y'); // Format untuk Flowbite
        $this->loadCart();
    }

    public function loadCart()
{
    $cart = CartModel::with('items.product')->where('user_id', Auth::id())->first();
    $this->cartItems = $cart ? $cart->items : collect();
    $this->quantities = [];
    $this->datesMismatch = false;


    foreach ($this->cartItems as $item) {
        if (!$item->product || $item->product->stock <= 0) {
            $item->delete();
            continue;
        }

        if ($item->quantity > $item->product->stock) {
            $item->quantity = $item->product->stock;
            $days = Carbon::parse($item->start_date)->diffInDays(Carbon::parse($item->end_date)) + 1;
            $item->total_price = $item->product->rental_price_per_day * $days * $item->quantity;
            $item->save();

            $this->dispatch('cartError', message: "Qty untuk {$item->product->name} disesuaikan karena stok berubah.");
        }

        $this->quantities[$item->id] = $item->quantity;
    }

    // Filter ulang
    $this->cartItems = $this->cartItems->filter(fn ($item) => $item->product && $item->product->stock > 0)->values();

    // ✅ Validasi: Semua tanggal sewa harus sama
    if ($this->cartItems->count() > 0) {
        $firstStart = $this->cartItems[0]->start_date;
        $firstEnd = $this->cartItems[0]->end_date;

        foreach ($this->cartItems as $item) {
            if ($item->start_date !== $firstStart || $item->end_date !== $firstEnd) {
    $this->datesMismatch = true;
    $this->dispatch('cartError', message: 'Tanggal sewa antar produk tidak konsisten. Harap samakan sebelum checkout.');
    break;
}

        }
    }
}


    public function increment($itemId)
    {
        $item = CartItem::with('product')->find($itemId);

        if (!$item || $item->cart->user_id !== Auth::id()) return;

        $currentQty = $this->quantities[$itemId] ?? 0;
        $availableStock = $item->product->stock;

        if ($currentQty < $availableStock) {
            $this->quantities[$itemId]++;
            $this->updateItem($itemId);
        } else {
            $this->dispatch('cartError', message: 'Stok tidak mencukupi untuk produk ini.');
        }
    }

    public function decrement($itemId)
    {
        if ($this->quantities[$itemId] > 1) {
            $this->quantities[$itemId]--;
            $this->updateItem($itemId);
        } else {
            $this->deleteItem($itemId);
        }
    }

    public function updateItem($itemId)
    {
        $item = CartItem::with('product')->find($itemId);

        if ($item && $item->cart->user_id === Auth::id()) {
            if (!$item->product || $item->product->stock <= 0) {
                $this->deleteItem($itemId);
                $this->dispatch('cartError', message: 'Produk sudah tidak tersedia dan dihapus dari keranjang.');
                return;
            }

            $days = Carbon::parse($item->start_date)->diffInDays(Carbon::parse($item->end_date)) + 1;
            $qty = $this->quantities[$itemId];

            if ($qty > $item->product->stock) {
                $qty = $item->product->stock;
                $this->quantities[$itemId] = $qty;
                $this->dispatch('cartError', message: 'Jumlah produk melebihi stok, disesuaikan otomatis.');
            }

            $item->quantity = $qty;
            $item->total_price = $item->product->rental_price_per_day * $days * $qty;
            $item->save();
        }

$this->loadCart();
$this->dispatch('cartSuccess', message: 'Tanggal sewa berhasil diterapkan ke semua item.');
$this->dispatch('cartUpdated')->self(); // ✅ untuk trigger ke diri sendiri (tidak berguna di kasus ini)
$this->dispatch('cartUpdated')->to(CartSummaryComponent::class); // ✅ spesifik ke komponen tujuan


 // 🚀 trigger update ke komponen lain seperti summary

    }

    public function deleteItem($itemId)
    {
        $item = CartItem::find($itemId);
        if ($item && $item->cart->user_id === Auth::id()) {
            $item->delete();
        }

        $this->loadCart();
        $this->dispatch('cartUpdated');
    }

    public function updateRentalDates()
    {
        if (!$this->globalStartDate || !$this->globalEndDate) {
            $this->dispatch('cartError', message: 'Silakan isi tanggal sewa lengkap.');
            return;
        }

        try {
            $start = Carbon::createFromFormat('m/d/Y', $this->globalStartDate);
            $end = Carbon::createFromFormat('m/d/Y', $this->globalEndDate);
        } catch (\Exception $e) {
            $this->dispatch('cartError', message: 'Format tanggal tidak valid.');
            return;
        }

        if ($start->gt($end)) {
            $this->dispatch('cartError', message: 'Tanggal mulai tidak boleh melebihi tanggal akhir.');
            return;
        }

        foreach ($this->cartItems as $item) {
            $product = $item->product;
            if (!$product || $product->stock <= 0) continue;

            $item->start_date = $start->format('Y-m-d');
            $item->end_date = $end->format('Y-m-d');
            $days = $start->diffInDays($end) + 1;
            $qty = $this->quantities[$item->id] ?? 1;

            $item->total_price = $product->rental_price_per_day * $days * $qty;
            $item->save();
        }

        $this->loadCart();
        $this->dispatch('cartSuccess', message: 'Tanggal sewa berhasil diterapkan ke semua item.');

$this->dispatch('cartUpdated')->self(); // ✅ untuk trigger ke diri sendiri (tidak berguna di kasus ini)
$this->dispatch('cartUpdated')->to(CartSummaryComponent::class); // ✅ spesifik ke komponen tujuan

    }

    #[\Livewire\Attributes\On('inputDateChanged')]
    public function syncDateFromJS($type, $value)
    {
        if ($type === 'start') {
            $this->globalStartDate = $value;
        } elseif ($type === 'end') {
            $this->globalEndDate = $value;
        }

        // Jika ingin auto update setelah dua tanggal terisi, aktifkan:
        // if ($this->globalStartDate && $this->globalEndDate) {
        //     $this->updateRentalDates();
        // }
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}
