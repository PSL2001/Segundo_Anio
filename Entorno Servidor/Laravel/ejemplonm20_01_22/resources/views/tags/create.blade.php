@extends('layouts.uno')
@section('titulo')
Nueva Etiqueta
@endsection
@section('cabecera')
Crear Etiqueta
@endsection
@section('contenido')
<div class="mx-auto bg-indigo-500 w-full rounded">
    <form action="{{route('tags.store')}}" method="POST" name="as" class="shadow-md rounded px-8 pt-6 pb-8">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">
                Nombre
              </label>
              <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Nombre" name="nombre">
              @error('nombre')
              <p class="text-sm text-red-500 mt-3">{{ $message }}</p>
              @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">
                Descripcion
              </label>
              <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Descripcion" name="descripcion"></textarea>
              @error('descripcion')
              <p class="text-sm text-red-500 mt-3">{{ $message }}</p>
              @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="color">
                Color
              </label>
              <input type="color" name="color" id="color" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
              @error('color')
              <p class="text-sm text-red-500 mt-3">{{ $message }}</p>
              @enderror
        </div>
        <div class="mb-4">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><i
                class="fas fa-save"></i> Guardar</button>
                <a href="{{ route('tags.index') }}"
                class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded"><i
                    class="fas fa-backward"></i> Volver</a>
        </div>
    </form>
</div>
@endsection
