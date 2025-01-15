<div>
    <div class="flex flex-wrap items-center gap-2">
        @if (
            !empty($selectedCategories) ||
                !empty($selectedColors) ||
                !empty($selectedMaterials) ||
                !empty($selectedTags) ||
                !empty($selectedStockStatuses))
            <button
                wire:click="clearAllFilters"
                class="flex items-center justify-center gap-2 rounded border border-primary-600 bg-primary-600 px-3 py-1 text-white hover:bg-primary-700"
            >
                <svg
                    class="h-4 w-4 text-white dark:text-gray-800"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        fill-rule="evenodd"
                        d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                        clip-rule="evenodd"
                    />
                </svg>

                Wis alle filters
            </button>
        @endif

        @foreach ($selectedCategories as $categoryId)
            <button
                wire:click="removeCategorySelection({{ $categoryId }})"
                class="text-gary-900 rounded border border-gray-300 bg-gray-100 px-3 py-1 hover:bg-gray-200"
            >
                {{ \App\Models\Category::find($categoryId)->name }} ×
            </button>
        @endforeach

        @foreach ($selectedColors as $colorId)
            <button
                wire:click="removeColorSelection({{ $colorId }})"
                class="text-gary-900 rounded border border-gray-300 bg-gray-100 px-3 py-1 hover:bg-gray-200"
            >
                {{ \App\Models\Color::find($colorId)->name }} ×
            </button>
        @endforeach

        @foreach ($selectedMaterials as $materialId)
            <button
                wire:click="removeMaterialSelection({{ $materialId }})"
                class="text-gary-900 flex items-center justify-center gap-2 rounded border border-gray-300 bg-gray-100 px-3 py-1 hover:bg-gray-200"
            >
                {{ \App\Models\Material::find($materialId)->name }} ×

            </button>
        @endforeach

        @foreach ($selectedTags as $tagId)
            @php
                $tag = \Spatie\Tags\Tag::find($tagId);
            @endphp
            <button
                wire:click="removeTagSelection({{ $tagId }})"
                class="text-gary-900 flex items-center gap-2 rounded border border-gray-300 bg-gray-100 px-3 py-1 hover:bg-gray-200"
            >
                {{ $tag->name }} ×
            </button>
        @endforeach

        @foreach ($selectedStockStatuses as $statusId)
            <button
                wire:click="removeStockStatusSelection({{ $statusId }})"
                class="text-gary-900 flex items-center gap-2 rounded border border-gray-300 bg-gray-100 px-3 py-1 hover:bg-gray-200"
            >
                {{ $this->getStockStatusLabel($statusId) }} ×
            </button>
        @endforeach

    </div>
</div>
