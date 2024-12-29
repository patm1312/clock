<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function show(Request $request)
    {
        // Obtener el código del producto desde la solicitud GET
        $codigo = $request->query('codigo');

        // Verificar si el código del producto fue proporcionado
        if (!$codigo) {
            return redirect()->route('productos.index')->with('error', 'El código del producto es necesario.');
        }

        // Cargar los productos desde el archivo JSON
        $productos = json_decode(Storage::get('data/productos.json'), true);

        // Buscar el producto con el código proporcionado
        $producto = collect($productos)->firstWhere('codigo', $codigo);

        // Si el producto no existe, mostrar error 404
        if (!$producto) {
            return abort(404, 'Producto no encontrado');
        }

        // Pasar el producto a la vista
        return view('producto.show', compact('producto'));
    }
}
