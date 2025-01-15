<dialog id="{{ $id }}">
    <section class="min-w-96 p-4">
        @isset($header)
            <header class="flex items-center justify-between">
                <h2 class="">Header</h2>
                <button class="flex size-6 items-center justify-center rounded-lg bg-gray-300">X</button>
            </header>
        @else
            <button>X</button>
        @endisset

        <div>
            body
        </div>
        <footer>
            foot
        </footer>
    </section>
</dialog>

{{-- <dialog
    id="{{ $id }}"
    class="min-h-96 min-w-96"
>

    <section class="absolute inset-0 flex flex-col">

        <button
            data-drawer-hide="{{ $id }}"
            type="button"
            class="absolute top-0 right-0 flex items-center justify-center size-10"
        >
            <span class="sr-only">Close</span>
            <x-icons.close class="size-6" />
        </button>

        @isset($header)
            <header class="my-2 ml-4 mr-12 text-base font-semibold uppercase truncate">
                {{ $header }}
            </header>
        @endisset

        <div class="flex-1 w-full px-4 py-2 bg-red-300">
            {{ $slot }}
        </div>

        @isset($footer)
            <footer class="mx-4 my-2">
                {{ $footer }}
            </footer>
        @endisset
    </section>

</dialog> --}}
