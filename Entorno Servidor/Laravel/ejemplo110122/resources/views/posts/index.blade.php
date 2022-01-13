@extends('layouts.uno')
@section('titulo')
Posts
@endsection
@section('cabecera')
Listado de posts
@endsection
@section('contenido')
@if (session('mensaje'))
<div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3 my-2" role="alert">
    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
    <p>{{session('mensaje')}}</p>
  </div>
@endif

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
                <td class="whitespace-nowrap">
                    <a href="{{route('post.edit', $item)}}" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-edit"></i></a>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <form name="a" action="{{route('post.destroy', $item)}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-trash"></i></button>
                    </form>
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
