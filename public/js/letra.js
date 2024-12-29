document.addEventListener('DOMContentLoaded', function () {
    // Función para crear el efecto de máquina de escribir
    function escribir(elemento) {
      const texto = elemento.textContent;  // Obtiene el texto original
      elemento.textContent = '';  // Borra el texto para agregarlo de nuevo
      let index = 0;
  
      // Función para "escribir" el texto
      function escribirLetra() {
        if (index < texto.length) {
          const char = texto.charAt(index);  // Obtiene el siguiente carácter
          const span = document.createElement('span');  // Crea un nuevo elemento span
          span.textContent = char;  // Asigna el carácter al span
          elemento.appendChild(span);  // Agrega el span al contenedor
  
          // Si el carácter es un espacio, lo mantenemos, no se pierde
          if (char === ' ') {
            span.classList.add('hidden-text'); // Para los espacios, podemos agregar un pequeño retraso
          }
  
          index++;
  
          // Llamamos a la función para el siguiente carácter
          setTimeout(escribirLetra, 50);  // Cambia el tiempo para hacer la escritura más rápida o lenta
        }
      }
  
      escribirLetra();  // Inicia la función
    }
  
    // Crear el observer para detectar la visibilidad de los elementos
    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          // Cuando el título entra en el viewport, aplicar el efecto
          escribir(entry.target);  // Aplica la escritura al elemento visible
          observer.unobserve(entry.target);  // Deja de observar el elemento después de que se aplique el efecto
        }
      });
    }, {
      threshold: 0.5 // Cuando el 50% del elemento sea visible
    });
  
    // Seleccionamos todos los elementos con la clase "deletrear"
    const elementos = document.querySelectorAll('.deletrear');
  
    // Observamos cada uno de los elementos
    elementos.forEach(elemento => {
      observer.observe(elemento);
    });
  });
  