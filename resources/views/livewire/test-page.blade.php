<div>

    {{-- <livewire:drawer-with-data-attributes
        id="menu-left"
        position="left"
        trigger="Open Left Drawer"
        title="My Drawer Left"
        duration="300"
    />

    <livewire:drawer-with-data-attributes
        id="menu-right"
        position="right"
        trigger="Open Right Drawer"
        duration="300"
    />

    <livewire:drawer-with-data-attributes
        id="menu-top"
        position="top"
        trigger="Open Top Drawer"
        duration="300"
    />

    <livewire:drawer-with-data-attributes
        id="menu-bottom"
        position="bottom"
        trigger="Open Bottom Drawer"
        title="My Drawer Bottom"
        duration="300"
    />

    <livewire:drawer-with-data-attributes title="My Drawer Bottom" /> --}}

    {{-- <x-drawer-trigger
        show="drawer-component"
        target="drawer-component"
    >
        Met header
    </x-drawer-trigger>

    <x-drawer id="drawer-component">
        <x-slot name="header">Header Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas ad expedita quidem
            culpa deleniti aspernatur, harum quod eligendi doloremque sunt earum ducimus labore sapiente est eveniet eum
            veniam id voluptas!</x-slot>
        body
        <x-slot name="footer">Footer</x-slot>
    </x-drawer>

    <x-drawer-trigger
        show="drawer-component-2"
        target="drawer-component-2"
    >
        Zonder header
    </x-drawer-trigger>

    <x-drawer id="drawer-component-2">
        body
        <x-slot name="footer">Footer</x-slot>
    </x-drawer> --}}

    {{-- <button id="open-modal">Open Moal</button>

    <dialog
        id="modal"
        class="modal"
    >
        <button id="close-modal">Close Modal</button>
        <p>Modal Body</p>
    </dialog>

    <script>
        const modal = document.getElementById('modal');
        const openModal = document.getElementById('open-modal');
        const closeModal = document.getElementById('close-modal');

        openModal.addEventListener("click", () => {
            modal.showModal();
        });

        closeModal.addEventListener("click", () => {
            modal.close();
        });
    </script> --}}

    {{-- <button
        id="open-modal-2"
        class="btn"
    >Open Moal</button> --}}

    {{-- <dialog
        id="modal-2"
        class="modal modal-animation modal-backdrop modal-backdrop-animation" --}}
    {{-- class="transition-[opacity,overlay,display, transform] scale-100 rounded-lg bg-white p-4 text-gray-500 opacity-100 duration-300 transition-discrete backdrop:bg-gray-900/50 backdrop:opacity-100 backdrop:transition-[opacity,overlay,display] backdrop:duration-300 backdrop:transition-discrete starting:scale-150 starting:opacity-0 starting:backdrop:opacity-0 dialog-not-open:scale-150 dialog-not-open:opacity-0 dialog-not-open:backdrop:opacity-0 dark:bg-gray-800 dark:text-gray-400 backdrop:dark:bg-gray-900/80" --}}
    {{-- >
        <button id="close-modal-2">Close Modal</button>
        <p>Modal Body</p>
    </dialog> --}}

    {{-- <button
        data-modal-show="modal"
        data-modal-target="modal"
    >
        data-modal-show
    </button>

    <dialog
        id="modal"
        class="scale-100 rounded-lg bg-white p-4 text-gray-500 opacity-100 transition-[opacity,overlay,display,transform] duration-300 transition-discrete backdrop:bg-gray-900/50 backdrop:opacity-100 backdrop:transition-[opacity,overlay,display] backdrop:duration-300 backdrop:transition-discrete starting:scale-150 starting:opacity-0 starting:backdrop:opacity-0 dialog-not-open:scale-150 dialog-not-open:opacity-0 dialog-not-open:backdrop:opacity-0 dark:bg-gray-800 dark:text-gray-400 backdrop:dark:bg-gray-900/80"
    >
        <button data-modal-hide="modal">Close</button>
        <p>Modal Body</p>
    </dialog>

    <button data-modal-target="modal2">
        data-modal-show
    </button>

    <dialog
        id="modal2"
        class="scale-100 rounded-lg bg-white p-4 text-gray-500 opacity-100 shadow transition-[opacity,overlay,display,transform] duration-300 transition-discrete backdrop:bg-gray-900/50 backdrop:opacity-100 backdrop:transition-[opacity,overlay,display] backdrop:duration-300 backdrop:transition-discrete starting:scale-150 starting:opacity-0 starting:backdrop:opacity-0 dialog-not-open:scale-150 dialog-not-open:opacity-0 dialog-not-open:backdrop:opacity-0 dark:bg-gray-800 dark:text-gray-400 backdrop:dark:bg-gray-900/80"
    >
        <x-close-button
            class="float-right"
            data-modal-hide
        />
        <p>Modal Body2</p>
    </dialog> --}}

    <button
        data-modal-target="modal"
        class="btn"
    >
        Model
    </button>

    <dialog
        id="modal"
        class="modal"
    >
        <x-close-button
            class="float-right"
            data-modal-close
        />
        <p>Modal Body</p>
    </dialog>



    <button
        data-drawer-target="drawer-top"
        class="btn"
    >
        Drawer Top
    </button>

    <dialog
        id="drawer-top"
        class="drawer-top"
    >
        <x-close-button
            class="float-right"
            data-drawer-close
        />
        <p>Drawer Top Body</p>
    </dialog>



    <button
        data-drawer-target="drawer-right"
        class="btn"
    >
        Drawer Right
    </button>

    <dialog
        id="drawer-right"
        class="drawer-right"
    >
        <x-close-button
            class="float-right"
            data-drawer-close
        />
        <p>Drawer Right Body</p>
    </dialog>



    <button
        data-drawer-target="drawer-bottom"
        class="btn"
    >
        Drawer Bottom
    </button>

    <dialog
        id="drawer-bottom"
        class="drawer-bottom"
    >
        <x-close-button
            class="float-right"
            data-drawer-close
        />
        <p>Drawer Bottom Body</p>
    </dialog>



    <button
        data-drawer-target="drawer-left"
        class="btn"
    >
        Drawer Left
    </button>

    <dialog
        id="drawer-left"
        class="drawer-left"
    >
        <x-close-button
            class="float-right"
            data-drawer-close
        />
        <p>Drawer Body</p>
    </dialog>


    <x-drawer-trigger
        class="btn"
        target="my-drawer"
    >
        Click Me
    </x-drawer-trigger>

    <x-drawer
        id="my-drawer"
        position="bottom"
    >
        <p>Hello World!</p>
    </x-drawer>





    {{-- <button id="open-alpine-modal">AlpineJS open</button>

    <dialog id="alpine-modal">
        <button id="close-alpine-modal">AlpineJS close</button>
        <p>AlpineJS body</p>
    </dialog>

    <script>
        const modal = document.getElementById('alpine-modal');
        const openModal = document.getElementById('open-alpine-modal');
        const closeModal = document.getElementById('close-alpine-modal');

        openModal.addEventListener("click", () => modal.showModal());

        closeModal.addEventListener("click", () => modal.close());
    </script> --}}



    <x-alpine-modal target="alpine-modal" />




    <script>
        // const modal2 = document.getElementById('modal-2');
        // const openModal2 = document.getElementById('open-modal-2');
        // const closeModal2 = document.getElementById('close-modal-2');

        // openModal2.addEventListener("click", () => {
        //     modal2.showModal();
        // });

        // closeModal2.addEventListener("click", () => {
        //     modal2.close();
        // });

        // modal2.addEventListener('keydown', (event) => {
        //     if (event.key === 'Escape') {
        //         event.preventDefault();
        //         modal2.close();
        //     }
        // });

        // modal2.addEventListener('click', (event) => {
        //     const dialogDimensions = modal2.getBoundingClientRect();

        //     const isInDialog = (
        //         event.clientX >= dialogDimensions.left &&
        //         event.clientX <= dialogDimensions.right &&
        //         event.clientY >= dialogDimensions.top &&
        //         event.clientY <= dialogDimensions.bottom
        //     );

        //     if (!isInDialog) {
        //         modal2.close();
        //     }
        // });

        // modal2.addEventListener('mousedown', (event) => {
        //     const rect = modal2.getBoundingClientRect();

        //     const isClickOutside =
        //         event.clientX < rect.left ||
        //         event.clientX > rect.right ||
        //         event.clientY < rect.top ||
        //         event.clientY > rect.bottom;

        //     if (isClickOutside) {
        //         modal2.close();
        //     }
        // });

        // modal2.addEventListener('mousedown', (event) => {
        //     const rect = modal2.firstElementChild.getBoundingClientRect();

        //     const isClickOutside =
        //         event.clientX < rect.left ||
        //         event.clientX > rect.right ||
        //         event.clientY < rect.top ||
        //         event.clientY > rect.bottom;

        //     if (isClickOutside) {
        //         modal2.close();
        //     }
        // });


        // modal2.addEventListener('click', (event) => {
        //     if (event.target === modal2) {
        //         modal2.close();
        //     }
        // });
    </script>

</div>
