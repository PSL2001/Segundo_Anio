@extends('layouts.uno')
@section('titulo')
Detalles Post
@endsection
@section('cabecera')
Mostrando Post {{$post->id}}
@endsection
@section('contenido')
<div class="max-w-sm rounded overflow-hidden shadow-lg mx-auto bg-gray-300">
    <img class="w-full" src="{{Storage::url($post->imagen)}}" alt="Imagen del post">
    <div class="px-6 py-4">
      <div class="font-bold text-xl mb-2">{{$post->titulo}}</div>
      <p class="text-gray-700 text-base">
        {{$post->resumen}}
      </p>
      <p class="text-gray-800 text-base">
          {{$post->contenido}}
      </p>
    </div>
    <div class="px-6 pt-4 pb-2">
        @foreach ($tags as $tag)
        @if (in_array($tag->id, $array))
        <a href="{{route('post.index1', $tag)}}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" style="background-color: {{$tag->color}};">#{{$tag->nombre}}</a>
        @endif
        @endforeach
    </div>
  </div>
@endsection
