@extends('bootstrap.template')

@section('content')
<main class="px-3">
    <h1>{{ $alumno->nombre, $alumno->apellidos }}</h1> 
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
        <a href="#" class="btn btn-lg btn-light fw-bold border-white bg-white">
            {{ $alumno->nombre }}
        </a>
         <span class="fw-bold">
            {{ $alumno->correo }}
            <br>
            +34 {{ $alumno->telefono }}
            <br>
            {{ $alumno->nota_media}}
         </span>
    </div>
</main>
@endsection