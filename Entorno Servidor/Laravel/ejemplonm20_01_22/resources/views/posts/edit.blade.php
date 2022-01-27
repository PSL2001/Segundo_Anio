@extends('layouts.uno')
@section('titulo')
Editar Registro
@endsection
@section('cabecera')
Modificando Registro {{$post->id}}
@endsection
@section('contenido')
<form action="{{ route('posts.update', $post) }}" name="as" method="POST" enctype="multipart/form-data">
    {{-- @csrf es para evitar ataques, hay que ponerlo en todos los formularios --}}
    @csrf
    @method("PUT")
    <div class="mb-3/4 bg-gray-400 rounded py-4 px-2 mx-auto w-3/4">
        <div>
            <label for="tit" class="block text-sm font-medium text-gray-700">Titulo Post</label>
            <input type="text" name="titulo" id="tit" required value="{{$post->titulo}}"
                class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-2 py-2 sm:text-sm border-gray-300 rounded-md"
                placeholder="Titulo">
            @error('titulo')
                <p class="text-sm text-red-500 mt-3">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-2">
            <label for="res" class="block text-sm font-medium text-gray-700">Resumen Post</label>
            <input type="text" name="resumen" id="res" required value="{{$post->resumen}}"
                class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-2 py-2 sm:text-sm border-gray-300 rounded-md"
                placeholder="Resumen">
            @error('resumen')
                <p class="text-sm text-red-500 mt-3">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-2">
            <label for="cont" class="block text-sm font-medium text-gray-700">Contenido del Post</label>
            <textarea name="contenido" id="cont" cols="30" rows="10"
                class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-2 py-2 sm:text-sm border-gray-300 rounded-md">{{$post->contenido}}</textarea>
            @error('contenido')
                <p class="text-sm text-red-500 mt-3">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-2">
            <label for="cat" class="block text-sm font-medium text-gray-700">Categoria del Post</label>
            <select name="category_id"
                class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-2 py-2 sm:text-sm border-gray-300 rounded-md">
                @foreach ($categorias as $item)
                @if ($post->category_id == $item->id)
                <option value="{{ $item->id }}" selected>{{ $item->nombre }}</option>
                @else
                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="mr-2 font">
            <p class="block text-sm font-medium text-gray-700 mb-2">Etiquetas</p>
            @foreach ($tags as $tag)
                &nbsp;
                <label for="{{ $tag->id }}"></label>
                <input type="checkbox" id="{{ $tag->id }}" name="tags[]"
                    value="{{ $tag->id }}" @if(in_array($tag->id, $array)) checked @endif>{{ $tag->nombre }}
            @endforeach
            @error('tags')
            <p class="text-sm text-red-500 mt-3">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-2 grid-cols-2 gap-4">
            <div>
                <div class="mb-3">
                    <label for="image" class="form-label inline-block mb-2 text-gray-700">Imagen del Post</label>
                    <input
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700
                  bg-white bg-clip-padding
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        type="file" id="image" name="imagen" accept="image/*">
                </div>
            </div>
            <div>
                <img src="{{Storage::url($post->imagen)}}" class="bg-cover bg-center" id="img">
            </div>
        </div>
        @error('imagen')
        <p class="text-sm text-red-500 mt-3">{{ $message }}</p>
        @enderror
        <div class="mt-2">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><i
                    class="fas fa-edit"></i> Editar</button>
            <a href="{{ route('posts.index') }}"
                class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded"><i
                    class="fas fa-backward"></i> Volver</a>
        </div>
</form>
</div>
<script>
    //Cambiar imagen
    document.getElementById("image").addEventListener("change", cambiarImagen);
    function cambiarImagen() {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = (event)=> {
            document.getElementById("img").setAttribute('src', event.target.result)
        };
        reader.readAsDataURL(file);
    }
</script>
@endsection
