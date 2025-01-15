document.querySelectorAll('[data-test-drawer-show]').forEach(trigger => {
    trigger.addEventListener('click', () => {
        console.log('click on test drawer show');
        const drawer = document.getElementById(trigger.dataset.testDrawerTarget);
        console.log(`${drawer.dataset.color}`);
        drawer.classList.add('animate-in', `slide-in-from-${drawer.dataset.position}`);
        drawer.classList.add(`bg-${drawer.dataset.color}-500`);
        drawer.showModal();
    });
});

document.querySelectorAll('[data-test-drawer-hide]').forEach(trigger => {
    trigger.addEventListener('click', () => {
        console.log('click on test drawer hide');
        const drawer = document.getElementById(trigger.dataset.testDrawerHide);
        console.log(`${drawer.dataset.color}`);
        drawer.classList.remove(`bg-${drawer.dataset.color}-500`);
        // drawer.classList.add('bg-orange-500');
        drawer.close();
    });
});