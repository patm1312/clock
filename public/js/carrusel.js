    // Variables para los botones y elementos
    const prevButton = document.querySelector('[data-carousel-prev]');
    const nextButton = document.querySelector('[data-carousel-next]');
    const items = document.querySelectorAll('.carousel-item');
    let activeIndex = 0;

    // Función para mostrar la imagen activa
    function showItem(index) {
        items.forEach((item, i) => {
            item.classList.toggle('hidden', i !== index);
        });
    }

    // Mostrar la primera imagen al cargar
    showItem(activeIndex);

    // Evento para el botón "anterior"
    prevButton.addEventListener('click', () => {
        activeIndex = (activeIndex === 0) ? items.length - 1 : activeIndex - 1;
        showItem(activeIndex);
    });

    // Evento para el botón "siguiente"
    nextButton.addEventListener('click', () => {
        activeIndex = (activeIndex === items.length - 1) ? 0 : activeIndex + 1;
        showItem(activeIndex);
    });