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

        // Inisialisasi quantity berdasarkan database
        $this->quantities = [];
        foreach ($this->cartItems as $item) {
            $this->quantities[$item->id] = $item->quantity;
        }
    }

    public function increment($itemId)
    {
        $this->quantities[$itemId]++;
        $this->updateItem($itemId);
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
            $days = Carbon::parse($item->start_date)->diffInDays(Carbon::parse($item->end_date)) + 1;
            $item->quantity = $this->quantities[$itemId];
            $item->total_price = $item->product->rental_price_per_day * $days * $item->quantity;
            $item->save();
        }

        $this->loadCart(); // refresh total
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
