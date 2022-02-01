@extends('layouts.uno')
@section('titulo')
Contacto
@endsection
@section('cabecera')
Formulario de Contacto
@endsection
@section('contenido')
<form action="{{ route('contacto.enviar') }}" name="as" method="POST">
    {{-- @csrf es para evitar ataques, hay que ponerlo en todos los formularios --}}
    @csrf
    <div class="mb-3/4 bg-gray-400 rounded py-4 px-2 mx-auto w-3/4">
        <div>
            <label for="tit" class="block text-sm font-medium text-gray-700">Nombre de Contacto</label>
            <input type="text" name="nombre" id="tit" required
                class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-2 py-2 sm:text-sm border-gray-300 rounded-md"
                placeholder="Titulo">
            @error('nombre')
                <p class="text-sm text-red-500 mt-3">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-2">
            <label for="email" class="block text-sm font-medium text-gray-700">Correo</label>
            <input type="email" name="email" id="email" required
                class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-2 py-2 sm:text-sm border-gray-300 rounded-md"
                placeholder="Su Correo">
            @error('resumen')
                <p class="text-sm text-red-500 mt-3">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-2">
            <label for="cont" class="block text-sm font-medium text-gray-700">Contenido del Mensaje</label>
            <textarea name="contenido" id="cont" cols="30" rows="10"
                class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-2 py-2 sm:text-sm border-gray-300 rounded-md"></textarea>
            @error('contenido')
                <p class="text-sm text-red-500 mt-3">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-2">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-paper-plane"></i> Enviar</button>
        </div>
    </div>
</form>
@endsection
