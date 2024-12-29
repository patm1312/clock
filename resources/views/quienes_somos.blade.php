@extends('layouts.plantilla') 

@section('tittle', 'Home')
@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-extrabold text-center text-blue-600 mb-8">¿Quiénes Somos?</h1>

    <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Misión</h2>
        <p class="text-gray-600">{{ $data['quienes_somos']['mision'] }}</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Visión</h2>
        <p class="text-gray-600">{{ $data['quienes_somos']['vision'] }}</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Valores</h2>
        <ul class="list-disc pl-6 text-gray-600">
            @foreach($data['quienes_somos']['valores'] as $valor)
                <li>{{ $valor }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection

