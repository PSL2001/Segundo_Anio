@extends('layouts.uno')
@section('titulo')
Modificar Post
@endsection
@section('cabecera')
Editar Post
@endsection
@section('contenido')
<form action="{{route('post.update', $post)}}" name="as" method="POST">
    {{-- @csrf es para evitar ataques, hay que ponerlo en todos los formularios --}}
    @csrf
    @method("PUT")
<div class="mb-3/4 bg-gray-400 rounded py-4 px-2 mx-auto">
<div>
    <label for="tit" class="block text-sm font-medium text-gray-700">Titulo Post</label>
    <input type="text" value="{{$post->titulo}}" name="titulo" id="tit" required class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-2 py-2 sm:text-sm border-gray-300 rounded-md" placeholder="Titulo">
    @error('titulo')
    <p class="text-sm text-red-500 mt-3">{{$message}}</p>
    @enderror
</div>
<div class="mt-2">
    <label for="res" class="block text-sm font-medium text-gray-700">Resumen Post</label>
    <input type="text" name="resumen" value="{{$post->resumen}}" id="res" required class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-2 py-2 sm:text-sm border-gray-300 rounded-md" placeholder="Resumen">
    @error('resumen')
    <p class="text-sm text-red-500 mt-3">{{$message}}</p>
    @enderror
</div>
<div class="mt-2">
    <label for="cont" class="block text-sm font-medium text-gray-700">Contenido del Post</label>
    <textarea name="contenido" id="cont" cols="30" rows="10" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-2 py-2 sm:text-sm border-gray-300 rounded-md">{{$post->contenido}}</textarea>
    @error('contenido')
    <p class="text-sm text-red-500 mt-3">{{$message}}</p>
    @enderror
</div>
<div class="mt-2">
    <label for="cat" class="block text-sm font-medium text-gray-700">Categoria del Post</label>
    <select name="category_id" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-2 py-2 sm:text-sm border-gray-300 rounded-md">
        @foreach ($categorias as $item)
        @if ($item->id == $post->category_id)
        <option value="{{$item->id}}" selected>{{$item->nombre}}</option>
        @else
        <option value="{{$item->id}}">{{$item->nombre}}</option>
        @endif

        @endforeach
    </select>
</div>
<div class="mt-2">
    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-save"></i> Guardar</button>
    <a href="{{route('post.index')}}" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-backward"></i> Volver</a>
</div>
</div>
@endsection
