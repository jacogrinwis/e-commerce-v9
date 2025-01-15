<?php

namespace App\Livewire\Cart;

use App\Facades\Cart;
use Livewire\Component;
use Livewire\Attributes\On;

class CartOverview extends Component
{
    public function removeItem($productId)
    {
        Cart::removeFromCart($productId);
    }

    // #[On('cart-updated')]
    public function updateQuantity($productId, $quantity)
    {
        Cart::updateQuantity($productId, $quantity);
    }

    public function render()
    {
        return view('livewire.cart.cart-overview', [
            'cartItems' => Cart::getCartItems(),
            'subtotal' => Cart::getSubtotal(),
            'itemCount' => Cart::getItemCount(),
        ]);
    }
}
