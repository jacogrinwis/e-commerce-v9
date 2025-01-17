<x-shop.shop-filters>

    <livewire:shop.shop-filter
        title="Categories"
        :items="$categories"
        :count="$categories->count()"
    />
    <livewire:shop.shop-filter
        title="Colors"
        :items="$colors"
        :count="$colors->count()"
    />
    <livewire:shop.shop-filter
        title="Materials"
        :items="$materials"
        :count="$materials->count()"
    />
    <livewire:shop.shop-filter
        title="Tags"
        :items="$tags"
        :count="$tags->count()"
    />

</x-shop.shop-filters>
