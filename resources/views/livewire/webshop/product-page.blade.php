<div class="container mt-6 grid grid-cols-4 gap-6 rounded-lg border border-green-200 bg-green-50 p-4 shadow">

    <div class="col-span-1 space-y-4 rounded-lg border border-red-100 bg-red-50 p-4 shadow">

        <livewire:webshop.product-filter
            title="Categories"
            type="categories"
            :items="$this->categories"
            :counts="$filterCounts['categories']"
        />

        <livewire:webshop.product-filter
            :wire:key="'color-filter-'.count($this->colors)"
            title="Colors"
            type="colors"
            :items="$this->colors"
            :counts="$filterCounts['colors']"
        />

        <livewire:webshop.product-filter
            :wire:key="'material-filter-'.count($this->materials)"
            title="Materials"
            type="materials"
            :items="$this->materials"
            :counts="$filterCounts['materials']"
        />

        <livewire:webshop.product-filter
            title="Tags"
            type="tags"
            :items="$this->tags"
            :counts="$filterCounts['tags']"
        />

        <livewire:webshop.product-filter
            title="Beschikbaarheid"
            type="stock_statuses"
            :items="$this->stockStatuses"
            :counts="$filterCounts['stock_statuses']"
        />

    </div>

    <div class="col-span-3 grid auto-rows-min grid-cols-4 gap-4 rounded-lg border border-red-100 bg-red-50 p-4 shadow">

        @foreach ($products as $product)
            <div class="col-span-1 rounded-lg border border-blue-200 bg-blue-50 p-4 shadow">
                <img
                    src="{{ asset($product->cover) }}"
                    alt="{{ $product->name }}"
                    class="aspect-square w-full rounded object-cover"
                >
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->formatted_price }}</p>
            </div>
        @endforeach

    </div>

</div>
