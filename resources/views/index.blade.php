@extends('layouts.plantilla') 

@section('tittle', 'Home')
@section('content')




<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('images/productos/bombashome.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('images/productos/bombashome.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        {{-- <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/docs/images/carousel/carousel-3.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/docs/images/carousel/carousel-4.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/docs/images/carousel/carousel-5.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div> --}}
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>


<div class="  py-16 mt-12 mb-12">

    <h1 class="mb-6 text-4xl font-extrabold leading-tight tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
        <span class="text-indigo-600">Encuentra</span>
        <mark class="px-2 text-white bg-yellow-500 rounded-lg dark:bg-yellow-400">lo que</mark>
        <span class="text-pink-500">Buscas</span>
        <span class="ml-2 text-3xl inline-block text-yellow-600 animate-pulse"><i class="fas fa-search"></i></span>
      </h1>
      
    <div class="flex flex-wrap justify-center gap-6 py-8"> <!-- Contenedor flex que centra las tarjetas y agrega espacio entre ellas -->
        @foreach($productos as $producto)
            <div class="max-w-xs p-4 bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:scale-105 dark:bg-gray-800 dark:border-gray-700">
                <a href="{{ route('producto.show', ['codigo' => $producto['codigo']]) }}">
                <!-- Imagen principal del producto -->
                <div class="w-full h-48 bg-gray-200 rounded-lg overflow-hidden">
                    @if (isset($producto['media']) && count($producto['media']) > 0 && $producto['media'][0]['tipo'] == 'imagen')
                    {{-- <p>La primera imagen: {{ $producto['media'][0]['url'] }}</p> --}}
                    {{-- Descomenta la línea siguiente para mostrar la imagen --}}
                    <img src="{{ asset( $producto['media'][0]['url']) }}" alt="{{ $producto['nombre'] }}" class="w-full h-full object-cover">
                @else
                    <img src="{{ asset('storage/productos/images/default.png') }}" alt="Imagen por defecto" class="w-full h-full object-cover">
                @endif
                </div>
                
                <!-- Contenido de la tarjeta -->
                <div class="p-4 flex flex-col items-start space-y-2">
                    <!-- Nombre del producto -->
                    <h5 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $producto['nombre'] }}</h5>
                    
                    <!-- Descripción breve (máximo 30 caracteres) -->
                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ Str::limit($producto['descripcion'], 30) }}</p>
                    
                    <!-- Precios -->
                    <div class="flex items-center space-x-2">
                        <!-- Precio con descuento -->
                        <span class="text-xl font-bold text-green-500">
                            ${{ number_format($producto['precio'] * 4500, 2) }} COP <!-- Precio en pesos colombianos -->
                        </span>
    
                        <!-- Precio tachado (precio original con descuento) -->
                        <span class="text-sm line-through text-gray-500">
                            ${{ number_format(($producto['precio'] * 4500) * 1.20, 2) }} COP <!-- Precio original con descuento aplicado -->
                        </span>
    
                        <!-- Icono de oferta -->
                        <span class="text-xs bg-red-500 text-white px-2 py-1 rounded-full">
                            Oferta
                        </span>
                    </div>
                    
                    <!-- Envío gratis -->
                    <div class="mt-2 flex items-center space-x-1 text-sm text-gray-600 dark:text-gray-400">
                        <!-- Icono de envío gratis -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4 text-green-500" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zM2 0h12a4 4 0 0 1 4 4v8a4 4 0 0 1-4 4H2A4 4 0 0 1 0 12V4a4 4 0 0 1 4-4zm7 5H7v3h2V5z"/>
                        </svg>
                        <span>Envío gratis</span>
                    </div>
    
                    <!-- Botón "Añadir al carrito" -->
                    <form action="{{ route('carrito.agregar', $producto['codigo']) }}" method="POST" class="w-full mt-4">
                        @csrf
                        <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-200 flex items-center justify-center space-x-2">
                            <!-- Icono de carrito -->
                            <i class="fas fa-shopping-cart"></i> 
                            <span>Añadir al carrito</span>
                        </button>
                    </form>
                </div>
            </a>
            </div>
        @endforeach
    </div>
    
</div>

    <h1  class="deletrear mb-6 text-4xl font-extrabold leading-tight tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-pink-500 via-yellow-500 to-indigo-600 md:text-5xl lg:text-6xl dark:text-white">
        Preguntas Frecuentes
        <span class="ml-2 text-3xl inline-block text-yellow-600 animate-pulse">
            <i class="fas fa-question-circle"></i>
        </span>
    </h1>
    
    
      

    <div class="faq-section">
        @foreach ($faq as $pregunta => $respuesta)
        <div class="faq-item mb-4">
            <div class="faq-question bg-gray-100 p-4 rounded-lg cursor-pointer flex justify-between items-center">
                <h3 class="text-lg font-semibold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 via-yellow-500 to-indigo-600">
                    {{ $pregunta }}
                </h3>
                <i class="faq-toggle-icon fas fa-chevron-down text-gray-500 transform transition-transform duration-300 ease-in-out"></i>
            </div>
            <div class="faq-answer hidden p-4 bg-gray-50 rounded-lg mt-2">
                <p>{{ $respuesta }}</p>
            </div>
        </div>
        
        @endforeach
    </div>
    
</div>
<section class="  py-16">
    <div class="container mx-auto text-center">
        <!-- Título -->
        <h2 class="text-4xl font-semibold mb-10 text-blue-600">Pedidos Seguros</h2>
        
        <!-- Items de seguridad -->
        <div class="flex justify-center space-x-12">
            <!-- Envíos garantizados 24/7 -->
            <div class="flex flex-col items-center">
                <div class="bg-yellow-100 p-4 rounded-full mb-4">
                    <i class="fas fa-truck-loading text-yellow-500 text-6xl"></i>
                </div>
                <p class="text-xl font-semibold text-gray-700">Envíos Garantizados 24/7</p>
            </div>
    
            <!-- Devolución segura -->
            <div class="flex flex-col items-center">
                <div class="bg-red-100 p-4 rounded-full mb-4">
                    <i class="fas fa-undo-alt text-red-500 text-6xl"></i>
                </div>
                <p class="text-xl font-semibold text-gray-700">Devolución Segura</p>
            </div>
    
            <!-- Pagos contraentrega -->
            <div class="flex flex-col items-center">
                <div class="bg-green-100 p-4 rounded-full mb-4">
                    <i class="fas fa-money-bill-wave text-green-500 text-6xl"></i>
                </div>
                <p class="text-xl font-semibold text-gray-700">Pagos Contraentrega</p>
            </div>
    
            <!-- Atención al cliente 24/7 -->
            <div class="flex flex-col items-center">
                <div class="bg-blue-100 p-4 rounded-full mb-4">
                    <i class="fas fa-headset text-blue-500 text-6xl"></i>
                </div>
                <p class="text-xl font-semibold text-gray-700">Atención al Cliente 24/7</p>
            </div>
        </div>
    </div>
    

</section>

@endsection