<?php

namespace App\Livewire\Products;

use Livewire\Component;
use Livewire\Attributes\On;

class ProductSelectedFilters extends Component
{
    public $selectedCategories = [];
    public $selectedColors = [];
    public $selectedMaterials = [];
    public $selectedTags = [];
    public $selectedStockStatuses = [];

    #[On('applyCategoryFilter')]
    public function updateCategorySelection($categories)
    {
        $this->selectedCategories = $categories;
    }

    public function removeCategorySelection($id)
    {
        $this->selectedCategories = array_diff($this->selectedCategories, [$id]);
        $this->dispatch('updateCategorySelection', $this->selectedCategories);
    }



    #[On('applyColorFilter')]
    public function updateColorSelection($colors)
    {
        $this->selectedColors = $colors;
    }

    public function removeColorSelection($id)
    {
        $this->selectedColors = array_diff($this->selectedColors, [$id]);
        $this->dispatch('updateColorSelection', $this->selectedColors);
    }



    #[On('applyMaterialFilter')]
    public function updateMaterialSelection($materials)
    {
        $this->selectedMaterials = $materials;
    }

    public function removeMaterialSelection($id)
    {
        $this->selectedMaterials = array_diff($this->selectedMaterials, [$id]);
        $this->dispatch('updateMaterialSelection', $this->selectedMaterials);
    }


    #[On('applyTagFilter')]
    public function updateTagSelection($tags)
    {
        $this->selectedTags = $tags;
    }

    public function removeTagSelection($tagName)
    {
        $this->selectedTags = array_diff($this->selectedTags, [$tagName]);
        $this->dispatch('updateTagSelection', $this->selectedTags);
    }


    #[On('applyStockStatusFilter')]
    public function updateStockStatusSelection($stockStatuses)
    {
        $this->selectedStockStatuses = $stockStatuses;
    }

    public function removeStockStatusSelection($id)
    {
        $this->selectedStockStatuses = array_diff($this->selectedStockStatuses, [$id]);
        $this->dispatch('updateStockStatusSelection', $this->selectedStockStatuses);
    }

    public function getStockStatusLabel($status)
    {
        $labels = [
            1 => 'Op voorraad',
            2 => 'Op bestelling',
            3 => 'Tijdelijk uitverkocht'
        ];
        return $labels[$status] ?? 'Unknown';
    }



    public function clearAllFilters()
    {
        $this->selectedCategories = [];
        $this->selectedColors = [];
        $this->selectedMaterials = [];
        $this->selectedTags = [];
        $this->selectedStockStatuses = [];
        $this->dispatch('resetAllFilters');
    }

    public function render()
    {
        return view('livewire.products.product-selected-filters');
    }
}
