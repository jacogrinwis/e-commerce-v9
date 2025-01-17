<x-shop.shop-main>

    <livewire:shop.shop-filters />
    <livewire:shop.shop-grid
        :products="$products"
        wire:key="products-grid"
    />

</x-shop.shop-main>
