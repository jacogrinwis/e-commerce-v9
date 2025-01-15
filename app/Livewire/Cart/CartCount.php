<?php

namespace App\Livewire\Cart;

use App\Facades\Cart;
use Livewire\Component;
use Livewire\Attributes\On;

class CartCount extends Component
{
    public $itemCount;

    private function refreshCount()
    {
        $this->itemCount = Cart::getItemCount();
    }

    public function mount()
    {
        $this->refreshCount();
    }

    #[On('cart-updated')]
    public function updateCart()
    {
        $this->refreshCount();
    }

    // public function removeItem($productId)
    // {
    //     Cart::removeFromCart($productId);
    // }

    // #[On('cart-updated')]
    // public function updateQuantity($productId, $quantity)
    // {
    //     Cart::updateQuantity($productId, $quantity);
    // }

    public function render()
    {
        return view('livewire.cart.cart-count', [
            'cartItems' => Cart::getCartItems(),
            'subtotal' => Cart::getSubtotal(),
            'itemCount' => Cart::getItemCount(),
        ]);
    }
}
