<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class PedidoMail extends Mailable
{
    public $carrito;
    public $datosFormulario;
    public $subtotale;
    public function __construct($carrito, $datosFormulario, $subtotale)
    {
        $this->carrito = $carrito;
        $this->datosFormulario = $datosFormulario;
        $this->subtotale = $subtotale;
    }

    public function build()
    {
        return $this->view('emails.pedido') // Vista de correo
                    ->with([
                        'carrito' => $this->carrito,
                        'datosFormulario' => $this->datosFormulario,
                        'subtotale' => $this->subtotale,
                    ]);
    }
}
