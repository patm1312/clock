<?php
namespace App\Http\Controllers;
use Exception;
use App\Mail\PedidoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailjetTestMail;
class CarritoController extends Controller
{
    // Cargar productos desde el archivo JSON
    public function mostrarProductos()
    {
        $productos = json_decode(Storage::get('data/productos.json'), true);
        return view('productos.index', compact('productos'));
    }

    // Agregar producto al carrito
    public function agregarAlCarrito(Request $request, $id)
    {
        $productos = json_decode(Storage::get('data/productos.json'), true);
        $producto = collect($productos)->firstWhere('codigo', $id);

        // Inicializar el carrito si no existe
        $carrito = session()->get('carrito', []);

        // Si el producto ya está en el carrito, incrementa la cantidad
        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad']++;
        } else {
            $carrito[$id] = [
                'id' => $producto['codigo'],
                'name' => $producto['nombre'],
                'price' => $producto['precio'],
                'cantidad' => 1
            ];
        }

        // Guardar el carrito en la sesión
        session(['carrito' => $carrito]);

        return redirect()->route('carrito.mostrar')->with('success', 'Producto agregado al carrito');
    }

    // Mostrar carrito
    public function mostrarCarrito()
    {
        $carrito = session()->get('carrito', []);
           // Calcular el subtotal
    $subtotal = 0;
    foreach ($carrito as $item) {
        $subtotal += $item['price'] * $item['cantidad'];
    }

    // Pasar los datos a la vista
    return view('carrito.index', compact('carrito', 'subtotal'));
    }

    // Eliminar producto del carrito
    public function eliminarDelCarrito($id)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            unset($carrito[$id]);
            session(['carrito' => $carrito]);
        }

        return redirect()->route('carrito.mostrar')->with('success', 'Producto eliminado del carrito');
    }

    // Vaciar carrito
    public function vaciarCarrito()
    {
        session()->forget('carrito');
        return redirect()->route('carrito.mostrar')->with('success', 'Carrito vaciado');
    }
    public function procesarPedido(Request $request)
{
    $datosFormulario = $request->validate([
        'nombre' => 'required|string|max:255',
        'telefono' => 'required|string|max:15',
        'direccion' => 'required|string|max:255',
        'departamento' => 'required|string',
        'ciudad' => 'required|string',
    ]);
    // dd($datosFormulario); 

    // Aquí procesas el pedido, por ejemplo, registrando la dirección en la base de datos
    // o realizando cualquier otro paso necesario, como crear un registro de pedido
//correo
// Obtener el carrito de la sesión
$carrito = session()->get('carrito', []);
$subtotale = 0;
foreach ($carrito as $item) {
    $subtotale += $item['price'] * $item['cantidad'];
}
try {
    // Intenta enviar el correo
    Mail::to('patmpedro233@gmail.com')->send(new PedidoMail($carrito, $datosFormulario, $subtotale));

     // Pasamos la variable `showModal` como true y un mensaje personalizado
  return redirect()->route('carrito.mostrar')->with([
     'success' => 'Pedido procesado correctamente.',
     'showModal' => true,
     'message' => '¡Gracias por su Pedido! 🎉 Nos comunicaremos contigo pronto para confirmar tu pedido. ✅ Te enviaremos el número de tu guía para que puedas rastrear tu envío 🚚 ¡Nos encanta tenerte como cliente! 😎'
 ]);
} catch (\Exception $e) {
    // Si ocurre un error, captura la excepción y muestra el mensaje
    echo 'Error al enviar el correo: ' . $e->getMessage();
}
    // Lógica para guardar el pedido

}
}
