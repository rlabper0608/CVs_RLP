@extends('bootstrap.template')

@section('content')

<!-- Ventanas Modales principio -->

<div class="modal fade" id="destroyModal" tabindex="-1" aria-labelledby="destroyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="destroyModalLabel">¿Seguro que quieres borrar a este alumno?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="destroyModalContent">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button  form="form-delete" type="submit" class="btn btn-primary">Delete</button>
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

<style>
    /* Contenedor general de la tabla */
  table.table {
      max-width: 1000px;
      margin: 40px auto;
      background: #ffffff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 16px rgba(0,0,0,0.08);
  }

  /* Cabecera */
  table thead th {
      background: #0d6efd;
      color: #fff;
      font-weight: 600;
      padding: 14px;
      text-align: left;
      font-size: 1rem;
  }

  /* Filas */
  table tbody tr {
      transition: background 0.2s ease;
  }

  table tbody tr:hover {
      background: #f3f6fa;
  }

  /* Celdas */
  table tbody td {
      padding: 12px 14px;
      vertical-align: middle;
      font-size: 0.95rem;
  }

  /* Botones dentro de la tabla */
  table tbody td .btn {
      padding: 5px 10px;
      border-radius: 6px;
      font-size: 0.85rem;
  }

  /* Pie de tabla */
  table tfoot th {
      background: #f8f9fa;
      font-size: 1rem;
      padding: 14px;
      font-weight: 600;
  }

  /* Espacio alrededor del pie */
  table tfoot tr th:last-child {
      text-align: right;
  }

  /* Mejorar fondo general */
  body {
      background: #eef2f6;
  }

</style>

@endsection

