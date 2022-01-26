<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(6);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Category::orderBy('nombre')->get();
        $tags = Tag::orderBy('nombre')->get();
        return view('posts.create', compact('categorias', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1. Validamos los datos que recibimos
        $request->validate([
            'titulo'=>['required', 'string', 'min:3', 'unique:posts,titulo'],
            'resumen'=>['required', 'string', 'min:6'],
            'contenido'=>['required', 'string', 'min:10'],
            'imagen'=>['required', 'image', 'max:1024'],
            'tags'=>['required']
        ]);
        //Si llegamos aqui hemos hecho todas las correcciones, guardamos
        //2. Guardamos el post con la imagen
        if ($request->file('imagen')) {
            #Se ha subido la imagen la almaceno fisicamente
            $url = Storage::put('public/posts', $request->file('imagen'));
        }
        //Guardo el post en la base de datos
        $post = Post::create($request->all());
        $post->update([
            'imagen'=>$url
        ]);
        //Almacenamos en la tabla post_tag los tags de este post
        $post->tags()->attach($request->tags);
        //-------
        return redirect()->route('posts.index')->with('mensaje', 'Post Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categorias = Category::orderBy('nombre')->get();
        $tags = Tag::orderBy('nombre')->get();
        return view('posts.edit', compact('post', 'tags', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //1. Borro la imagen asociada al post
        Storage::delete("public/".$post->imagen);
        //2. Borro el post
        $post->delete();
        //3. Redireccionamos
        return redirect()->route('posts.index')->with('mensaje', 'Post Borrado');
    }
}
