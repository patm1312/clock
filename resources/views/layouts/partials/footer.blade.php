<footer class="bg-blue-200 text-blue-900 py-8">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Sección 1: Descripción corta de la tienda -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-6">
            <div>
            
                    <img class="w-34  mx-auto" src="{{ asset('images/web/logo.png') }}" alt="logo">
             
                <p class="text-sm">Tienda en línea de productos para tu mascota. Ofrecemos lo mejor para tus amigos peludos con la comodidad de comprar desde casa.</p>
            </div>
            <div class="flex justify-center items-center">
                <i class="fas fa-paw text-4xl"></i> <!-- Icono de la tienda -->
            </div>
        </div>

        <!-- Sección 2: Atención al cliente -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-6">
            <div class="col-span-1 sm:col-span-2 md:col-span-4">
                <h3 class="text-xl font-semibold mb-2">Atención al Cliente</h3>
                <p class="text-sm">Contáctanos para resolver tus dudas o problemas.</p>
                <ul class="mt-4 text-sm">
                    <li><a href="tel:+573001234567" class="whatsapp text-blue-800 hover:text-blue-600"></a></li>
                    <li><a id="correo" href="mailto:contacto@mitienda.com" class="correo text-blue-800 hover:text-blue-600"></a></li>
                    <li><a id="correo" href="mailto:contacto@mitienda.com" class="direccion text-blue-800 hover:text-blue-600"></a></li>
                </ul>
                <a href="https://wa.me/573107274921?text=Hola,%20estoy%20interesado%20en%20comprar%20este%20producto"
                class="flex items-center justify-start py-2 px-4 bg-transparent border-2 border-green-600 text-green-600 text-lg font-medium rounded-full shadow-sm hover:bg-green-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-green-400 transition duration-200 ease-in-out max-w-fit mt-4">
                 <!-- Icono de WhatsApp de FontAwesome con tamaño más grande -->
                 <i class="fab fa-whatsapp w-18 h-18 mr-4"></i> <!-- Aumentar el tamaño del icono a w-12 h-12 -->
                 <span class="text-xl font-semibold">Contactar por WhatsApp</span> <!-- Aumentar el tamaño de la letra -->
             </a>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-6">
            <div class="col-span-1 sm:col-span-2 md:col-span-4">
                <i class="fas fa-handshake text-blue-600 text-5xl"></i> <!-- Ícono más grande -->
                <div class="flex space-x-4 mt-4">
                   
            <h2 class="text-blue-600 font-bold text-2xl">Pago Contra Entrega</h2> <!-- Texto más grande -->
                </div>
            </div>
        </div>
        
        <!-- Sección 4: Empresas que respaldan -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-6">
            <div class="col-span-1 sm:col-span-2 md:col-span-4">
                <h3 class="text-xl font-semibold mb-2">Empresas que Respalda</h3>
                <p class="text-sm">Con el respaldo de importantes empresas colombianas que garantizan envíos seguros y pagos contra entrega.</p>
                <div class="flex space-x-4 mt-4">
                    <!-- Logos de empresas, usando iconos de una librería gratuita -->
                    <img src="{{ asset('images/web/envia.png') }}" alt="Descripción de la imagen" class="w-16 h-auto">
                    <img src="{{ asset('images/web/industria.png') }}" alt="Descripción de la imagen" class="w-16 h-auto">
                    {{-- <i class="fab fa-envira text-3xl">
                     
</i> <!-- Icono de Envia --> --}}
                    {{-- <i class="fab fa-cogs text-3xl"></i> <!-- Icono de Coordinadora --> --}}
                    {{-- <i class="fas fa-truck-moving text-3xl"></i> <!-- Icono de Interrapidisimo -->
                    {{-- <i class="fas fa-building text-3xl"></i> <!-- Icono de Cámara de Comercio --> --}}
                    {{-- <i class="fas fa-gavel text-3xl"></i> <!-- Icono de Superintendencia de Industria y Comercio -->
                    <i class="fas fa-globe text-3xl"></i> <!-- Icono de Cámara Colombiana de Comercio Electrónico --> --}} 
                </div>
            </div>
        </div>
        

        <!-- Sección 5: Políticas -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-6">
            <div class="col-span-1 sm:col-span-2 md:col-span-4">
                <h3 class="text-xl font-semibold mb-2">Políticas</h3>
                <ul class="mt-4 text-sm">
                    <a href="{{ route('quienes_somos') }}" class="hover:underline">¿Quiénes Somos?</a>
                    <a href="{{ route('politica_privacidad') }}" class="hover:underline ml-4">Política de Privacidad</a>
                    <a href="{{ route('terminos_condiciones') }}" class="hover:underline ml-4">Términos y Condiciones</a>
                </ul>
            </div>
        </div>

        <!-- Sección 6: Enlaces rápidos y redes sociales -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            <div class="col-span-1 sm:col-span-2 md:col-span-4">
                <h3 class="text-xl font-semibold mb-2">Enlaces Rápidos</h3>
                <ul class="mt-4 text-sm">
                    <li><a href="{{ route('inicio') }}" class="text-blue-800 hover:text-blue-600">Inicio</a></li>
                    <li><a href="{{route('productos.index')}}" class="text-blue-800 hover:text-blue-600">Catálogo</a></li>
                    <li><a href="{{ route('contacto') }}" class="text-blue-800 hover:text-blue-600">Contacto</a></li>
                </ul>
            </div>
            <div class="col-span-1 sm:col-span-2 md:col-span-4 mt-6">
                <h3 class="text-xl font-semibold mb-2">Síguenos</h3>
               
            </div>
        </div>
    </div>
</footer>
