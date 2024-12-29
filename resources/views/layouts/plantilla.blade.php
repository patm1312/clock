<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="{{ asset('js/banner.js') }}" defer></script> <!-- Vincula el archivo JS -->
    <script src="{{ asset('js/letra.js') }}" defer></script> <!-- Vincula el archivo JS -->
    <script src="{{ asset('js/zoomimg.js') }}" defer></script> <!-- Vincula el archivo JS -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  


</head>
<body> 
   

    @include('layouts.partials.header')

    
    <main class=" border-black mx-4 sm:mx-8 md:mx-16 lg:mx-32 xl:mx-48 2xl:mx-64 mt-16">

        @yield('content')
        <!-- Botón de carrito (parte inferior derecha) -->
<a href="{{ route('carrito.mostrar') }}" class="fixed bottom-24 right-5 bg-blue-600 text-white p-4 rounded-full shadow-lg hover:bg-blue-700 transition duration-200 z-50">
    <i class="fas fa-shopping-cart"></i> <!-- Icono de carrito de compras -->
</a>
            <!-- Botón flotante de WhatsApp -->
            <a id="whatsapp" href="https://wa.me/1234567890?text=Hola,%20quiero%20información%20acerca%20de%20sus%20productos" target="_blank" class="whatsapp fixed bottom-4 right-4 bg-green-500 hover:bg-green-700 text-white p-4 rounded-full shadow-lg transition transform hover:scale-105 z-[1000]">
                Contactar por WhatsApp
            </a>
            
        <script src="{{ asset('js/faq.js') }}" defer></script>
        <script src="{{ asset('js/pedido.js') }}" defer></script>
        <script src="{{ asset('js/admin.js') }}" defer></script>
        <script src="{{ asset('js/carrusel.js') }}" defer></script>
    </main>


    @include('layouts.partials.footer')
    
    
</body>
</html>