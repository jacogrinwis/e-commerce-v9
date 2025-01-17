<?php

namespace App\Livewire\Shop;

use Spatie\Tags\Tag;
use App\Models\Color;
use Livewire\Component;
use App\Models\Category;
use App\Models\Material;
use Livewire\Attributes\Computed;

class ShopFilters extends Component
{
    #[Computed]
    public function counts()
    {
        return [
            'categories' => Category::count(),
            'colors' => Color::count(),
            'materials' => Material::count(),
            'tags' => Tag::count(),
        ];
    }

    public function render()
    {
        return view('livewire.shop.shop-filters', [
            'categories' => Category::withCount('products')->get(),
            'colors' => Color::withCount('products')->get(),
            'materials' => Material::withCount('products')->get(),
            'tags' => Tag::all(),
        ]);
    }
}
