@php
    $positionClasses = [
        'left' => 'ml-0 my-0 h-dvh max-h-dvh inset-y-0 min-w-64 left-0 max-w-96',
        'right' => 'mr-0 my-0 h-dvh max-h-dvh inset-y-0 min-w-64 right-0 max-w-96',
        'top' => 'mt-0 mx-0 w-dvw max-w-full fixed inset-x-0 top-0',
        'bottom' => 'mb-0 mx-0 w-dvw max-w-full fixed inset-x-0 bottom-0',
    ];
@endphp

<section>
    <button
        data-drawer-target="drawer-{{ $id }}"
        data-drawer-show="drawer-{{ $id }}"
        type="button"
    >
        {{ $trigger }}
    </button>

    <dialog
        id="drawer-{{ $id }}"
        class="{{ $positionClasses[$position] }} duration-{{ $duration }} backdrop:duration-{{ $duration }} overflow-y-auto bg-white p-4 shadow-lg backdrop:bg-gray-900/50 dark:bg-gray-800"
        data-position="{{ $position }}"
        data-duration="{{ $duration }}"
    >
        <button
            data-drawer-hide="drawer-{{ $id }}"
            type="button"
            class="float-end -ms-1 mb-2 ml-2 text-gray-900 dark:text-white"
        >
            <x-icons.close class="size-6" />
        </button>
        @if ($title)
            <h2 class="mb-2 line-clamp-1 font-semibold uppercase text-gray-500 dark:text-gray-400">
                {{ $title }}
            </h2>
        @endif
        <p class="text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos quia
            odit blanditiis, facilis ab eius ipsum optio praesentium esse perspiciatis illum, facere alias quasi,
            excepturi ex aliquam cupiditate suscipit laudantium.</p>
    </dialog>
</section>
