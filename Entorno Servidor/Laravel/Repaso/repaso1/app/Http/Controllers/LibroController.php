<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::orderBy('id', 'desc')->paginate(5);
        return view('libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validaciones
        $request->validate([
            'titulo'=>['required', 'string', 'min:3', 'unique:libros,titulo'],
            'resumen'=>['required', 'string', 'min:5'],
            'portada'=>['required', 'image', 'max:2048']
        ]);
        //si estamos aqui se ha pasado la validacion
        $imagen = $request->portada->store('portada');
        Libro::create([
            'titulo'=>$request->titulo,
            'resumen'=>$request->resumen,
            'portada'=>$imagen
        ]);
        return redirect()->route('libros.index')->with('info', 'Libro Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        return view('libros.edit', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        //Validaciones
        $request->validate([
            'titulo'=>['required', 'string', 'min:3', 'unique:libros,titulo'.$libro->titulo],
            'resumen'=>['required', 'string', 'min:5'],
            'portada'=>['nullable', 'image', 'max:2048']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        //Borro la imagen
        Storage::delete($libro->portada);
        //Borro el libro
        $libro->delete();
        //Mostramos un aviso o alerta
        return redirect()->route('libros.index')->with('info', 'Libro borrado');
    }
}
