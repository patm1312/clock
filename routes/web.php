<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ContactController;
use App;
Route::get('/', [PaginaController::class, 'index'])->name('inicio');
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/contacto', [PaginaController::class, 'contacto'])->name('contacto');
Route::post('/send-message', [ContactController::class, 'sendEmail'])->name('send.message');

Route::get('/quienes-somos', [PaginaController::class, 'quienesSomos'])->name('quienes_somos');
Route::get('/politica-privacidad', [PaginaController::class, 'politicaPrivacidad'])->name('politica_privacidad');
Route::get('/terminos-condiciones', [PaginaController::class, 'terminosCondiciones'])->name('terminos_condiciones');
// Ruta para ver los detalles de un solo producto
// Ruta para ver los detalles de un producto específico
Route::get('/producto', [ProductController::class, 'show'])->name('producto.show');



Route::get('/carrito', [CarritoController::class, 'mostrarCarrito'])->name('carrito.mostrar');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregarAlCarrito'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminarDelCarrito'])->name('carrito.eliminar');
Route::delete('/carrito/vaciar', [CarritoController::class, 'vaciarCarrito'])->name('carrito.vaciar');
// Ruta para procesar el pedido
Route::post('/carrito/procesar', [CarritoController::class, 'procesarPedido'])->name('carrito.procesar');
