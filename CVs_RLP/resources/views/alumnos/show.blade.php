@extends('bootstrap.template')

@section('title')
{{$alumno->nombre}} 
@endsection

@section('styles')
<link rel="stylesheet" href="{{ url('assets/css/showStyle.css') }}">
@endsection

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

<main class="px-3">
    <h1>{{ $alumno->nombre }} {{ $alumno->apellidos }}</h1> 
    <div class="lead">
        <img src="{{ $alumno->getPath() }}" width="30%">
    </div>
    
    @if($alumno->isPdf())
    <p class="lead">
        <a href="{{ $alumno->getPdf() }}" target="pdf">PDF</a>
    </p>
    @endif
          
    <div class="lead">
      <h1>Formacion</h1>
      <p>{{ $alumno->formacion }}</p>
    </div>
    <br>
    <div class="lead">
      <h1>Experiencia</h1>
      <p>{{ $alumno->experiencia }}</p>
    </div>
    <br>
    <div class="lead">
      <h1>Habilidades</h1>
      <p>{{ $alumno->habilidades }}</p>
    </div>
    <div class="lead">
        <h1>Correo</h1>
        <span class="fw_bold" id="correo">
            {{ $alumno->correo }}
        </span>
    </div>
    <div class="lead">
        <h1>Teléfono</h1>
        <span class="fw_bold" id="correo">
            {{ $alumno->telefono }}
        </span>
    </div>
    <div class="lead">
        <h1>Nota Media</h1>
        <span class="fw_bold" id="correo">
            {{ $alumno->nota_media }}
        </span>
    </div>
    <div class="espacio">
        <a href=" {{ route('alumnos.edit', $alumno->id) }}" ><button class="btn btn-warning  text-white"> Edit</button></a>
        <a 
            data-bs-toggle="modal"
            data-bs-target="#destroyModal"
            data-href="{{ route('alumnos.destroy', $alumno)}}" 
            data-alumno="{{ $alumno->nombre }}"><button class="btn btn-danger text-white"> Delete</button></a>
    </div>
</main>

<form action="" method="post" id="form-delete">
    @csrf
    @method('delete')
</form>
@endsection