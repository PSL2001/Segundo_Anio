@extends('layouts.uno')
@section('titulo')
Crear Categoria
@endsection
@section('cabecera')
Nueva Categoria
@endsection
@section('contenido')
<form action="{{route('category.store')}}" name="as" method="POST">
    {{-- @csrf es para evitar ataques, hay que ponerlo en todos los formularios --}}
    @csrf
<div class="mb-3/4 bg-gray-400 rounded py-4 px-2 mx-auto">
<div>
    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre Categoria</label>
    <input type="text" name="nombre" id="nombre" required class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-2 py-2 sm:text-sm border-gray-300 rounded-md" placeholder="Nombre Categoria">
    @error('nombre')
    <p class="text-sm text-red-500 mt-3">{{$message}}</p>
    @enderror
</div>
<div class="mt-2">
    <label for="desc" class="block text-sm font-medium text-gray-700">Descripcion Categoria</label>
    <input type="text" name="descripcion" id="desc" required class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-2 py-2 sm:text-sm border-gray-300 rounded-md" placeholder="Descripcion Categoria">
    @error('descripcion')
    <p class="text-sm text-red-500 mt-3">{{$message}}</p>
    @enderror
</div>
<div class="mt-2">
    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-save"></i> Guardar</button>
    <a href="{{route('category.index')}}" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-backward"></i> Volver</a>
</div>
</div>
@endsection
