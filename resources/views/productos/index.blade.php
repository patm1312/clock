@extends('layouts.plantilla')

@section('tittle', 'Home')

@section('content')
<div class="text-center my-12">
    <h1 class="text-4xl font-extrabold text-gray-800">
        <i class="fas fa-cogs text-blue-600 mr-3"></i>
        ¡Descubre nuestros productos más destacados!
    </h1>
    <p class="deletrear text-lg text-gray-600 mt-2">Encuentra la mejor calidad al mejor precio</p>
</div>
<div class="p-6">
    <!-- Filtro de orden de precio -->
    <form action="{{ route('productos.index') }}" method="GET" class="mb-6">
        <label for="orden" class="block text-gray-700 font-semibold mb-2">Ordenar por precio:</label>
        <select name="orden" id="orden" class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:border-blue-500">
            <option value="asc" {{ request('orden') == 'asc' ? 'selected' : '' }}>Menor a mayor</option>
            <option value="desc" {{ request('orden') == 'desc' ? 'selected' : '' }}>Mayor a menor</option>
        </select>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-200">Ordenar</button>
    </form>

    <!-- Lista de productos -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($productosPaginados as $producto)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <a href="{{ route('producto.show', ['codigo' => $producto['codigo']]) }}">
                <!-- Mostrar solo la primera imagen si existe -->
                @foreach($producto['media'] as $media)
                @if($media['tipo'] == 'imagen')
                    <img src="{{ asset($media['url']) }}" alt="{{ $producto['nombre'] }}" class="zoom-image w-full h-64 object-cover">
                    @break
                @endif
                @endforeach
    
                <div class="p-4">
                    <!-- Nombre del producto, estilo más grande y negrita -->
                    <h2 class="text-2xl font-extrabold text-blue-600">{{ $producto['nombre'] }}</h2>
                    
                    <!-- Descripción recortada a 15 caracteres -->
                    <p class="text-gray-600 mt-2">{{ \Str::limit($producto['descripcion'], 15) }}</p>
    
                    <!-- Precio con icono grande y destacado -->
                    <p class="text-gray-800 font-semibold mt-2 flex items-center text-3xl">
                        <i class="fas fa-dollar-sign text-green-500 text-4xl mr-3"></i>
                        {{ number_format($producto['precio'] * 4500, 2) }} COP
                    </p>
    
                    <!-- Oferta de descuento con icono pequeño -->
                    @if(isset($producto['descuento']) && $producto['descuento'] > 0)
                    <div class="mt-2 flex items-center text-sm text-red-500">
                        <i class="fas fa-tag text-red-500 text-xl mr-2"></i>
                        <span>¡Oferta de descuento!</span>
                    </div>
                    @endif
    
                    <!-- Detalles -->
                    <div class="mt-4">
                        <h3 class="font-medium text-gray-700">Detalles</h3>
                        <p class="text-gray-600">{{ \Str::limit($producto['detalles']['descripcion'], 30) }}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    

    <!-- Paginación -->
    <div class="mt-6">
        {{ $productosPaginados->links() }}
    </div>
</div>
<section>
    <div class="p-6 bg-gray-100 text-center">
        <!-- Título centrado -->
        <h2 class="deletrear text-4xl font-bold text-indigo-600 mb-8">Compra Segura</h2>

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
@endsection
