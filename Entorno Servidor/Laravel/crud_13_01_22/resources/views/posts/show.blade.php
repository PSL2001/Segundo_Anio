@extends('layouts.uno')
@section('titulo')
    Detalle Posts
@endsection
@section('cabecera')
    Detalles de Post
@endsection
@section('contenido')
    <div class="mx-auto w-3/4 shadow-lg rounded bg-gray-200">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2 text-center">{{ $post->titulo }}</div>
            <p class="text-gray-700">{{ $post->resumen }}</p>
            <p class="text-gray-500 mt-4">{{ $post->contenido }}</p>
            <div class="mx-auto mt-4">
                <a href="{{route('post.index1', $post->category_id)}}" class="ml-2 py-2 px-2 rounded-full bg-green-400 hover:bg-green-600 font-bold">
                    {{ $post->category->nombre }}
                </a>
            </div>
            <div class="mt-4">
                <a href="{{route('post.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-backward"></i> Volver</a>
            </div>
        </div>
    </div>
@endsection
