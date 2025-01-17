<div class="space-y-6">
    <div>
        <h2 class="mb-1">
            <span class="text-lg font-semibold">Categories ({{ $counts['categories'] }})</span>
            @if (count($selectedCategories) > 0)
                <button
                    wire:click="resetSelectedCategories"
                    class="ms-2 inline-flex items-center gap-1 text-sm text-primary-600 hover:underline"
                >
                    <svg
                        class="h-3 w-3 text-primary-600"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 9h13a5 5 0 0 1 0 10H7M3 9l4-4M3 9l4 4"
                        />
                    </svg>
                    Reset
                </button>
            @endif
        </h2>
        <div>
            @foreach ($categories as $category)
                <div class="mb-1">
                    <label for="category-{{ $category->id }}">
                        <input
                            wire:model.live="selectedCategories"
                            type="checkbox"
                            id="category-{{ $category->id }}"
                            value="{{ $category->id }}"
                            class="mr-1 h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"
                        />
                        {{ $category->name }} ({{ $category->products_count }})
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div>
        <h2 class="mb-1">
            <span class="text-lg font-semibold">Colors ({{ $counts['colors'] }})</span>
            @if (count($selectedColors) > 0)
                <button
                    wire:click="resetSelectedColors"
                    class="ms-2 inline-flex items-center gap-1 text-sm text-primary-600 hover:underline"
                >
                    <svg
                        class="h-3 w-3 text-primary-600"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 9h13a5 5 0 0 1 0 10H7M3 9l4-4M3 9l4 4"
                        />
                    </svg>
                    Reset
                </button>
            @endif
        </h2>
        <div>
            @foreach ($colors as $color)
                <div class="mb-1">
                    <label for="color-{{ $color->id }}">
                        <input
                            wire:model.live="selectedColors"
                            type="checkbox"
                            id="color-{{ $color->id }}"
                            value="{{ $color->id }}"
                            class="mr-1 h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"
                        />
                        {{ $color->name }} ({{ $color->products_count }})
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    <div>
        <h2 class="mb-1">
            <span class="text-lg font-semibold">Materials ({{ $counts['materials'] }})</span>
            @if (count($selectedMaterials) > 0)
                <button
                    wire:click="resetSelectedMaterials"
                    class="ms-2 inline-flex items-center gap-1 text-sm text-primary-600 hover:underline"
                >
                    <svg
                        class="h-3 w-3 text-primary-600"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 9h13a5 5 0 0 1 0 10H7M3 9l4-4M3 9l4 4"
                        />
                    </svg>
                    Reset
                </button>
            @endif
        </h2>
        <div>
            @foreach ($materials as $material)
                <div class="mb-1">
                    <label for="material-{{ $material->id }}">
                        <input
                            wire:model.live="selectedMaterials"
                            type="checkbox"
                            id="material-{{ $material->id }}"
                            value="{{ $material->id }}"
                            class="mr-1 h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"
                        />
                        {{ $material->name }} ({{ $material->products_count }})
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    <div>
        <h2 class="mb-1">
            <span class="text-lg font-semibold">Beschikbaarheid{{-- ({{ $counts['stockStatuses'] }}) --}}</span>
            @if (count($selectedStockStatuses) > 0)
                <button
                    wire:click="resetSelectedStockStatuses"
                    class="ms-2 inline-flex items-center gap-1 text-sm text-primary-600 hover:underline"
                >
                    <svg
                        class="h-3 w-3 text-primary-600"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 9h13a5 5 0 0 1 0 10H7M3 9l4-4M3 9l4 4"
                        />
                    </svg>
                    Reset
                </button>
            @endif
        </h2>
        <div>
            @foreach ($stockStatuses as $status => $count)
                <div class="mb-1">
                    <label for="stock-status-{{ $status }}">
                        <input
                            wire:model.live="selectedStockStatuses"
                            type="checkbox"
                            id="stock-status-{{ $status }}"
                            value="{{ $status }}"
                            class="mr-1 h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"
                        />
                        {{ $this->getStockStatusLabel($status) }} ({{ $count }})
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    <div>
        <h2 class="mb-1">
            <span class="text-lg font-semibold">Tags ({{ $counts['tags'] }})</span>
            @if (count($selectedTags) > 0)
                <button
                    wire:click="resetSelectedTags"
                    class="ms-2 inline-flex items-center gap-1 text-sm text-primary-600 hover:underline"
                >
                    <svg
                        class="h-3 w-3 text-primary-600"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 9h13a5 5 0 0 1 0 10H7M3 9l4-4M3 9l4 4"
                        />
                    </svg>
                    Reset
                </button>
            @endif
        </h2>
        <div>
            @foreach ($tags as $tag)
                <div class="mb-1">
                    <label for="tag-{{ $tag->id }}">
                        <input
                            wire:model.live="selectedTags"
                            type="checkbox"
                            id="tag-{{ $tag->id }}"
                            value="{{ $tag->id }}"
                            class="mr-1 h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"
                        />
                        {{ $tag->name }} ({{ $tag->products_count }})
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div>
        <livewire:demo.products.product-filter-block
            :items="$categories"
            title="Categories"
        />
    </div>
    <div>
        <livewire:demo.products.product-filter-block
            :items="$colors"
            title="Colors"
        />
    </div>
    <div>
        <livewire:demo.products.product-filter-block
            :items="$materials"
            title="Materials"
        />
    </div>
    <div>
        <livewire:demo.products.product-filter-block
            :items="$tags"
            title="Tags"
        />
    </div>
    <div>
        <livewire:demo.products.product-filter-block
            :items="$stockStatuses"
            title="Beschikbaarheid"
        />
    </div>
</div>
