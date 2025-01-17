<div class="rounded-lg border border-blue-200 bg-blue-50 p-4 shadow">

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

</div>
