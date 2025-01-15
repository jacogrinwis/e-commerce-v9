<?php

namespace App\Livewire\Cart;

use App\Facades\Cart;
use Livewire\Component;
use Livewire\Attributes\On;

class MiniCart extends Component
{
    // public $cartItems;
    // public $subtotal;
    // public $itemCount;

    // private function reloadCart()
    // {
    //     $this->cartItems = Cart::getCartItems();
    //     $this->subtotal = Cart::getSubtotal();
    //     $this->itemCount = Cart::getItemCount();
    // }

    // public function mount()
    // {
    //     $this->reloadCart();
    // }

    #[On('cart-updated')]
    public function updateCart()
    {
        // $this->reloadCart();
        $this->render();
    }

    // #[On('cart-updated')]
    public function removeItem($productId)
    {
        Cart::removeFromCart($productId);
        // $this->reloadCart();
        $this->dispatch('cart-updated');
    }

    // #[On('cart-updated')]
    // public function updateQuantity($productId, $quantity)
    // {
    //     Cart::updateQuantity($productId, $quantity);
    // }

    public function render()
    {
        return view('livewire.cart.mini-cart', [
            'cartItems' => Cart::getCartItems(),
            'subtotal' => Cart::getSubtotal(),
            'itemCount' => Cart::getItemCount(),
        ]);
    }
}
