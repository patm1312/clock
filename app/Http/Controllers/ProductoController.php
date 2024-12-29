<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        // Cargar productos desde el archivo JSON
        $productos = json_decode(Storage::get('data/productos.json'), true);

        // Filtrar por código si se envían parámetros
        if ($request->has('codigo')) {
            $productos = array_filter($productos, function($producto) use ($request) {
                return $producto['codigo'] === $request->codigo;
            });
        }

        // Filtrar por precio si se envían parámetros
        if ($request->has('precio')) {
            $productos = array_filter($productos, function($producto) use ($request) {
                return $producto['precio'] <= $request->precio;
            });
        }

        // Ordenar por precio si se especifica
        if ($request->has('orden')) {
            if ($request->orden == 'asc') {
                usort($productos, function($a, $b) {
                    return $a['precio'] <=> $b['precio']; // Menor a mayor
                });
            } elseif ($request->orden == 'desc') {
                usort($productos, function($a, $b) {
                    return $b['precio'] <=> $a['precio']; // Mayor a menor
                });
            }
        }

        // Paginación
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 6; // Número de productos por página
        $currentResults = array_slice($productos, ($currentPage - 1) * $perPage, $perPage);
        $productosPaginados = new LengthAwarePaginator($currentResults, count($productos), $perPage, $currentPage, [
            'path' => $request->url(),
            'query' => $request->query(),
        ]);

        return view('productos.index', compact('productosPaginados'));
    }
}
