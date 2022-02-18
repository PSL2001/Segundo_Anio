<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function pintarForm()
    {
        return view('contacto.index');
    }

    public function procesarForm(Request $request)
    {
        $request->validate([
            'nombre'=>['required', 'string', 'min:5'],
            'mensaje'=>['required', 'string', 'min:10']
        ]);
        //Hemos pasado la validacion
        $correo = new ContactoMailable($request->all(), auth()->user()->email);
        try {
            Mail::to('admin@correo.org')->send($correo);
            return redirect()->route('dashboard')->with('infomail', "Se ha enviado el mensaje");
        } catch (\Exception $ex) {
            return redirect()->route('dashboard')->with('errmail', 'No se pudo enviar el correo intentelo mas tarde');
        }
    }
}
