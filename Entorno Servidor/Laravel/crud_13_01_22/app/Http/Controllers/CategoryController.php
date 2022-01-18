<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('nombre')->get();
        return view('categories.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1. Validamos los datos del formulario
        $request->validate([
            'nombre'=>['required', 'string', 'min:3', 'unique:categories,nombre'],
            'descripcion' =>['required', 'string', 'min:5']
        ]);
        //Si las validaciones estan bien guardamos los datos
        Category::create($request->all());
        return redirect()->route('categories.index')->with('mensaje', "Categoria Creada");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //1. Validamos los datos del formulario
        $request->validate([
            'nombre'=>['required', 'string', 'min:3', 'unique:categories,nombre,'.$category->id],
            'descripcion' =>['required', 'string', 'min:5']
        ]);
        $category->update($request->all());
        return redirect()->route('categories.index')->with('mensaje', "Categoría Modificada");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('mensaje', "Categoría Borrada");

    }
}
