document.querySelectorAll('[data-modal-target]').forEach(trigger => {
    const modal = document.getElementById(trigger.dataset.modalTarget);

    trigger.addEventListener("click", () => {
        modal.showModal();
    });

    modal.addEventListener('mousedown', (event) => {
        const rect = modal.getBoundingClientRect();
        const isClickOutside =
            event.clientX < rect.left ||
            event.clientX > rect.right ||
            event.clientY < rect.top ||
            event.clientY > rect.bottom;

        if (isClickOutside) {
            modal.close();
        }
    });

    modal.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            event.preventDefault();
            modal.close();
        }
    });
});

document.querySelectorAll('[data-modal-close]').forEach(trigger => {
    trigger.addEventListener('click', () => {
        trigger.closest('dialog').close();
    });
});