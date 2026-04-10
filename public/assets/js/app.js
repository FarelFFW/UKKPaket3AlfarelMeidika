document.addEventListener('DOMContentLoaded', () => {
    const flash = document.querySelector('[data-auto-hide]');

    if (flash) {
        setTimeout(() => flash.remove(), 3000);
    }
});
