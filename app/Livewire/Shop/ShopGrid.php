<?php

namespace App\Livewire\Shop;

use Livewire\Component;
use Livewire\Attributes\On;

class ShopGrid extends Component
{
    public $products;

    #[On('products-updated')]
    public function render()
    {
        return view('livewire.shop.shop-grid', [
            'products' => $this->products
        ]);
    }
}
