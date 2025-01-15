<div>
    <button
        data-alpine-modal-target="{{ $target }}"
        @click="document.querySelector(`[id='${$el.dataset.alpineModalTarget}']`).showModal()"
    >
        AlpineJS open
    </button>

    <dialog
        id="{{ $target }}"
        {{-- @click.outside="$el.close()" --}}
        {{-- @mousedown ="if ($event.target === $el) $el.close()" --}}
        {{-- @click="if ($event.target.tagName === 'DIALOG') $el.close()" --}}
        {{-- @click="$event.target === $event.currentTarget && $el.close()" --}}
        {{-- x-init="$el.addEventListener('click', (e) => { if (e.target.nodeName === 'DIALOG') $el.close() })" --}}
        @click="$el.close()"
        class="min-h-64 min-w-64 scale-100 rounded-lg bg-white p-4 text-gray-500 opacity-100 transition-[opacity,overlay,display,transform] duration-300 transition-discrete backdrop:bg-gray-900/50 backdrop:opacity-100 backdrop:transition-[opacity,overlay,display] backdrop:duration-300 backdrop:transition-discrete starting:scale-150 starting:opacity-0 starting:backdrop:opacity-0 dialog-not-open:scale-150 dialog-not-open:opacity-0 dialog-not-open:backdrop:opacity-0 dark:bg-gray-800 dark:text-gray-400 backdrop:dark:bg-gray-900/80"
    >
        <section
            @click.stop
            class="min-h-64 w-full"
        >
            <button @click="$el.closest('dialog').close()">
                AlpineJS close
            </button>
            <p>AlpineJS body</p>
        </section>
    </dialog>
</div>
