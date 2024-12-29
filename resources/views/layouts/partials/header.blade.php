<header class="bg-white shadow-md fixed top-0 w-full z-50 h-30">
    <!-- Banner con cambio de texto -->
    <div class="bg-blue-200 text-blue-900 text-center py-2" id="banner">
        <span id="banner-text">ENVÍO GRATIS Y PAGO CONTRA ENTREGA</span>
        <span id="banner-icon" class="ml-2">🇨🇴</span>
    </div>
    <hr class="border-t border-blue-300"> <!-- Línea de separación entre el banner y el resto del header -->

    <!-- Navbar -->
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo -->
        <div>
            <a href="/" class="text-2xl font-bold text-blue-900">
                <img class="w-32  mx-auto" src="{{ asset('images/web/logo.png') }}" alt="logo">
            </a>
        </div>

        <!-- Icono del menú hamburguesa -->
        <div class="block lg:hidden">
            <button id="menu-toggle" class="text-blue-900 focus:outline-none">
                <!-- Icono de hamburguesa -->
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

        <!-- Menú de navegación -->
        <nav id="nav-menu" class="hidden lg:flex space-x-8">
            <a href="{{ route('inicio') }}" class="text-blue-800 hover:text-blue-500">Inicio</a>
            <a href="{{route('productos.index')}}" class="text-blue-800 hover:text-blue-500">Catálogo</a>
            <a href="{{ route('contacto') }}" class="text-blue-800 hover:text-blue-500">Contacto</a>
            <!-- Botón pequeño de carrito en el header -->
<a href="{{ route('carrito.mostrar') }}" class="text-blue-600 hover:text-blue-800 transition duration-200">
    <i class="fas fa-shopping-cart text-lg"></i> <!-- Icono de carrito más pequeño -->
</a>
        </nav>
    </div>

    <!-- Menú desplegable móvil -->
    <div id="mobile-menu" class="lg:hidden hidden bg-blue-200 text-blue-900 p-4 space-y-2">
        <a href="{{ route('inicio') }}" class="block hover:text-blue-500">Inicio</a>
        <a href="{{ route('productos.index') }}" class="block hover:text-blue-500">Catálogo</a>
        <a href="/contacto" class="block hover:text-blue-500">Contacto</a>
    </div>
</header>

<script>
    // JavaScript para mostrar y ocultar el menú hamburguesa en dispositivos móviles
    document.getElementById('menu-toggle').addEventListener('click', function () {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });
</script>

<!-- Espaciador para evitar que el contenido principal quede oculto debajo del header -->
<div class="pt-24"></div>
