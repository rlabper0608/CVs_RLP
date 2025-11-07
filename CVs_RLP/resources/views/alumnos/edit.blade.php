@extends('bootstrap.template')

@section('content')


<form action="{{ route('alumnos.update',  $alumno->id) }}" method="post"> 
    @csrf
    @method('put')
    <div class="espacio">
        <label for="nombre">Nombre:</label>
        <input class="form-control"  minlength="2" maxlength="60" required id="nombre" name="nombre" placeholder="Nombre del alumno" value="{{ old('nombre', $alumno->nombre) }}" type="text">
    </div>
    <div class="espacio">
        <label for="apellidos">Apellidos:</label>
        <input class="form-control" minlength="3" maxlength="100" required id="apellidos" name="apellidos" placeholder="Apellidos del alumno" value="{{ old('apellidos', $alumno->apellidos) }}" type="text">
    </div>
    <div class="espacio">
        <label for="telefono">Teléfono:</label>
        <input class="form-control" minlength="3" maxlength="110" required id="telefono" name="telefono" placeholder="Teléfono de contacto" value="{{ old('telefono', $alumno->telefono) }}" type="text">
    </div>
    <div class="espacio">
        <label for="correo">Correo:</label>
        <input class="form-control" minlength="3" maxlength="110" required id="correo" name="correo" placeholder="Correo de contacto" value="{{ old('correo', $alumno->correo) }}" type="text">
    </div>
    <div class="espacio">
        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input class="form-control" minlength="3" maxlength="110" required id="fecha_nacimiento" name="fecha_nacimiento"  value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento) }}" type="date">
    </div>
    <div class="espacio">
        <label for="nota_media">Nota media:</label>
        <input class="form-control" min="0" max="10" step="0.01" required id="nota_media" name="nota_media" placeholder="Nota media del alumno" value="{{ old('nota_media', $alumno->nota_media) }}" type="number">
    </div>
    <div class="espacio">
        <label for="experiencia">Experiencia:</label>
        <textarea class="form-control"  minlength="5" required id="experiencia" name="experiencia" placeholder="Experiencia del alumno trabajando" cols="60" rows="3" >{{ old('experiencia'),  }}</textarea>
    </div>
    <div class="espacio">
        <label for="formacion">Formación:</label>
        <textarea class="form-control"  minlength="5" required id="formacion" name="formacion" placeholder="Formacion del alumno" cols="60" rows="3" >{{ old('formacion') }}</textarea>
    </div>
    <div class="espacio">
        <label for="habilidades">Habilidades:</label>
        <textarea class="form-control"  minlength="5" required id="habilidades" name="habilidades" placeholder="Habilidades que tiene el alumno" cols="60" rows="3" >{{ old('habilidades') }}</textarea>
    </div>
    <!-- <div>
        <label for="fotografia">Fotografia:</label>
        <input class="form-control"  id="fotografia" name="fotografia" type="file">
    </div> -->
    <div class="espacio">
        <input class="btn btn-primary" value="Añadir nuevo CV" type="submit">
    </div>
</form>

@endsection