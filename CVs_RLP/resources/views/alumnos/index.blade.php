@extends('bootstrap.template')

@section('title')
Tabla
@endsection

@section('styles')
<link rel="stylesheet" href="{{ url('assets/css/indexStyles.css') }}">
@endsection

@section('content')

<!-- Ventanas Modales principio -->

<div class="modal fade" id="destroyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">¿Seguro que quieres borrar a este alumno?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="destroyModalContent">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button  form="form-delete" type="submit" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>

<!-- Ventanas modales fin -->

<hr>

<table class="table table-hover">
  <thead>
    <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Correo</th>
    </tr>
  </thead>
  <tbody>
    @foreach($alumnos as $alumno)
        <tr>
            <td>{{ $alumno->id }}</td>
            <td>{{ $alumno->nombre }}</td>
            <td>{{ $alumno->apellidos }}</td>
            <td>{{ $alumno->correo }}</td>
            <td>
                <a href=" {{ route('alumnos.show', $alumno->id) }}" class="btn btn-info btn-sm text-white">Show</a>
                <a href=" {{ route('alumnos.edit', $alumno->id) }}" class="btn btn-warning btn-sm text-white">Edit</a>
                <a class="link-destroy btn btn-danger btn-sm text-white" 
                  data-bs-toggle="modal"
                  data-bs-target="#destroyModal"
                  data-href="{{ route('alumnos.destroy', $alumno)}}" 
                  data-alumno="{{ $alumno->nombre }}">Delete</a>
            </td>
        </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
        <th colspan="3">Número de alumnos registrados:</th>
        <th>{{ count($alumnos) }}</th>
    </tr>
  </tfoot>
</table>

<form action="" method="post" id="form-delete">
    @csrf
    @method('delete')
</form>


@endsection

