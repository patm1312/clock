document.addEventListener('DOMContentLoaded', () => {
    const departamentoSelect = document.getElementById('departamento-select');
    const ciudadSelect = document.getElementById('ciudad-select');

    // Función para cargar departamentos y ciudades
    async function cargarDepartamentosYCiudades() {
        try {
            const response = await fetch('http://localhost/nicho/mascotas/public/js/data/departamentos.json');

 // Ajusta la ruta según tu configuración
            const data = await response.json();
    
            console.log('Archivo JSON cargado correctamente:', data); // Verifica el contenido del JSON
            // Llenar el select de departamentos
            data.forEach(departamento => {
                const option = document.createElement('option');
                option.value = departamento.departamento;
                option.textContent = departamento.departamento;
                departamentoSelect.appendChild(option);
            });

            // Escuchar cambios en el select de departamentos
            departamentoSelect.addEventListener('change', (event) => {
                const selectedDepartamento = event.target.value;

                // Limpiar el select de ciudades y deshabilitarlo si no se ha seleccionado un departamento
                ciudadSelect.innerHTML = '<option value="">Selecciona Ciudad</option>';
                ciudadSelect.disabled = selectedDepartamento === '';

                // Llenar el select de ciudades basadas en el departamento seleccionado
                const ciudades = data.find(dept => dept.departamento === selectedDepartamento)?.ciudades || [];
                ciudades.forEach(ciudad => {
                    const option = document.createElement('option');
                    option.value = ciudad;
                    option.textContent = ciudad;
                    ciudadSelect.appendChild(option);
                });
            });
            
        } catch (error) {
            console.error('Error al cargar departamentos y ciudades:', error);
        }
    }

    // Llamar a la función al cargar la página
    cargarDepartamentosYCiudades();
});
