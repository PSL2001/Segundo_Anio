@extends('layouts.uno')
@section('titulo')
Editar Libro
@endsection
@section('cabecera')
Editar Libro {{$libro->id}}
@endsection
@section('contenido')
<div class="mt-2 rounded shadow-lg py-2 px-4" style="width: 69rem">
<form name="uno" action="{{route('libros.update', $libro)}}" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="form-group">
        <div class="form-group mb-3">
            <label for="tit" class="form-label">Titulo</label>
            <input required value="{{$libro->titulo}}" type="text" name="titulo" class="form-control" id="tit" placeholder="Titulo">
        </div>
        <div class="form-group mt-2">
            <label for="r">Resumen</label>
            <textarea required class="form-control" name="resumen" id="r" placeholder="Resumen">{{$libro->resumen}}</textarea>
        </div>
        <div class="form-group mt-2">
            <label for="img" class="form-label">Portada</label>
            <input class="form-control-file" type="file" name="portada" id="img" accept="image/*">
            <img src="{{Storage::url($libro->portada)}}" alt="" class="img-thumbnail" style="width: 20rem; height:25rem;">
        </div>
        <div class="form-group mt-2">
            <button type="submit" class="btn btn-success"><i class="fas fa-edit"></i>Guardar</button>
            <a href="{{route('libros.index')}}" class="btn btn-info"><i class="fas fa-home"></i>Volver</a>
        </div>
    </div>
</form>
</div>
@endsection
