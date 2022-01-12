@extends('layouts.uno')
@section('titulo')
Posts
@endsection
@section('cabecera')
Listado de posts
@endsection
@section('contenido')
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="mb-2">
    <a href="{{route('post.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-plus"></i> Crear</a>
</div>
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Id
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Titulo
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Resumen
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Contenido
                </th>
                <th scope="col" class="relative px-6 py-3" colspan="2"></th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-600">
                @foreach ($post as $item)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{$item->id}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{$item->titulo}}
                </td>
                <td class="px-6 py-4">
                    {{$item->resumen}}
                </td>
                <td class="px-6 py-4">
                    {{$item->contenido}}
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
        </div>
      </div>
    </div>
  </div>
  <div class="mt-2">
      {{$post->links()}}
  </div>
@endsection
