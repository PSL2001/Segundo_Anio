@extends('layouts.uno')
@section('titulo')
Inicio Categorias
@endsection
@section('cabecera')
Listado de Categorias
@endsection
@section('contenido')
<div class="mb-4"><a href="{{route('category.create')}}"
    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    <i class="fas fa-plus"></i> Nueva Categoria</a>
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
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($category as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$item->id}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$item->nombre}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{$item->descripcion}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        Editar
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        Borrar
                    </td>
                  </tr>

                @endforeach


              <!-- More people... -->
            </tbody>
          </table>
</x-tabla1>
@endsection

