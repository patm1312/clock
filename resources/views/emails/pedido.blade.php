<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Pedido</title>
</head>
<body>
    <h1>Nuevo Pedido de {{ data_get($datosFormulario, 'nombre', 'Nombre no proporcionado') }}</h1>
    <p><strong>Teléfono:</strong> {{ data_get($datosFormulario, 'telefono', 'No proporcionado') }}</p>
    <p><strong>Dirección:</strong> {{ data_get($datosFormulario, 'direccion', 'No proporcionada') }}</p>
    <p><strong>Departamento:</strong> {{ data_get($datosFormulario, 'departamento', 'No proporcionado') }}</p>
    <p><strong>Ciudad:</strong> {{ data_get($datosFormulario, 'ciudad', 'No proporcionada') }}</p>
    
    <h2>Productos en el carrito:</h2>
    <ul>
        @foreach ($carrito as $producto)
            <li>{{ $producto['name'] }} - {{ $producto['cantidad'] }} x {{ $producto['price'] }}</li>
            
        @endforeach
        <p>Total:</p>
        <h3>Subtotal: ${{ number_format($subtotale, 0, ',', '.') }}</h3>
    </ul>
</body>
</html>
