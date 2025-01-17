{{-- <div class="rounded-lg border border-blue-200 bg-blue-50 p-4 shadow">

    <h2 class="text-lg font-semibold">
        {{ $title }} {{ $type !== 'stock_statuses' ? '(' . count($items) . ')' : '' }}
    </h2>

    @foreach ($items as $item)
        <div>
            <input
                type="checkbox"
                value="{{ is_array($item) ? $item['id'] : $item->id }}"
                wire:model.live="selected"
                id="{{ $type }}-{{ is_array($item) ? $item['id'] : $item->id }}"
            >
            <label for="{{ $type }}-{{ is_array($item) ? $item['id'] : $item->id }}">
                {{ is_array($item) ? $item['name'] : $item->name }}
                ({{ $counts[is_array($item) ? $item['id'] : $item->id] ?? 0 }})
            </label>
        </div>
    @endforeach

</div> --}}

<div
    class="rounded-lg border border-blue-200 bg-blue-50 p-4 shadow"
    x-data="{
        open: true,
        selected: @entangle('selected'),
        limit: 3,
        showAll: false,
        isVisible(index) {
            return this.showAll || index < this.limit;
        }
    }"
>
    <button
        @click="open = !open"
        class="w-full text-left text-lg font-semibold"
    >
        {{ $title }} {{ $type !== 'stock_statuses' ? '(' . count($items) . ')' : '' }}
    </button>

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
    >
        @foreach ($items as $item)
            <div
                class="flex items-center space-x-2 py-1"
                x-show="isVisible({{ $loop->index }})"
            >
                <input
                    type="checkbox"
                    value="{{ is_array($item) ? $item['id'] : $item->id }}"
                    id="{{ $type }}-{{ is_array($item) ? $item['id'] : $item->id }}"
                    wire:model.live="selected"
                    class="h-4 w-4 rounded border-gray-300"
                >
                <label
                    for="{{ $type }}-{{ is_array($item) ? $item['id'] : $item->id }}"
                    class="text-sm"
                >
                    {{ is_array($item) ? $item['name'] : $item->name }}
                    ({{ $counts[is_array($item) ? $item['id'] : $item->id] ?? 0 }})
                </label>
            </div>
        @endforeach

        @if (count($items) > 3)
            <button
                @click="showAll = !showAll"
                class="mt-2 text-sm text-gray-500 hover:text-gray-700"
                x-text="showAll ? 'Toon minder' : 'Toon meer ({{ count($items) - 3 }})'"
            ></button>
        @endif
    </div>
</div>
