<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMailable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function pintarFormulario() {
        return view('contacto.index');
    }

    public function procesarFormulario(Request $request) {
        $request->validate([
            'nombre'=>['required', 'string', 'min:3'],
            'mensaje'=>['required', 'string', 'min:10']
        ]);
        // Si paso de aqui la validacion ha ido bien
        $correo = new ContactoMailable($request->all(), auth()->user()->email); //auth()->user()->email devuelve el correo del usuario registrado
        try {
            Mail::to('admin@correo.es')->send($correo);
        } catch (Exception $ex) {
            dd($ex->getMessage());
            return redirect()->route('posts.show')->with('correo', "Hubo un error al enviar el correo, intentelo mas tarde");
        }
        return redirect()->route('posts.show')->with('correo', "Correo enviado");
    }
}
