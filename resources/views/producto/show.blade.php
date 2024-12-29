@extends('layouts.plantilla')

@section('tittle', 'Producto: ' . $producto['nombre'])

@section('content')
<section class="bg-white dark:bg-gray-900 py-10">
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <!-- Imagen y galería de producto -->
            <div class="space-y-4">
                <!-- Imagen principal -->
                <div class="relative" id="main-container">
                    <!-- Mostrar la primera imagen como principal -->
                    <img id="main-image" src="{{ asset($producto['media'][0]['url']) }}" alt="{{ $producto['nombre'] }}" class="zoom-image w-full h-auto rounded-lg shadow-lg">
            
                    <!-- Flechas de navegación -->
                    <button id="prev-btn" class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-700 text-white p-2 rounded-full shadow-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        &#8592;
                    </button>
                    <button id="next-btn" class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-gray-700 text-white p-2 rounded-full shadow-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        &#8594;
                    </button>
                </div>
            
                <!-- Imágenes pequeñas / Videos -->
                <div class="flex space-x-4">
                    @foreach($producto['media'] as $index => $item)
                        @if($item['tipo'] == 'imagen')
                            <div>
                                <img src="{{ asset($item['url']) }}" alt="Producto" class="w-20 h-20 object-cover rounded-lg cursor-pointer hover:opacity-75" onclick="changeImage('{{ asset($item['url']) }}', 'imagen')">
                            </div>
                        @elseif($item['tipo'] == 'video')
                            <div>
                                <video class="w-20 h-20 object-cover rounded-lg cursor-pointer hover:opacity-75" onclick="changeImage('{{ asset($item['url']) }}', 'video')">
                                    <source src="{{ asset($item['url']) }}" type="video/mp4">
                                </video>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            

            

            <!-- Detalles del producto -->
 <!-- Detalles del producto -->
 <div class="space-y-6">
    <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white">{{ $producto['nombre'] }}</h2>
    <p class="text-lg text-gray-500 dark:text-gray-400">{{ $producto['descripcion'] }}</p>

   <!-- Atributo del producto con precio y precio de oferta -->
<div class="space-y-2">
    <!-- Precio regular -->
    <p class="text-3xl font-bold text-green-600 flex items-center space-x-2">
        <i class="fa-solid fa-dollar-sign text-xl"></i> <!-- Ícono de signo de peso -->
        <span>{{ number_format($producto['precio'] * 4500, 2) }} COP</span>
    </p>

    <!-- Precio de oferta -->
    <p class="text-sm font-semibold text-red-500 flex items-center space-x-1">
        <i class="fa-solid fa-tags text-xs"></i> <!-- Ícono pequeño de etiqueta -->
        <span>Precio de oferta</span>
    </p>
  
</div>

    <!-- Detalles del producto -->
    <div class="space-y-4">
        <div class="text-lg text-gray-700 dark:text-gray-300">
            <strong>Detalles:</strong>
            <p>{{ $producto['detalles']['descripcion'] }}</p>
        </div>

        <!-- Mensajes destacados -->
        <div class="space-y-4">
            <!-- Envíos gratis -->
            <div class="flex items-center p-4 bg-green-100 text-green-700 rounded-lg shadow-lg">
                <svg class="w-6 h-6 mr-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none"><path d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"></path></svg>
                <span class="deletrear text-lg">¡Envíos gratis a toda Colombia!</span>
            </div>

            <!-- Pago seguro contra entrega -->
            <div class="flex items-center p-4 bg-blue-100 text-blue-700 rounded-lg shadow-lg">
                <svg class="w-6 h-6 mr-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none"><path d="M3.5 4a.5.5 0 01.5.5V6h13V4.5a.5.5 0 011 0V7a.5.5 0 01-.5.5H3a.5.5 0 01-.5-.5V4.5a.5.5 0 01.5-.5zM16 7H4a1 1 0 00-1 1v9a1 1 0 001 1h12a1 1 0 001-1V8a1 1 0 00-1-1zM4 8h12v8H4V8z"></path></svg>
                <span class="deletrear text-lg">Pago seguro contra entrega.</span>
            </div>

            <!-- Productos con garantía -->
            <div class="flex items-center p-4 bg-yellow-100 text-yellow-700 rounded-lg shadow-lg">
                <svg class="w-6 h-6 mr-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none"><path d="M9.293 2.293a1 1 0 011.414 0l4 4a1 1 0 01.287.706v10a1 1 0 01-.287.707l-4 4a1 1 0 01-1.414-1.414L12.586 16H7.414l-2.293 2.293a1 1 0 01-1.414-1.414l4-4a1 1 0 01.707-.287h10a1 1 0 01.707.287l4 4a1 1 0 01-1.414 1.414L16 13.586v-10l2.293 2.293a1 1 0 01-.287-.707V2a1 1 0 01-.287-.706l-4-4z"></path></svg>
                <span class="deletrear text-lg">Productos con garantía.</span>
            </div>

            <!-- Otro mensaje -->
            <div class="flex items-center p-4 bg-pink-100 text-pink-700 rounded-lg shadow-lg">
                <svg class="w-6 h-6 mr-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none"><path d="M15 5a3 3 0 11-6 0 3 3 0 016 0zM8 8a3 3 0 11-6 0 3 3 0 016 0zM15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                <span class="deletrear text-lg">Soporte 24/7 para cualquier consulta.</span>
            </div>
        </div>
    </div>

    <!-- Botón de WhatsApp -->
    <a href="https://wa.me/573001234567?text=Hola,%20estoy%20interesado%20en%20comprar%20este%20producto" class="flex items-center justify-center py-3 px-5 bg-green-600 text-white text-lg font-semibold rounded-lg shadow-lg hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
        <svg class="w-6 h-6 mr-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none"><path d="M9 2C4.58 2 1 5.58 1 9s3.58 7 8 7c1.38 0 2.72-.32 3.93-.88l4.69 2.56-1.61-5.11c.55-.97.88-2.08.88-3.57 0-3.42-3.58-7-8-7zm0 12c-.77 0-1.53-.13-2.24-.37l-1.39.77-.68-2.08.96-.56c-.37-.93-.56-1.94-.56-2.91 0-2.76 2.24-5 5-5s5 2.24 5 5-2.24 5-5 5z"></path></svg>
        <span>Contactar por WhatsApp</span>
    </a>
</div>
        </div>
    </div>
</section>
<!-- Sección de atributos -->
<!-- Sección de Atributos del Producto -->
<div class="space-y-8">
    <!-- Título principal -->
    <h2 class="text-4xl font-bold text-center text-blue-600 flex items-center justify-center space-x-2">
        <i class="fas fa-star text-yellow-400"></i> <!-- Ícono decorativo -->
        <span>Lo Mejor de lo Mejor</span>
        <i class="fas fa-trophy text-yellow-400"></i> <!-- Ícono decorativo -->
    </h2>

    <!-- Iteramos sobre los atributos -->
    @foreach($producto['atributos'] as $index => $atributo)
        <div class="p-6 bg-white rounded-lg shadow-lg flex flex-col items-center space-y-4 sm:space-y-6">
            <!-- Título del atributo con ícono -->
            <div class="flex items-center space-x-2 text-center">
                <i class="fas fa-tag text-blue-500 text-2xl"></i> <!-- Ícono decorativo en el título del atributo -->
                <p class="text-2xl font-bold text-indigo-600">{{ $atributo['tipo'] }}</p>
            </div>

            <!-- Descripción del atributo con estilo más destacado -->
            <p class="text-xl font-semibold text-gray-700 text-center">{{ $atributo['valor'] }}</p>

            <!-- Media asociado (imagen o video) -->
            <div class="w-full sm:w-2/3 lg:w-1/2">
                @if($loop->last)
                    <!-- Mostrar video para el último atributo, si está disponible -->
                    @foreach($producto['media'] as $item)
                        @if($item['tipo'] == 'video')
                            <video controls class="w-full h-auto rounded-lg shadow-lg">
                                <source src="{{ asset($item['url']) }}" type="video/mp4">
                            </video>
                            @break
                        @endif
                    @endforeach
                @else
                    <!-- Mostrar imagen para los atributos anteriores al último -->
                    @if(isset($producto['media'][$index]) && $producto['media'][$index]['tipo'] == 'imagen')
                        <img 
                            src="{{ asset($producto['media'][$index]['url']) }}" 
                            alt="Atributo: {{ $atributo['tipo'] }}" 
                            class="w-full h-auto object-cover rounded-lg shadow-lg cursor-pointer hover:opacity-75"
                            onclick="changeImage('{{ asset($producto['media'][$index]['url']) }}', 'imagen')">
                    @else
                        <!-- Imagen predeterminada o sin imagen -->
                        <img src="{{ asset('images/default.jpg') }}" alt="Imagen no disponible" class="w-full h-auto object-cover rounded-lg shadow-lg">
                    @endif
                @endif
            </div>
        </div>
    @endforeach
</div>
<section>
    <div class="p-6 bg-gray-100 text-center">
        <!-- Título centrado -->
        <h2 class="text-4xl font-bold text-indigo-600 mb-8">Compra Segura</h2>

        <div class="flex flex-wrap justify-center gap-8">
            <!-- Garantía de calidad -->
            <div class="flex flex-col items-center justify-center space-y-4">
                <i class="fas fa-check-circle text-indigo-600 text-7xl"></i>
                <h3 class="text-2xl font-bold text-indigo-600">Garantía de calidad</h3>
            </div>

            <!-- Atención al cliente personalizada -->
            <div class="flex flex-col items-center justify-center space-y-4">
                <i class="fas fa-headset text-indigo-600 text-7xl"></i>
                <h3 class="text-2xl font-bold text-indigo-600">Atención al cliente</h3>
            </div>

            <!-- Devoluciones seguras -->
            <div class="flex flex-col items-center justify-center space-y-4">
                <i class="fas fa-undo-alt text-indigo-600 text-7xl"></i>
                <h3 class="text-2xl font-bold text-indigo-600">Devoluciones seguras</h3>
            </div>

            <!-- Envíos nacionales garantizados -->
            <div class="flex flex-col items-center justify-center space-y-4">
                <i class="fas fa-shipping-fast text-indigo-600 text-7xl"></i>
                <h3 class="text-2xl font-bold text-indigo-600">Envíos nacionales</h3>
            </div>

            <!-- Pago contra entrega -->
            <div class="flex flex-col items-center justify-center space-y-4">
                <i class="fas fa-hand-holding-usd text-indigo-600 text-7xl"></i>
                <h3 class="text-2xl font-bold text-indigo-600">Pago contra entrega</h3>
            </div>
        </div>
    </div>
</section>


<script>
    let mediaItems = @json($producto['media']); // Array de imágenes y videos
    let currentIndex = 0;

    const mainContainer = document.getElementById('main-container');
    const mainImage = document.getElementById('main-image');
    const prevButton = document.getElementById('prev-btn');
    const nextButton = document.getElementById('next-btn');

    // Función para cambiar la imagen o video principal
    function changeImage(url, tipo) {
        if (tipo === 'imagen') {
            // Si es una imagen, actualizamos la imagen principal
            mainImage.src = url;
            mainImage.style.display = 'block'; // Aseguramos que la imagen se muestra
            mainContainer.innerHTML = ''; // Limpiar el contenedor principal
            mainContainer.appendChild(mainImage); // Volver a agregar la imagen
        } else if (tipo === 'video') {
            // Si es un video, creamos un nuevo elemento de video
            const videoElement = document.createElement('video');
            videoElement.classList.add('w-full', 'h-auto', 'rounded-lg', 'shadow-lg');
            const source = document.createElement('source');
            source.src = url;
            source.type = 'video/mp4';
            videoElement.appendChild(source);
            mainContainer.innerHTML = ''; // Limpiar el contenedor principal
            mainContainer.appendChild(videoElement); // Agregar el video al contenedor
            videoElement.play(); // Reproducir el video automáticamente
        }
    }

    // Manejo de flechas de navegación
    prevButton.addEventListener('click', function () {
        do {
            currentIndex = (currentIndex > 0) ? currentIndex - 1 : mediaItems.length - 1;
        } while (mediaItems[currentIndex].tipo === 'video');
        if (mediaItems[currentIndex].tipo === 'imagen') {
            mainImage.src = mediaItems[currentIndex].url;
        }
    });

    nextButton.addEventListener('click', function () {
        do {
            currentIndex = (currentIndex < mediaItems.length - 1) ? currentIndex + 1 : 0;
        } while (mediaItems[currentIndex].tipo === 'video');
        if (mediaItems[currentIndex].tipo === 'imagen') {
            mainImage.src = mediaItems[currentIndex].url;
        }
    });
</script>
@endsection
