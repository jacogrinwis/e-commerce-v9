function handleDrawerClose(drawer) {
    const duration = parseInt(drawer.dataset.duration);
    drawer.classList.remove('animate-in');
    drawer.classList.remove(`slide-in-from-${drawer.dataset.position}`);
    drawer.classList.add('animate-out');
    drawer.classList.add(`slide-out-to-${drawer.dataset.position}`);
    drawer.classList.add('backdrop:animate-out');
    drawer.classList.add('backdrop:fade-out');
    drawer.classList.add(`duration-${duration}`);
    drawer.classList.add(`backdrop:duration-${duration}`);

    drawer.addEventListener('animationend', () => {
        drawer.close();
        drawer.classList.remove('animate-out');
        drawer.classList.remove(`slide-out-to-${drawer.dataset.position}`);
        drawer.classList.remove('backdrop:animate-out');
        drawer.classList.remove('backdrop:fade-out');
        drawer.classList.remove(`duration-${duration}`);
        drawer.classList.remove(`backdrop:duration-${duration}`);
    }, { once: true });
}

// Show drawer
document.querySelectorAll('[data-drawer-show]').forEach(trigger => {
    const drawer = document.getElementById(trigger.dataset.drawerTarget);

    // Add click outside listener
    drawer.addEventListener('click', (event) => {
        const dialogDimensions = drawer.getBoundingClientRect();
        const isInDialog = (
            event.clientX >= dialogDimensions.left &&
            event.clientX <= dialogDimensions.right &&
            event.clientY >= dialogDimensions.top &&
            event.clientY <= dialogDimensions.bottom
        );

        if (!isInDialog) {
            handleDrawerClose(drawer);
        }
    });

    // Add ESC key listener
    drawer.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            event.preventDefault();
            handleDrawerClose(drawer);
        }
    });

    // Add show event listener
    trigger.addEventListener('click', () => {
        const drawer = document.getElementById(trigger.dataset.drawerTarget);
        drawer.showModal();
        drawer.classList.add('animate-in');
        drawer.classList.add(`slide-in-from-${drawer.dataset.position}`);
        drawer.classList.add('backdrop:animate-in');
        drawer.classList.add('backdrop:fade-in');
    });
});

// Hide drawer
document.querySelectorAll('[data-drawer-hide]').forEach(trigger => {
    trigger.addEventListener('click', () => {
        const drawer = document.getElementById(trigger.dataset.drawerHide);
        handleDrawerClose(drawer);
    });
});
