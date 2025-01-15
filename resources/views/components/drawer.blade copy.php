<div>
    <dialog
        id="{{ $id }}"
        {{ $attributes->twMerge(['drawer-' . $position]) }}>
        <x-close-button
            class="z-10 float-right"
            data-drawer-close />
        {{ $slot }}
    </dialog>
</div>