{{-- <div
    x-data="{ open: true }"
    class="w-96 p-6"
>
    <div class="overflow-hidden rounded border">

        <button
            @click="open=!open"
            class="w-full bg-red-100 px-4 text-left"
        >
            Title
        </button>

        <div
            x-cloak
            x-show="open"
            class="space-y-2 p-4"
        >
            <div class="flex items-center">
                <input
                    id="item-1"
                    type="checkbox"
                    value=""
                    class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                >
                <label
                    for="item-1"
                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >
                    Default checkbox
                </label>
            </div>
            <div class="flex items-center">
                <input
                    id="item-2"
                    type="checkbox"
                    value=""
                    class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                >
                <label
                    for="item-2"
                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >
                    Default checkbox
                </label>
            </div>
            <div class="flex items-center">
                <input
                    id="item-3"
                    type="checkbox"
                    value=""
                    class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                >
                <label
                    for="item-3"
                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >
                    Default checkbox
                </label>
            </div>
        </div>
    </div>

</div>

</div> --}}

{{-- <div>
    <div>
        <button>claps in</button>
        <div>
            <div>item 1</div>
            <div>item 2</div>
            <div>item 3</div>
            <div>item 4</div>
            <div>item 5</div>
            <div>item 6</div>
            <button>show 3 more...</button>
        </div>
    </div>

    <div>
        <button>claps in</button>
        <div>
            <div>item 1</div>
            <div>item 2</div>
            <div>item 3</div>
            <div>item 4</div>
            <div>item 5</div>
            <div>item 6</div>
            <button>show 3 more...</button>
        </div>
    </div>
</div> --}}

{{-- <div>
    <div x-data="{ open: true, showMore: false }">
        <button
            @click="open = !open"
            class="w-full text-left"
        >
            claps in
        </button>

        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0 -translate-y-2"
            x-transition:enter-end="transform opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="transform opacity-100 translate-y-0"
            x-transition:leave-end="transform opacity-0 -translate-y-2"
        >
            <div>item 1</div>
            <div>item 2</div>
            <div>item 3</div>
            <template x-if="showMore">
                <div>
                    <div>item 4</div>
                    <div>item 5</div>
                    <div>item 6</div>
                </div>
            </template>
            <button
                @click="showMore = !showMore"
                x-text="showMore ? 'Show less' : 'Show 3 more...'"
            ></button>
        </div>
    </div>

    <div x-data="{ open: true, showMore: false }">
        <button
            @click="open = !open"
            class="w-full text-left"
        >
            claps in
        </button>

        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0 -translate-y-2"
            x-transition:enter-end="transform opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="transform opacity-100 translate-y-0"
            x-transition:leave-end="transform opacity-0 -translate-y-2"
        >
            <div>item 1</div>
            <div>item 2</div>
            <div>item 3</div>
            <template x-if="showMore">
                <div>
                    <div>item 4</div>
                    <div>item 5</div>
                    <div>item 6</div>
                </div>
            </template>
            <button
                @click="showMore = !showMore"
                x-text="showMore ? 'Show less' : 'Show 3 more...'"
            ></button>
        </div>
    </div>
</div> --}}

<div>
    <div x-data="{
        open: false,
        items: ['item 1', 'item 2', 'item 3', 'item 4', 'item 5', 'item 6'],
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
            claps in
        </button>

        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
        >
            <template
                x-for="(item, index) in visibleItems"
                :key="index"
            >
                <div class="flex items-center space-x-2 py-1">
                    <input
                        type="checkbox"
                        :id="'item-' + index"
                        class="h-4 w-4 rounded border-gray-300"
                    >
                    <label
                        :for="'item-' + index"
                        class="text-sm"
                        x-text="item"
                    >
                    </label>
                </div>
            </template>

            <button
                @click="showAll = !showAll"
                x-show="items.length > limit"
                x-text="showAll ? 'Show less' : `Show ${items.length - limit} more...`"
                class="mt-2"
            >
            </button>
        </div>
    </div>
</div>
