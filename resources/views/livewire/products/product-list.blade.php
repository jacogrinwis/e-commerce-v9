<div class="container my-16 gap-6 lg:grid lg:grid-cols-4">
    <aside class="hidden lg:block">
        <livewire:products.product-filters />
    </aside>
    <main class="space-y-4 lg:col-span-3">
        <div class="grid grid-cols-2 gap-x-2 gap-y-2 sm:grid-cols-3 xl:grid-cols-4">
            <div class="col-span-2 sm:col-span-3 lg:col-span-2 xl:col-span-3">
                <livewire:products.product-search />
            </div>
            <div class="col-span-1 lg:hidden">
                @include('partials.products.product-filter-trigger')
            </div>
            <div class="col-span-1 sm:col-end-4 lg:col-span-1">
                <livewire:products.product-sort />
            </div>
        </div>
        <livewire:products.product-selected-filters />
        <livewire:products.product-count />
        @include('partials.products.product-list')
    </main>
</div>
