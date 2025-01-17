<?php

namespace App\Livewire\Webshop;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Log;

class ProductFilter extends Component
{
    public $title;
    public $type;
    public $items;
    public $counts = [];
    public $selected = [];

    public function mount($title, $type, $items, $counts = [])
    {
        $this->title = $title;
        $this->type = $type;
        $this->items = $items;
        $this->counts = $counts;
    }

    #[Computed]
    public function filteredItems()
    {
        return $this->items;
    }

    public function updatedSelected()
    {
        $this->dispatch('filter-updated', [
            'type' => $this->type,
            'selected' => array_values($this->selected)
        ]);
    }

    public function render()
    {
        return view('livewire.webshop.product-filter');
    }
}
