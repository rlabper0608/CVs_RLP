@extends('bootstrap.template')

@section('title')
Añadir
@endsection

@section('styles')
<link rel="stylesheet" href="{{ url('assets/css/createStyles.css') }}">
@endsection

@section('content')


<form action="{{ route('alumnos.store') }}" method="post" enctype="multipart/form-data"> <!-- Tenemos que poner el enctype, ya que si no lo ponemos no hay forma de subir un archivo -->
    @csrf
    <div class="espacio">
        @error('nombre')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <label for="nombre">Nombre:</label>
        <input class="form-control"  minlength="2" maxlength="60" required id="nombre" name="nombre" placeholder="Nombre del alumno" value="{{ old('nombre') }}" type="text">
    </div>
    <div class="espacio">
        @error('apellidos')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <label for="apellidos">Apellidos:</label>
        <input class="form-control" minlength="3" maxlength="100" required id="apellidos" name="apellidos" placeholder="Apellidos del alumno" value="{{ old('apellidos') }}" type="text">
    </div>
    <div class="espacio">
        @error('telefono')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <label for="telefono">Teléfono:</label>
        <input class="form-control" minlength="3" maxlength="110" required id="telefono" name="telefono" placeholder="Teléfono de contacto" value="{{ old('telefono') }}" type="text">
    </div>
    <div class="espacio">
        @error('correo')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <label for="correo">Correo:</label>
        <input class="form-control" minlength="3" maxlength="110" required id="correo" name="correo" placeholder="Correo de contacto" value="{{ old('correo') }}" type="text">
    </div>
    <div class="espacio">
        @error('fecha_nacimiento')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input class="form-control" required id="fecha_nacimiento" name="fecha_nacimiento"  value="{{ old('fecha_nacimiento') }}" type="date">
    </div>
    <div class="espacio">
        @error('nota_media')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <label for="nota_media">Nota media:</label>
        <input class="form-control" min="0" max="10" step="0.01" required id="nota_media" name="nota_media" placeholder="Nota media del alumno" value="{{ old('nota_media') }}" type="number">
    </div>
    <div class="espacio">
        @error('experiencia')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <label for="experiencia">Experiencia:</label>
        <textarea class="form-control"  minlength="5" maxlength="2000" required id="experiencia" name="experiencia" placeholder="Experiencia del alumno trabajando" cols="60" rows="3" >{{ old('experiencia') }}</textarea>
    </div>
    <div class="espacio">
        @error('formacion')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <label for="formacion">Formación:</label>
        <textarea class="form-control"  minlength="5" maxlength="2000" required id="formacion" name="formacion" placeholder="Formacion del alumno" cols="60" rows="3" >{{ old('formacion') }}</textarea>
    </div>
    <div class="espacio">
        @error('habilidades')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <label for="habilidades">Habilidades:</label>
        <textarea class="form-control"  minlength="5" maxlength="2000" required id="habilidades" name="habilidades" placeholder="Habilidades que tiene el alumno" cols="60" rows="3" >{{ old('habilidades') }}</textarea>
    </div>
    <div>
        @error('fotografia')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <!-- Zona de Drag & Drop -->
        <div id="dropZone" class="drop-zone">
            <div class="drop-zone-icon">📷</div>
            <div class="drop-zone-text">
                <strong>Arrastra una imagen aquí</strong> o haz clic para seleccionar
                <br>
                <small>Formatos: JPG, PNG, GIF (Máx. 2MB)</small>
            </div>
            <div id="imagePreview"></div>
        </div>
        <!-- Input oculto (se activa con el drag & drop o click) -->
        <input class="form-control" id="fotografia" name="fotografia" type="file" accept="image/*" style="display: none;">
    </div>
    <div>
        @error('pdf')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <label for="pdf">Pdf del CV:</label>
        <input class="form-control"  id="pdf" name="pdf" type="file" accept="application/pdf">
    </div>
    <div class="espacio">
        <input class="btn btn-primary" value="Añadir nuevo CV" type="submit">
    </div>
</form>

@endsection

@section('scripts')
<script src="{{  url('assets/js/arrastrar.js') }}"></script>
@endsection