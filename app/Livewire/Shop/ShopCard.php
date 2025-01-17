<?php

namespace App\Livewire\Shop;

use Livewire\Component;

class ShopCard extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.shop.shop-card');
    }
}
