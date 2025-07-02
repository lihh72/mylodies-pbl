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
    public $quantities = []; // NEW

    public function mount()
    {
        $this->loadCart();
    }

public function loadCart()
{
    $cart = CartModel::with('items.product')->where('user_id', Auth::id())->first();
    $this->cartItems = $cart ? $cart->items : collect();

    $this->quantities = [];

    foreach ($this->cartItems as $item) {
        // Jika produk tidak ditemukan atau stok kosong, hapus item dari cart
        if (!$item->product || $item->product->stock <= 0) {
            $item->delete();
            continue;
        }

        // ⛔ Jika kuantitas melebihi stok, paksa disamakan
        if ($item->quantity > $item->product->stock) {
            $item->quantity = $item->product->stock;

            // Hitung ulang harga total berdasarkan durasi sewa
            $days = Carbon::parse($item->start_date)->diffInDays(Carbon::parse($item->end_date)) + 1;
            $item->total_price = $item->product->rental_price_per_day * $days * $item->quantity;

            $item->save();

            // Optional: notifikasi bahwa qty telah disesuaikan
            $this->dispatch('cartError', message: "Qty untuk produk {$item->product->name} disesuaikan karena stok berubah.");
        }

        // Simpan ke properti quantities (untuk input tampilan)
        $this->quantities[$item->id] = $item->quantity;
    }

    // Filter ulang untuk hanya item valid
    $this->cartItems = $this->cartItems->filter(function ($item) {
        return $item->product && $item->product->stock > 0;
    })->values();
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
        // Optional: tampilkan notifikasi ke frontend
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
            $this->dispatch('cartError', message: 'Produk ini sudah tidak tersedia dan dihapus dari keranjang.');
            return;
        }

        $days = Carbon::parse($item->start_date)->diffInDays(Carbon::parse($item->end_date)) + 1;

        // 🔒 Cek dan batasi quantity terhadap stok
        $qty = $this->quantities[$itemId];
        if ($qty > $item->product->stock) {
            $qty = $item->product->stock;
            $this->quantities[$itemId] = $qty;

            // ❗ Tampilkan notifikasi jika dipaksa turun
            $this->dispatch('cartError', message: 'Jumlah produk melebihi stok, disesuaikan otomatis.');
        }

        $item->quantity = $qty;
        $item->total_price = $item->product->rental_price_per_day * $days * $qty;
        $item->save();
    }

    $this->loadCart();
    $this->dispatch('cartUpdated');
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

    public function render()
    {
        return view('livewire.cart-component');
    }
}
