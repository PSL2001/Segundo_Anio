<?php

namespace App\Http\Controllers;

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
        //$post = Post::orderBy('id', 'DESC')->get();
        $post = Post::orderBy('id', 'DESC')->paginate(5);
        return view('posts.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        //1- Validamos el form
        $request->validate([
            'titulo' => ['required', 'string', 'min:5', 'unique:posts,titulo'],
            'resumen' => ['required', 'string', 'min:5'],
            'contenido' => ['required', 'string', 'min:15']
        ]);
        //Si llego aqui la validacion ha ido bien, guardamos los datos
        Post::create($request->all());
        return redirect()->route('post.index')->with("mensaje", "Post Creado");
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
        return view('posts.edit', compact('post'));
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
         //1- Validamos el form
         $request->validate([
            'titulo' => ['required', 'string', 'min:5', 'unique:posts,titulo,'.$post->id],
            'resumen' => ['required', 'string', 'min:5'],
            'contenido' => ['required', 'string', 'min:15']
        ]);
        //Si llego aqui la validacion ha ido bien, guardamos los datos
        $post->update($request->all());
        return redirect()->route('post.index')->with("mensaje", "Post Actualizado");

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
        return redirect()->route('post.index')->with("mensaje", "Post Eliminado");
    }
}
