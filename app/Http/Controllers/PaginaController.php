<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PaginaController extends Controller
{
    public function index()
    {
          // Cargar productos desde el archivo JSON
          $productos = json_decode(Storage::get('data/productos.json'), true);

                // Leer el archivo JSON desde la carpeta public/js/data/
                $jsonContent = file_get_contents(public_path('js/data/admin.json'));

                // Intentar decodificar el JSON
                $faqData = json_decode($jsonContent, true);
        
                // Verificar si la decodificación fue exitosa
                if (json_last_error() !== JSON_ERROR_NONE) {
                    throw new \Exception('Error al decodificar el archivo JSON: ' . json_last_error_msg());
                }
        
                // Obtener la sección de FAQ
                $faq = $faqData['faq'] ?? [];
        // Retornar la vista 'index' con los productos y FAQ
        return view('index', compact('productos', 'faq'));
    }

    public function contacto()
{
    try {
        // Leer el archivo JSON desde la carpeta public
        $jsonContent = file_get_contents(public_path('js/data/admin.json'));

        // Intentar decodificar el JSON
        $contactoData = json_decode($jsonContent, true);

        // Verificar si la decodificación fue exitosa
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Error al decodificar el archivo JSON: ' . json_last_error_msg());
        }

        // Enviar la información a la vista
        return view('contacto', compact('contactoData'));

    } catch (\Exception $e) {
        // Manejo de error: muestra el mensaje de error
        abort(500, 'Error al cargar los datos de contacto: ' . $e->getMessage());
    }
}
public function quienesSomos()
{
    try {
        $jsonContent = file_get_contents(public_path('js/data/admin.json'));
        $data = json_decode($jsonContent, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Error al decodificar el archivo JSON: ' . json_last_error_msg());
        }

        return view('quienes_somos', compact('data'));
    } catch (\Exception $e) {
        abort(500, 'Error al cargar los datos de contacto: ' . $e->getMessage());
    }
}

public function politicaPrivacidad()
{
    try {
        $jsonContent = file_get_contents(public_path('js/data/admin.json'));
        $data = json_decode($jsonContent, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Error al decodificar el archivo JSON: ' . json_last_error_msg());
        }

        return view('politica_privacidad', compact('data'));
    } catch (\Exception $e) {
        abort(500, 'Error al cargar los datos de contacto: ' . $e->getMessage());
    }
}

public function terminosCondiciones()
{
    try {
        $jsonContent = file_get_contents(public_path('js/data/admin.json'));
        $data = json_decode($jsonContent, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Error al decodificar el archivo JSON: ' . json_last_error_msg());
        }

        return view('terminos_condiciones', compact('data'));
    } catch (\Exception $e) {
        abort(500, 'Error al cargar los datos de contacto: ' . $e->getMessage());
    }
}

}
