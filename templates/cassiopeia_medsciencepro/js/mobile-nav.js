document.addEventListener('DOMContentLoaded', function () {
    const trigger = document.getElementById('my-mobile-trigger');
    const menu = document.getElementById('my-mobile-menu');

    if (trigger && menu) {
        trigger.addEventListener('click', function (e) {
            e.preventDefault();
            menu.classList.toggle('open');
            console.log("Toggle clicked. Current class list:", menu.className);
        });
    }
});