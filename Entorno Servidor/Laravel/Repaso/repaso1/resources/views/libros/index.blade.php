@extends('layouts.uno')
@section('titulo')
Inicio Libros
@endsection
@section('cabecera')
Listado de Libros
@endsection
@section('contenido')
<div class="d-flex flex-row-reverse mb-2">
    <a href="{{route('libros.create')}}" class="btn btn-info">
        <i class="fas fa-plus"></i> Nuevo
    </a>
</div>
<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Titulo</th>
        <th scope="col">Portada</th>
        <th scope="col">Resumen</th>
        <th scope="col" colspan="2">
            Acciones
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($libros as $item)
      <tr>
        <th scope="row">{{ $item->id }}</th>
        <td>{{ $item->titulo }}</td>
        <td>
            <img src="{{Storage::url($item->portada)}}" alt="portada" class="img-thumbnail" style="width: 10rem; height:8rem;" />
        </td>
        <td>{{ $item->resumen }}</td>
        <td>
            <a href="{{route('libros.edit', $item)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
        </td>
        <td>
            <form action="{{route('libros.destroy', $item)}}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="mt-2">
      {{ $libros->links() }}
  </div>
@endsection
