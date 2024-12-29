@extends('layouts.plantilla')

@section('tittle', 'Carrito de Compras')
@section('content')

<div class=" mb-12">
    <div class="flex items-center space-x-4">
        <i class="fas fa-shopping-cart text-blue-500 text-4xl"></i>
        <h1 class="text-4xl font-bold">
          <span class="text-blue-500">Tu Carrito</span>
          <span class="text-green-500">de Compras</span>
        </h1>
      </div>
      

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if(empty($carrito))
        <p class="text-gray-600">El carrito está vacío.</p>
    @else
        <!-- Contenedor de los productos -->
        <div class="space-y-4">
            @foreach($carrito as $item)
                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-4 p-4 border-b">
                    <div class="flex-shrink-0">
                        @if(isset($item['imagen']) && !empty($item['imagen']))
                            <img src="{{ $item['imagen'] }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover rounded-md">
                        @else
                            <span>No disponible</span>
                        @endif
                    </div>
                    <div class="flex-1">
                        <span class="text-lg font-semibold block">{{ $item['name'] }}</span>
                        <p class="text-gray-600">{{ $item['descripcion'] ?? 'Sin descripción' }}</p>
                    </div>
                    <div class="flex sm:flex-col sm:items-center gap-2 sm:gap-4">
                        <span class="text-gray-800">Cantidad: {{ $item['cantidad'] }}</span>
                        <span class="text-lg font-semibold">${{ number_format($item['price'], 0, ',', '.') }}</span>
                        <span class="text-lg font-semibold">Total: ${{ number_format($item['price'] * $item['cantidad'], 0, ',', '.') }}</span>
                    </div>
                    <div>
                        <form action="{{ route('carrito.eliminar', $item['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 flex items-center gap-2">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Subtotal y botón para abrir el modal -->
        <div class="mt-6 flex flex-col sm:flex-row justify-between items-center gap-4">
            <span class="text-xl font-semibold">Subtotal: ${{ number_format($subtotal, 0, ',', '.') }}</span>
            <button id="openModal" class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 flex items-center gap-2">
                <i class="fas fa-credit-card"></i> Pide y paga al recibir
            </button>
        </div>

        <div class="mt-4 text-center">
            <a href="{{ route('productos.index') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 flex items-center gap-2 justify-center">
                <i class="fas fa-arrow-left"></i> Seguir comprando
            </a>
        </div>

        <form action="{{ route('carrito.vaciar') }}" method="POST" class="mt-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-6 py-3 rounded-lg hover:bg-red-600 flex items-center gap-2 w-full sm:w-auto">
                <i class="fas fa-trash"></i> Vaciar carrito
            </button>
        </form>
    @endif
</div>

<!-- Modal -->
<div id="modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg w-11/12 sm:w-2/3 lg:w-1/2 relative shadow-lg">
        
        <!-- Botón para cerrar el modal -->
        <button id="closeModal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-xl">
            <i class="fas fa-times-circle"></i>
        </button>

        <!-- Título del Modal con ícono de seguridad -->
        <h2 class="text-2xl font-semibold mb-4 flex items-center gap-2 text-gray-800">
            <i class="fas fa-lock text-green-500"></i> Compra segura y con confianza
        </h2>

        <!-- Descripción de garantía con ícono -->
        <p class="mb-4 text-gray-600 flex items-center gap-2">
            <i class="fas fa-shield-alt text-green-500"></i> Los productos tienen garantía de calidad y aceptamos devoluciones si no estás satisfecho con tu pedido.
        </p>
        
        <!-- Sección de productos -->
        <div class="space-y-4">
            @foreach($carrito as $item)
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        @if(isset($item['imagen']) && !empty($item['imagen']))
                        <img src="{{ $item['imagen'] }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover rounded-md">
                    @else
                        <span class="text-gray-500">No disponible</span>
                    @endif
                    </div>
                    <span class="text-gray-800">${{ number_format($item['price'], 0, ',', '.') }} x {{ $item['cantidad'] }}</span>
                </div>
            @endforeach
        </div>

        <!-- Subtotal -->
        <div class="mt-4 text-right font-semibold text-lg text-gray-800">
            Subtotal: ${{ number_format($subtotal, 0, ',', '.') }}
        </div>

        <!-- Envío Gratis -->
        <div class="mt-6 text-center border border-green-500 p-4 rounded-lg flex items-center justify-center gap-2 bg-green-50 text-green-700 font-semibold">
            <i class="fas fa-truck-fast"></i> ¡Envío gratis! Llega entre 3 a 5 días hábiles, depende de tu ciudad
        </div>

        <!-- Dirección -->
        <form action="{{ route('carrito.procesar') }}" method="POST" class="mt-6">
            @csrf
            <div class="space-y-4">
                <h3 class="text-xl font-semibold text-gray-800">Ingresa tu dirección completa</h3>

                <!-- Nombre y Teléfono -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <input type="text" name="nombre" class="p-2 border border-gray-300 rounded" placeholder="Nombre Completo" required>
                    <input type="text" name="telefono" class="p-2 border border-gray-300 rounded" placeholder="Teléfono" required>
                </div>

                <!-- Dirección -->
                <input type="text" name="direccion" class="p-2 border border-gray-300 rounded w-full" placeholder="Dirección" required>

                <!-- Departamento y Ciudad -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <select id="departamento-select" name="departamento" class="p-2 border border-gray-300 rounded" required>
                        <option value="">Selecciona Departamento</option>
                    </select>
                
                    <select id="ciudad-select" name="ciudad" class="p-2 border border-gray-300 rounded" required disabled>
                        <option value="">Selecciona Ciudad</option>
                    </select>
                </div>
            </div>

            <!-- Botón Final y Total -->
            <div class="mt-6 flex justify-between items-center">
                <span class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <i class="fas fa-cash-register"></i> Total: ${{ number_format($subtotal, 0, ',', '.') }} <i class="fas fa-truck"></i> (Envío gratis)
                </span>
                <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 transition-all duration-300 transform hover:scale-105 flex items-center gap-2 shadow-lg">
                    <i class="fas fa-check-circle"></i> Completa tu pedido
                </button>
            </div>
        </form>
    </div>
</div>
<!-- Modal de agradecimiento -->
<!-- Modal de agradecimiento -->
<div id="thankYouModal" class="{{ session('showModal') ? 'flex' : 'hidden' }} fixed inset-0 bg-gray-600 bg-opacity-50 items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg w-11/12 sm:w-2/3 lg:w-1/2">
        <!-- Encabezado con icono y texto grande -->
        <div class="flex items-center justify-center mb-4">
            <i class="fas fa-gift text-4xl text-blue-600 mr-3"></i> <!-- Icono de regalo FontAwesome -->
            <h2 class="text-3xl font-bold text-center text-gray-800">¡Gracias por su Pedido! 🎉</h2>
        </div>
        
        <!-- Mensaje con texto grande -->
        <p class="text-lg text-gray-600 text-center mb-6">
            {{ session('message') }}
        </p>
        
        <!-- Botón para cerrar el modal con icono -->
        <div class="flex justify-center">
            <button id="closeThankYouModal" class="bg-blue-500 text-white px-6 py-2 rounded-full hover:bg-blue-600 transition duration-300 flex items-center">
                <i class="fas fa-times mr-2"></i> Cerrar
            </button>
        </div>
    </div>
</div>


<script>
    // Mostrar el modal si la sesión tiene 'showModal'
    window.addEventListener('load', function() {
        if (document.getElementById('thankYouModal') && {{ session('showModal') ? 'true' : 'false' }}) {
            document.getElementById('thankYouModal').classList.remove('hidden');
            document.getElementById('thankYouModal').classList.add('flex');
        }
    });

    // Cerrar el modal
    document.getElementById('closeThankYouModal')?.addEventListener('click', function() {
        document.getElementById('thankYouModal').classList.add('hidden');
    });
</script>

<script>
    // Mostrar el modal al hacer clic en el botón
    document.getElementById('openModal').addEventListener('click', function() {
        const modal = document.getElementById('modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex'); // Añadimos `flex` al mostrar el modal
    });

    // Cerrar el modal
    document.getElementById('closeModal').addEventListener('click', function() {
        const modal = document.getElementById('modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex'); // Quitamos `flex` al ocultar el modal
    });
</script>

@endsection
