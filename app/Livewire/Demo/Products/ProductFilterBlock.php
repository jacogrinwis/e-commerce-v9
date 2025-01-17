<?php

namespace App\Livewire\Demo\Products;

use Livewire\Component;
use App\Enums\StockStatus;
use Livewire\Attributes\Computed;

class ProductFilterBlock extends Component
{
    public $items;
    public $selectedItems = [];
    public $title;

    #[Computed]
    public function filteredItems()
    {
        return match (strtolower($this->title)) {
            'categories' => \App\Models\Category::all()->toArray(),
            'colors' => \App\Models\Color::all()->toArray(),
            'materials' => \App\Models\Material::all()->toArray(),
            'tags' => \Spatie\Tags\Tag::all()->map(fn($tag) => [
                'id' => $tag->id,
                'name' => $tag->name
            ])->toArray(),
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

    public function updatedSelectedItems()
    {
        $this->dispatch("update{$this->title}Selection", $this->selectedItems);
    }

    public function render()
    {
        // $categories = \App\Models\Category::all();

        return view('livewire.demo.products.product-filter-block');
    }
}
