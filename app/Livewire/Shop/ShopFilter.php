<?php

namespace App\Livewire\Shop;

use Livewire\Component;
use App\Enums\StockStatus;
use Livewire\Attributes\Computed;

class ShopFilter extends Component
{
    public $items;
    public $selectedItems = [];
    public $title;
    public $count;

    public function updatedSelectedItems()
    {
        // dump('Dispatching:', [
        //     'type' => strtolower($this->title),
        //     'items' => $this->selectedItems
        // ]);

        $this->dispatch('filters-updated', [
            'type' => strtolower($this->title),
            'items' => $this->selectedItems
        ]);
    }

    #[Computed]
    public function filteredItems()
    {
        return match (strtolower($this->title)) {
            'categories' => \App\Models\Category::withCount('products')->get()->toArray(),
            'colors' => \App\Models\Color::withCount('products')->get()->toArray(),
            'materials' => \App\Models\Material::withCount('products')->get()->toArray(),
            'tags' => \Spatie\Tags\Tag::select('tags.*')
                ->leftJoin('taggables', 'tags.id', '=', 'taggables.tag_id')
                ->where('taggables.taggable_type', 'App\Models\Product')
                ->groupBy('tags.id')
                ->selectRaw('COUNT(taggables.taggable_id) as products_count')
                ->get()
                ->map(fn($tag) => [
                    'id' => $tag->id,
                    'name' => $tag->name,
                    'products_count' => $tag->products_count
                ])
                ->toArray(),
            'beschikbaarheid' => collect([
                ['id' => StockStatus::InStock->value, 'name' => StockStatus::InStock->label()],
                ['id' => StockStatus::OnOrder->value, 'name' => StockStatus::OnOrder->label()],
                ['id' => StockStatus::OutOfStock->value, 'name' => StockStatus::OutOfStock->label()],
            ])->toArray(),
        };
    }

    public function mount($title)
    {
        $this->title = $title;
        $this->items = $this->filteredItems();
    }

    public function render()
    {
        return view('livewire.shop.shop-filter');
    }
}
