document.querySelectorAll('.zoom-image').forEach(item => {
    item.addEventListener('mouseenter', function() {
        item.style.transform = 'scale(1.1)';
    });
    item.addEventListener('mouseleave', function() {
        item.style.transform = 'scale(1)';
    });
});
