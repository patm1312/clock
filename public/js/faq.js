document.addEventListener("DOMContentLoaded", function () {
    const questions = document.querySelectorAll(".faq-question");

    questions.forEach((question) => {
        question.addEventListener("click", function () {
            const answer = question.nextElementSibling; // El div con la respuesta
            const icon = question.querySelector(".faq-toggle-icon"); // El icono dentro de la pregunta

            // Alternar la visibilidad de la respuesta
            if (answer.classList.contains("hidden")) {
                answer.classList.remove("hidden");
                // Cambiar el icono a "plegar"
                icon.classList.remove("fa-chevron-down");
                icon.classList.add("fa-chevron-up");
            } else {
                answer.classList.add("hidden");
                // Cambiar el icono a "desplegar"
                icon.classList.remove("fa-chevron-up");
                icon.classList.add("fa-chevron-down");
            }
        });
    });
});
