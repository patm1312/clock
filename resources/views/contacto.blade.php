@extends('layouts.plantilla') 

@section('tittle', 'Home')
@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-extrabold text-center text-blue-600 mb-8">¡Contáctanos!</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Dirección -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Dirección</h2>
            <p class="text-gray-600">{{ $contactoData['contacto']['direccion'] }}</p>
        </div>

        <!-- Información de contacto -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Información de contacto</h2>

            <!-- Teléfonos -->
            @foreach ($contactoData['contacto']['telefonos'] as $telefono)
                @if($telefono['numero'])
                    <div class="mb-4">
                        <p class="flex items-center text-gray-600">
                            <i class="fas fa-phone-alt text-blue-500 mr-2"></i>
                            {{ $telefono['tipo'] }}: <a href="tel:{{ $telefono['numero'] }}" class="text-blue-600 hover:underline">{{ $telefono['numero'] }}</a>
                        </p>
                    </div>
                @endif
            @endforeach

            <!-- Correos -->
            @foreach ($contactoData['contacto']['correos'] as $correo)
                <div class="mb-4">
                    <p class="flex items-center text-gray-600">
                        <i class="fas fa-envelope text-blue-500 mr-2"></i>
                        Correo: <a href="mailto:{{ $correo['correo'] }}" class="text-blue-600 hover:underline">{{ $correo['correo'] }}</a>
                    </p>
                </div>
            @endforeach

            <!-- Redes Sociales -->
            @foreach ($contactoData['contacto']['social'] as $social)
                <div class="mb-4">
                    <p class="flex items-center text-gray-600">
                        <i class="fab fa-facebook text-blue-500 mr-2"></i>
                        Facebook: <a href="{{ $social['correo'] }}" target="_blank" class="text-blue-600 hover:underline">{{ $social['correo'] }}</a>
                    </p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Horarios -->
    <div class="bg-white p-6 rounded-lg shadow-lg mt-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Horarios de atención</h2>
        <ul class="list-disc pl-6 text-gray-600">
            <li><strong>Lunes a Viernes:</strong> {{ $contactoData['contacto']['horarios']['lunes_viernes'] }}</li>
            <li><strong>Sábado:</strong> {{ $contactoData['contacto']['horarios']['sabado'] }}</li>
            <li><strong>Domingo:</strong> {{ $contactoData['contacto']['horarios']['domingo'] }}</li>
        </ul>
    </div>
</div>
<section class="bg-white dark:bg-gray-900">
    @if (session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
        <p>{{ session('success') }}</p>
    </div>
    @endif

    @if ($errors->has('error'))
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
        <p>{{ $errors->first('error') }}</p>
    </div>
    @endif
    
    <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Contáctanos:</h2>
        <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">¿Tienes alguna pregunta sobre nuestros productos? ¿Deseas obtener más información sobre envíos a Colombia o necesitas asistencia con tu pedido?
            Estamos aquí para ayudarte. Ya sea que tengas preguntas sobre disponibilidad, necesites detalles de envío, o quieras hacer una solicitud o reclamo, no dudes en contactarnos. Tu satisfacción es nuestra prioridad y nos esforzamos para brindarte el mejor servicio.</p>
        <form action="{{ route('send.message') }}" method="POST" class="space-y-8">
            @csrf <!-- Asegúrate de incluir @csrf para proteger contra ataques CSRF -->
            
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tu correo electrónico</label>
                <input type="email" id="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="nombre@dominio.com" required>
            </div>
            
            <div>
                <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Asunto</label>
                <input type="text" id="subject" name="subject" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Cuéntanos cómo podemos ayudarte" required>
            </div>
            
            <div class="sm:col-span-2">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Tu mensaje</label>
                <textarea id="message" name="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Deja un comentario..." required></textarea>
            </div>
            
            <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Enviar mensaje
            </button>
            
        </form>
        
    </div>
</section>

@endsection