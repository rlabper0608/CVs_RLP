@extends('bootstrap.template')

@section('content')
<h1>CVs · App</h1>
<p>Esta aplicacion es para ver los CVs de los alumnos, además podemos añadir nuevos, editar los que ya tenemos y/o borrarlos</p>

@foreach($alumno as $alum)
        <div class="card shadow-sm"> <svg aria-label="Placeholder: Thumbnail" class="bd-placeholder-img card-img-top"
            height="225" preserveAspectRatio="xMidYMid slice" role="img" width="100%" xmlns="http://www.w3.org/2000/svg">
            <title>Placeholder</title>
            <rect width="100%" height="100%" src="{{ $alum->getPath() }}"></rect><text x="50%" y="50%" fill="#eceeef"
                dy=".3em">{{ $alum->nombre }}</text>
                <!-- Dentro del text $alumno->nombre entre llaves dobles -->
            </svg>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="card-body">
                <!-- <p class="card-text">$alumno->apellido  <br>  $alumno->fecha_nacimiento </p> -->
                <p class="card-text">{{ $alum->apellidos }}  <br>  {{ $alum->fecha_nacimiento }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group"> <a href="{{ route('alumnos.show', $alum->id) }}" type="button" class="btn btn-sm btn-outline-secondary">View</a> <a
                            href="{{ route('alumnos.edit', $alum->id) }}" type="button" class="btn btn-sm btn-outline-secondary">Edit</a> </div> <!--<small
                        class="text-body-secondary">9 mins</small> -->
                    </div>
                </div>
            </div>
        </div>
    @endforeach 
@endsection