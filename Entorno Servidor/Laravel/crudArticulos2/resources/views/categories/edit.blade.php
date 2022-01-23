@extends('layouts.uno')
@section('titulo')
Editar Categoria
@endsection
@section('cabecera')
Modificando Categoria {{$category->id}}
@endsection
@section('contenido')
<div class="w-full">
    <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8 mb-12">
        <div class="bg-gray-900 w-full shadow rounded p-8">
            <form action="{{route('categories.update', $category)}}" name="as" method="post">
                @csrf
                @method("PUT")
                <div class="md:flex items-center mt-12">
                    <div class="w-full md:w-full flex flex-col">
                        <label class="font-semibold leading-none text-gray-300">Nombre</label>
                        <input type="text" name="nombre" value="{{$category->nombre}}" required placeholder="Titulo del Articulo" class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded" />
                        @error('nombre')
                        <p class="text-sm text-red-500 mt-3">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div>
                    <div class="w-full flex flex-col mt-8">
                        <label class="font-semibold leading-none text-gray-300">Descripcion</label>
                        <textarea type="text" name="descripcion" required placeholder="Descripcion del Articulo" class="h-40 text-base leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-800 border-0 rounded">{{$category->descripcion}}</textarea>
                        @error('descripcion')
                        <p class="text-sm text-red-500 mt-3">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex items-center justify-center w-full">
                    <button type="submit" class="mt-9 font-semibold leading-none text-white py-4 px-10 bg-blue-700 rounded hover:bg-blue-600 focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:outline-none">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                    &nbsp;
                    <a href="{{route('categories.index')}}" class="mt-9 font-semibold leading-none text-white py-4 px-10 bg-yellow-700 rounded hover:bg-yellow-600 focus:ring-2 focus:ring-offset-2 focus:ring-yellow-700 focus:outline-none"><i class="fas fa-backward"></i> Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
