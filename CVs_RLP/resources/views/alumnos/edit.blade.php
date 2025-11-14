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
        <textarea class="form-control"  minlength="5" required id="experiencia" name="experiencia" placeholder="Experiencia del alumno trabajando" cols="60" rows="3" >{{ old('experiencia', $alumno->experiencia) }}</textarea>
    </div>
    <div class="espacio">
        <label for="formacion">Formación:</label>
        <textarea class="form-control"  minlength="5" required id="formacion" name="formacion" placeholder="Formacion del alumno" cols="60" rows="3" >{{ old('formacion', $alumno->formacion) }}</textarea>
    </div>
    <div class="espacio">
        <label for="habilidades">Habilidades:</label>
        <textarea class="form-control"  minlength="5" required id="habilidades" name="habilidades" placeholder="Habilidades que tiene el alumno" cols="60" rows="3" >{{ old('habilidades', $alumno->habilidades)}}</textarea>
    </div>
    <div>
        <label for="fotografia">Fotografia:</label>
        <input class="form-control"  id="fotografia" name="fotografia" type="file" accept="image/*">
    </div>
    <div>
        <label for="pdf">Pdf del CV:</label>
        <input class="form-control"  id="pdf" name="pdf" type="file" accept="application/pdf">
    </div>
    <div class="espacio">
        <input class="btn btn-primary" value="Añadir nuevo CV" type="submit">
    </div>
</form>


<style>
        /* Contenedor general del formulario */
    form {
        max-width: 700px;
        margin: 40px auto;
        background: #ffffff;
        padding: 30px 40px;
        border-radius: 15px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
    }

    /* Separación entre campos */
    .espacio {
        margin-bottom: 20px;
    }

    /* Labels */
    form label {
        font-weight: 600;
        margin-bottom: 6px;
        display: block;
        color: #333;
    }

    /* Inputs y textareas */
    form .form-control {
        border-radius: 10px;
        padding: 10px 14px;
        border: 1px solid #ced4da;
        font-size: 1rem;
        transition: all .2s ease;
    }

    /* Efecto al enfocar */
    form .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 6px rgba(13, 110, 253, 0.25);
    }

    /* Textareas más suaves */
    textarea.form-control {
        resize: vertical;
    }

    /* Botón de enviar */
    form .btn-primary {
        padding: 12px 20px;
        font-size: 1.1rem;
        width: 100%;
        border-radius: 12px;
    }

    /* Hover del botón */
    form .btn-primary:hover {
        background-color: #0b5ed7;
    }

    /* Fondo suave para la página */
    body {
        background: #eef2f6;
        margin: 0;
    }

</style>
@endsection
