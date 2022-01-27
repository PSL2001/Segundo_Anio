@extends('layouts.uno')
@section('titulo')
    Inicio Posts
@endsection
@section('cabecera')
    Administracion de Post
@endsection
@section('contenido')
    <!-- This example requires Tailwind CSS v2.0+ -->
    @if (session('mensaje'))
    <x-alerta1>{{session('mensaje')}}</x-alerta1>
    @endif
    <div class="mb-4">
        <a href="{{route('posts.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-plus"></i> Nuevo</a>
    </div>
    <form action="{{route('posts.index')}}" name="as" method="GET">
    <div class="flex mb-4">
        <div class="w-1/2">
            <input type="search" value="{{$request->titulo}}" name="titulo" placeholder="Buscar" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-2 py-2 sm:text-sm border-gray-300 rounded-md">
        </div>
        <div class="ml-2 w-1/4">
            <select name="category_id"
                    class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-2 py-2 sm:text-sm border-gray-300 rounded-md">
                    <option value="-10" @if($request->category_id == "-10") selected @endif>Cualquiera</option>
                    @foreach ($categorias as $item)
                        <option value="{{ $item->id }}" @if ($item->id == $request->category_id) selected  @endif>{{ $item->nombre }}</option>
                    @endforeach
                </select>
        </div>
        <div class="ml-4">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-search"></i></button>
        </div>
        <div class="ml-4">
            <button type="reset" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-brush"></i></button>
        </div>
    </div>
    </form>
    @if (count($posts) == 0)
    <x-alerta1>No se ha encontrado ningun post</x-alerta1>
    @else
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
                        <a href="{{route('posts.edit', $item)}}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-edit"></i></a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <form action="{{route('posts.destroy', $item)}}" method="post">
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
    </x-tabla1>
    @endif
    <div class="mt-2">
        {{$posts->appends($request->except('page'))->links()}}
    </div>
@endsection
