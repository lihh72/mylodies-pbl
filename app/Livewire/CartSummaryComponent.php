<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartSummaryComponent extends Component
{
    public $total = 0;
    public $count = 0;

    protected $listeners = ['cartUpdated' => 'calculateSummary'];

    public function mount()
    {
        $this->calculateSummary();
    }

    public function calculateSummary()
    {
        $cart = Cart::with('items')->where('user_id', Auth::id())->first();
        $this->count = $cart ? $cart->items->sum('quantity') : 0;
        $subtotal = $cart ? $cart->items->sum('total_price') : 0;
        $this->total = $subtotal + 3000;
    }

    public function render()
    {
        return view('livewire.cart-summary-component');
    }
}
