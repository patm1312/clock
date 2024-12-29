@extends('layouts.plantilla') 

@section('tittle', 'Home')
@section('content')

<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-extrabold text-center text-blue-600 mb-8">Términos y Condiciones</h1>

    <div class="bg-white p-6 rounded-lg shadow-lg">
        <p class="text-gray-600">{{ $data['politicas']['terminos_condiciones'] }}</p>
    </div>
</div>
@endsection
