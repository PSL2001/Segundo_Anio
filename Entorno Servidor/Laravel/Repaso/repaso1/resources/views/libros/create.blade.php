@extends('layouts.uno')
@section('titulo')
Crear Libro
@endsection
@section('cabecera')
Nuevo Libros
@endsection
@section('contenido')
<div class="mt-2 rounded shadow-lg py-2 px-4" style="width: 69rem">
<form name="uno" action="{{route('libros.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <div class="form-group mb-3">
            <label for="tit" class="form-label">Titulo</label>
            <input required type="text" name="titulo" class="form-control" id="tit" placeholder="Titulo">
        </div>
        <div class="form-group mt-2">
            <label for="r">Resumen</label>
            <textarea required class="form-control" name="resumen" id="r" placeholder="Resumen"></textarea>
        </div>
        <div class="form-group mt-2">
            <label for="img" class="form-label">Portada</label>
            <input class="form-control-file" type="file" name="portada" id="img" accept="image/*">
        </div>
        <div class="form-group mt-2">
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>Guardar</button>
            <button type="reset" class="btn btn-warning"><i class="fas fa-brush"></i>Limpiar</button>
            <a href="{{route('libros.index')}}" class="btn btn-info"><i class="fas fa-home"></i>Volver</a>
        </div>
    </div>
</form>
</div>
@endsection
