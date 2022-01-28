@extends('layouts.uno')
@section('titulo')
Etiquetas
@endsection
@section('cabecera')
Listado de Etiquetas
@endsection
@section('contenido')
@if (session('mensaje'))
<x-alerta1>{{session('mensaje')}}</x-alerta1>
@endif
<div class="mb-4">
    <a href="{{route('tags.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        <i class="fas fa-plus"></i> Nuevo</a>
</div>
<x-tabla1>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Id
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Nombre
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Descripcion
            </th>
            <th scope="col" colspan="2">
              Acciones
            </th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($tags as $item)
            <tr>
                <td class="px-6 py-4">
                    {{$item->id}}
                </td>
                <td class="px-6 py-4">
                  {{$item->nombre}}
                </td>
                <td class="px-6 py-4">
                  {{$item->descripcion}}
                </td>
                <td class="px-6 py-4">
                  Edit
                </td>
                <td class="px-6 py-4">
                  Delete
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
</x-tabla1>
<div class="mt-2">
    {{ $tags->links() }}
</div>
@endsection
