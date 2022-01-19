<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::orderBy('id', 'DESC')->paginate(5);
        return view('posts.index', compact('post'));
    }
    public function index1($id) {
        $post = Post::where('category_id', $id)->orderBy('id', 'DESC')->paginate(5);
        $flag = true;
        return view('posts.index', compact('post', 'flag', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Category::orderBy('nombre')->get();
        return view('posts.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1. Hacemos la validaciones
        $request->validate([
            'titulo'=>['required', 'string', 'min:3', 'max:40' ,'unique:posts,titulo'],
            'resumen'=>['required', 'string', 'min:5'],
            'contenido'=>['required', 'string', 'min:10'],
        ]);
        //2. Guardo los datos
        Post::create($request->all());
        //Mostramos un mensaje
        return redirect()->route('post.index')->with('mensaje', "Post Creado");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
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
        return view('posts.edit', compact('post', 'categorias'));
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
        //Validamos
        $request->validate([
            'titulo'=>['required', 'string', 'min:3', 'max:40' ,'unique:posts,titulo,'.$post->id],
            'resumen'=>['required', 'string', 'min:5'],
            'contenido'=>['required', 'string', 'min:10'],
        ]);
        //Actualizamos
        $post->update($request->all());
        return redirect()->route('post.index')->with('mensaje', "Post Editado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('mensaje', "Post Borrado");
    }
}
