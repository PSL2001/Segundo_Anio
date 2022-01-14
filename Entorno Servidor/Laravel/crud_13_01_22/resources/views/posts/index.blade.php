@extends('layouts.uno')
@section('titulo')
Inicio Posts
@endsection
@section('cabecera')
Listado de Posts
@endsection
@section('contenido')
<x-tabla1>
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Info
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  titulo
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  resumen
                </th>
                <th scope="col" colspan="2">
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($post as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        info
                    </td>
                    <td class="px-6 py-4">
                        {{$item->titulo}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->resumen}}
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
  <div class="mt-2">
      {{$post->links()}}
  </div>
@endsection
