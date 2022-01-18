<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Article::orderBy('id', 'DESC')->paginate(5);
        return view('articles.index', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1. Validamos el formulario
        $request->validate([
            'titulo'=>['required', 'string', 'min:5'],
            'descripcion'=>['required', 'string', 'min:10']
        ]);
        //2. Si la validacion ha ido bien, guardamos los datos
        Article::create($request->all());
        return redirect()->route('articles.index')->with('mensaje','Articulo Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
         //1. Validamos el formulario
         $request->validate([
            'titulo'=>['required', 'string', 'min:5'],
            'descripcion'=>['required', 'string', 'min:10']
        ]);
        $article->update($request->all());
        return redirect()->route('articles.index')->with('mensaje','Articulo Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('mensaje','Articulo Borrado');
    }
}
