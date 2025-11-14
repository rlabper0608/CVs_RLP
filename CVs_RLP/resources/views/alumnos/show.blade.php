@extends('bootstrap.template')

@section('title')
{{$alumno->nombre}} 
@endsection

@section('styles')
<link rel="stylesheet" href="{{ url('assets/css/showStyles.css') }}">
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

<main>

<div class="card-perfil">

    <div class="perfil-flex">

        <!-- FOTO -->
        <div>
            <div class="perfil-foto">
                <img src="{{ $alumno->getPath() }}">
            </div>

            <div class="perfil-botones">
                <a href="{{ route('alumnos.edit', $alumno->id) }}">
                    <button>editar</button>
                </a>

                <a data-bs-toggle="modal"
                    data-bs-target="#destroyModal"
                    data-href="{{ route('alumnos.destroy', $alumno)}}"
                    data-alumno="{{ $alumno->nombre }}">
                    <button>eliminar</button>
                </a>
            </div>

            @if($alumno->isPdf())
                <p class="mt-3">
                    <a href="{{ $alumno->getPdf() }}" target="pdf">Ver PDF</a>
                </p>
            @endif
        </div>

        <!-- DATOS -->
        <div class="perfil-datos">

            <h1>{{ $alumno->nombre }} {{ $alumno->apellidos }}</h1>

            <div class="perfil-item">
                Correo:
                <span>{{ $alumno->correo }}</span>
            </div>

            <div class="perfil-item">
                Teléfono:
                <span>{{ $alumno->telefono }}</span>
            </div>

            <div class="perfil-item">
                Nota media:
                <span>{{ $alumno->nota_media }}</span>
            </div>

            <div class="perfil-item">
                Experiencia:
                <span>{{ $alumno->experiencia }}</span>
            </div>

            <div class="perfil-item">
                Habilidades:
                <span>{{ $alumno->habilidades }}</span>
            </div>

            <div class="perfil-item">
                Formación:
                <span>{{ $alumno->formacion }}</span>
            </div>

        </div>

    </div>

</div>

</main>



<form action="" method="post" id="form-delete">
    @csrf
    @method('delete')
</form>
@endsection