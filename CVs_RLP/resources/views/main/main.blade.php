@extends('bootstrap.template')

@section('title')
LandingPage
@endsection

@section('styles')
<link rel="stylesheet" href="{{ url('assets/css/mainStyle.css') }}">
@endsection()

@section('content')
<h1>CVs · App</h1>
<p>Esta aplicacion es para ver los CVs de los alumnos, además podemos añadir nuevos, editar los que ya tenemos y/o borrarlos</p>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
@foreach($alumnos as $alumno)
    <div class="col">
        <div class="card shadow-sm">
            <!-- Imagen del alumno -->
            <img src="{{ $alumno->getPath() }}" 
                 class="card-img-top" 
                 alt="{{ $alumno->nombre }}" 
                 style="height: 225px; object-fit: cover;">
            
            <!-- AQUÍ ESTABA EL PROBLEMA: eliminar el div.row extra -->
            <div class="card-body">
                <p><strong>Nombre:</strong> {{ $alumno->nombre }}</p>
                <p><strong>Apellidos:</strong> {{ $alumno->apellidos }}</p>
                <p><strong>Email:</strong> {{ $alumno->correo }}</p>
                <p><strong>Nacimiento:</strong> {{ $alumno->fecha_nacimiento }}</p>
                
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group"> 
                        <a href="{{ route('alumnos.show', $alumno->id) }}" type="button" class="btn btn-sm btn-outline-secondary">View</a> 
                        <a href="{{ route('alumnos.edit', $alumno->id) }}" type="button" class="btn btn-sm btn-outline-secondary">Edit</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach 
</div>
@endsection
