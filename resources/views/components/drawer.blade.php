<div>
    <dialog
        id="{{ $id }}"
        {{ $attributes->withoutTwMergeClasses()->twMerge(['flex flex-col p-4 gap-4 fixed drawer-' . $position]) }}
    >
        <header {{ $attributes->twMergeFor('header', 'flex items-center justify-end gap-4 mb-4') }}>
            @isset($header)
                <h2 class="mr-auto text-2xl font-semibold">{{ $header }}</h2>
            @endisset
            <x-close-button
                class="z-10 float-right"
                data-drawer-close
            />
        </header>

        <div {{ $attributes->twMergeFor('body', 'grow overflow-y-auto overflow-x-hidden') }}>
            {{ $slot }}
        </div>

        @isset($footer)
            <footer {{ $attributes->twMergeFor('footer', '') }}>
                {{ $footer }}
            </footer>
        @endisset

    </dialog>
</div>
