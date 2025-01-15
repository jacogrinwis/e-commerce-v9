<section>

    <button
        type="button"
        data-test-drawer-target="{{ $id }}"
        data-test-drawer-show="{{ $id }}"
    >
        <span class="sr-only">Open drawer</span>
        Open Drawer
    </button>

    <dialog
        id="{{ $id }}"
        class="min-h-96 min-w-96"
        data-color="{{ $color }}"
        data-position={{ $position }}
    >

        <button
            type="button"
            data-test-drawer-hide="{{ $id }}"
        >
            <span class="sr-only">Close drawer</span>
            Close Drawer
        </button>

    </dialog>

</section>
