@extends('bootstrap.template')

@section('content')
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
</main>

<style>
    /* Contenedor principal */
  main {
      max-width: 900px;
      margin: 0 auto;
      padding-top: 40px;
  }

  /* Títulos principales */
  main h1 {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 15px;
      color: #1a1a1a;
  }

  /* Secciones tipo "lead" */
  .lead {
      background: #f8f9fa;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.08);
      margin-bottom: 25px;
  }

  /* Imagen del alumno */
  .lead img {
      border-radius: 10px;
      box-shadow: 0 3px 8px rgba(0,0,0,0.15);
  }

  /* Enlace a PDF */
  .lead a {
      text-decoration: none;
      font-weight: 600;
      color: #0d6efd;
  }

  .lead a:hover {
      text-decoration: underline;
  }

  /* Botón con el nombre */
  .btn-light {
      border-radius: 50px;
      padding: 10px 25px;
      border: 1px solid #ddd !important;
  }

  /* Datos de contacto */
  .lead span {
      margin-left: 15px;
      font-size: 1.1rem;
  }

  /* Estilo general */
  body {
      background: #eef1f4;
  }
</style>
@endsection