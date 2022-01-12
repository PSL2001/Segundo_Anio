@extends('layouts.uno')
@section('titulo')
Crear Post
@endsection
@section('cabecera')
Nuevo Post
@endsection
@section('contenido')
<form action="{{route('post.store')}}" name="as" method="POST">
    {{-- @csrf es para evitar ataques, hay que ponerlo en todos los formularios --}}
    @csrf
<div class="mb-3/4 bg-gray-400 rounded py-4 px-2 mx-auto">
<div>
    <label for="price" class="block text-sm font-medium text-gray-700">Titulo</label>
    <input type="text" name="titulo" id="titulo" required class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-5 py-1 sm:text-sm border-gray-300 rounded-md" placeholder="Nombre Titulo">
    @error('titulo')
    <p class="text-sm text-red-500 mt-3">{{$message}}</p>
    @enderror
</div>
<div class="mt-2">
    <label for="resumen" class="block text-sm font-medium text-gray-700">Resumen</label>
    <input type="text" name="resumen" id="resumen" required class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-5 py-1 sm:text-sm border-gray-300 rounded-md" placeholder="Resumen de Post">
    @error('resumen')
    <p class="text-sm text-red-500 mt-3">{{$message}}</p>
    @enderror
</div>
<div class="mt-2">
    <label for="contenido" class="block text-sm font-medium text-gray-700">Contenido del Post</label>
    <textarea name="contenido" id="contenido" cols="30" rows="10" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-5 py-1 sm:text-sm border-gray-300 rounded-md"></textarea>
    @error('contenido')
    <p class="text-sm text-red-500 mt-3">{{$message}}</p>
    @enderror
</div>
<div class="mt-2">
    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-save"></i> Guardar</button>
    <button onclick="window.history.back()" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-backward"></i> Volver</button>
</div>
</div>
</form>
@endsection
