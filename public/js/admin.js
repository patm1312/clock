document.addEventListener("DOMContentLoaded", function () {
    // Cargar el archivo JSON usando fetch desde la carpeta public/js
    fetch('http://localhost/nicho/mascotas/public/js/data/admin.json')  // Ruta al archivo JSON
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al cargar el archivo JSON: ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            // Actualizar todos los elementos con la clase 'direccion'
            const direccionElements = document.querySelectorAll('.direccion');
            direccionElements.forEach(element => {
                if (data.contacto.direccion) {
                    element.textContent = "Dirección: " + data.contacto.direccion;
                }
            });

            // Actualizar todos los elementos con la clase 'correo'
            const correoElements = document.querySelectorAll('.correo');
            correoElements.forEach(element => {
                if (data.contacto.correos && data.contacto.correos[0]) {
                    element.textContent = "Correo: " + data.contacto.correos[0].correo;
                }
            });

            // Actualizar todos los elementos con la clase 'whatsapp'
            const whatsappElements = document.querySelectorAll('.whatsapp');
            whatsappElements.forEach(element => {
                if (data.contacto.telefonos && data.contacto.telefonos[0]) {
                    const whatsappLink = "https://wa.me/" + data.contacto.telefonos[0].numero;
                    element.setAttribute('href', whatsappLink);
                }
                        // Verificar si el elemento está dentro de un <li> y actualizar el contenido de texto
        if (element.parentElement && element.parentElement.tagName === 'LI') {
            element.textContent = data.contacto.telefonos[0].numero;
        }
            });
        // Seleccionar el <div> donde se agregarán los enlaces de redes sociales
const parentDiv = document.querySelector('.col-span-1.sm\\:col-span-2.md\\:col-span-4.mt-6');

// Crear el contenedor para los enlaces de redes sociales
const socialContainer = document.createElement('div');
socialContainer.classList.add('flex', 'space-x-4', 'mt-4');

// Verificar si existen redes sociales en el archivo JSON
if (data.contacto.social && data.contacto.social.length > 0) {
    data.contacto.social.forEach(social => {
        // Crear enlaces según el tipo de red social y solo si el enlace no está vacío
        if (social.tipo === "facebook" && social.correo) {
            const facebookLink = document.createElement('a');
            facebookLink.href = social.correo;
            facebookLink.classList.add('facebook', 'text-blue-800', 'hover:text-blue-600');
            facebookLink.innerHTML = '<i class="fab fa-facebook-square text-3xl"></i>';
            socialContainer.appendChild(facebookLink);
        } else if (social.tipo === "instagram" && social.correo) {
            const instagramLink = document.createElement('a');
            instagramLink.href = social.correo;
            instagramLink.classList.add('instagram', 'text-pink-500', 'hover:text-pink-400');
            instagramLink.innerHTML = '<i class="fab fa-instagram text-3xl"></i>';
            socialContainer.appendChild(instagramLink);
        } else if (social.tipo === "youtube" && social.correo) {
            const youtubeLink = document.createElement('a');
            youtubeLink.href = social.correo;
            youtubeLink.classList.add('youtube', 'text-red-600', 'hover:text-red-500');
            youtubeLink.innerHTML = '<i class="fab fa-youtube text-3xl"></i>';
            socialContainer.appendChild(youtubeLink);
        } else if (social.tipo === "tiktok" && social.correo) {
            const tiktokLink = document.createElement('a');
            tiktokLink.href = social.correo;
            tiktokLink.classList.add('tiktok', 'text-black', 'hover:text-gray-700');
            tiktokLink.innerHTML = '<i class="fab fa-tiktok text-3xl"></i>';
            socialContainer.appendChild(tiktokLink);
        }
    });
}

// Agregar el contenedor de redes sociales al <div> especificado
if (parentDiv) {
    parentDiv.appendChild(socialContainer);
}

        })
        
        .catch(error => {
            console.error('Error al cargar el archivo JSON:', error);
        });
});
