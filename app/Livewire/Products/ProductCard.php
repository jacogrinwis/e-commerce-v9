<?php

namespace App\Livewire\Products;

use App\Facades\Cart;
use Livewire\Component;

class ProductCard extends Component
{
    public $product;

    public function addToCart($productId)
    {
        Cart::addToCart($productId);

        $this->dispatch('cart-updated');
    }

    public function render()
    {
        return view('livewire.products.product-card');
    }
}
