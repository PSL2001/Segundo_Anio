@extends('layouts.uno')
@section('titulo')
    Inicio Posts
@endsection
@section('cabecera')
    Administracion de Post
@endsection
@section('contenido')
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="mb-4">
        <a href="{{route('posts.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-plus"></i> Nuevo</a>
    </div>
    <x-tabla1>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Info
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Titulo
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Resumen
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Categoria
                    </th>
                    <th scope="col" colspan="2" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($posts as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{route('posts.show', $item)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-info"></i></a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full"
                                    src="{{Storage::url($item->imagen)}}"
                                    alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{$item->titulo}}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        {{$item->resumen}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->category->nombre}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        Edit
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        Delete
                    </td>
                </tr>
                @endforeach
                <!-- More people... -->
            </tbody>
        </table>
    </x-tabla1>
    <div class="mt-2">
        {{ $posts->links() }}
    </div>
@endsection
