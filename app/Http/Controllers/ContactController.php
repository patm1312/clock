<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        echo 'route contacto enviar';
    
        // Validar manualmente para evitar redirección automática en caso de error
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            // Mostrar los errores (sin redireccionar)
            echo 'Errores de validación: ';
            dd($validator->errors());
        }
    
        try {
            // Intentar enviar el correo
            Mail::to('patmpedro233@gmail.com')->send(new ContactMail($request->all()));
    
            // Retornar una vista de éxito
            return redirect()->back()->with('success', 'Mensaje enviado correctamente.');
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Hubo un problema al enviar el correo.']);
        }
    }
}
