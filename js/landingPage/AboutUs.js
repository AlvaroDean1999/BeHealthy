document.addEventListener("DOMContentLoaded", function() {
    var aboutUsItems = document.querySelectorAll('.aboutUsItem');

    function checkVisibility() {
        aboutUsItems.forEach(function(item) {
            if (isElementInViewport(item)) {
                item.classList.add('active');
            }
        });
    }

    function isElementInViewport(el) {
        var rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    window.addEventListener('scroll', checkVisibility);
    window.addEventListener('resize', checkVisibility);
    checkVisibility();
});
