<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto');
    }

    public function enviarCorreo() {
        $toEmail = 'correo_destino@example.com';
        $subject = 'Asunto del correo';
        $mensaje = 'Contenido del mensaje.';
    
        Mail::send([], [], function($message) use($toEmail, $subject, $mensaje) {
            $message->to($toEmail)
                    ->subject($subject)
                    ->html($mensaje)
                    ->from('DanielGBT.20151@Gmail.com', 'Daniel Urbano');
        });
    
        return "Correo enviado exitosamente.";
    }
}


