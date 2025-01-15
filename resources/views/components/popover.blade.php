@props(['id' => 'popover-' . uniqid(), 'class' => '', 'backdrop' => false])

<div>
    <button
        class="rounded-lg bg-red-500 px-4 py-2 text-white"
        popovertarget="{{ $id }}"
        style="anchor-name: --{{ $id }};"
    >
        {{ $slot }}
    </button>

    <div
        id="{{ $id }}"
        class="mt-1 gap-1 rounded-lg border bg-white px-4 py-2 shadow-lg dark:border-gray-600 dark:bg-gray-700"
        popover
        style="
            position:absolute;
            inset: auto;
            position-anchor: --{{ $id }};
            top: anchor(--{{ $id }}; bottom);
            right: anchor(--{{ $id }}; right);
        "
    >
        <button
            class=""
            popoveraction="hide"
            popovertarget="{{ $id }}"
        >
            {{ $close ?? 'Close' }}
        </button>

        {{ $content ?? 'Popover content here' }}
    </div>
</div>
