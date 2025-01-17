<div>
    <div x-data="{
        open: true,
        items: @entangle('items'),
        limit: 3,
        get visibleItems() {
            return this.showAll ? this.items : this.items.slice(0, this.limit)
        },
        showAll: false
    }">
        <button
            @click="open = !open"
            class="w-full text-left"
        >
            {{ $title }}
        </button>

        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
        >
            <template
                x-for="(item, index) in visibleItems"
                :key="item.id"
            >
                <div class="flex items-center space-x-2 py-1">
                    <input
                        wire:model.live="selectedItems"
                        type="checkbox"
                        :id="'{{ Str::slug($title) }}-' + item.id"
                        :value="item.id"
                        class="h-4 w-4 rounded border-gray-300"
                    >
                    <label
                        :for="'{{ Str::slug($title) }}-' + item.id"
                        class="text-sm"
                        x-text="item.name"
                    >
                    </label>
                </div>
            </template>

            <button
                @click="showAll = !showAll"
                x-show="items.length > limit"
                x-text="showAll ? 'Show less' : `Show ${items.length - limit} more...`"
                class="mt-2 text-sm text-gray-500 hover:text-gray-700"
            >
            </button>
        </div>
    </div>
</div>
