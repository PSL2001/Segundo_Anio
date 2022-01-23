@extends('layouts.uno')
@section('titulo')
Mostrando articulo
@endsection
@section('cabecera')
Articulo numero: {{$article->id}}
@endsection
@section('contenido')
<div class="max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-20">
    <div>
      <h2 class="text-gray-800 text-3xl font-semibold">Nombre: {{$article->nombre}}</h2>
      <p class="mt-2 text-gray-600">{{$article->descripcion}}</p>
    </div>
    <div class="flex justify-end mt-4">
      <a href="#" class="text-xl font-medium text-indigo-500">John Doe</a>
    </div>
  </div>
@endsection
