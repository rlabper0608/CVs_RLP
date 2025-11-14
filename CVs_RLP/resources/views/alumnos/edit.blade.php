@extends('bootstrap.template')

@section('title')
Edición
@endsection

@section('styles')
<link rel="stylesheet" href="{{ url('assets/css/createStyles.css') }}">
<link rel="stylesheet" href="{{ url('assets/css/editStyles.css') }}">
@endsection

@section('content')

<form action="{{ route('alumnos.update',  $alumno->id) }}" method="post" enctype="multipart/form-data"> 
    @csrf
    @method('put')
    
    <div class="espacio">
        <label for="nombre">Nombre:</label>
        <input class="form-control" minlength="2" maxlength="60" required id="nombre" name="nombre" placeholder="Nombre del alumno" value="{{ old('nombre', $alumno->nombre) }}" type="text">
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
        <input class="form-control" minlength="3" maxlength="110" required id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento) }}" type="date">
    </div>
    
    <div class="espacio">
        <label for="nota_media">Nota media:</label>
        <input class="form-control" min="0" max="10" step="0.01" required id="nota_media" name="nota_media" placeholder="Nota media del alumno" value="{{ old('nota_media', $alumno->nota_media) }}" type="number">
    </div>
    
    <div class="espacio">
        <label for="experiencia">Experiencia:</label>
        <textarea class="form-control" minlength="5" required id="experiencia" name="experiencia" placeholder="Experiencia del alumno trabajando" cols="60" rows="3">{{ old('experiencia', $alumno->experiencia) }}</textarea>
    </div>
    
    <div class="espacio">
        <label for="formacion">Formación:</label>
        <textarea class="form-control" minlength="5" required id="formacion" name="formacion" placeholder="Formacion del alumno" cols="60" rows="3">{{ old('formacion', $alumno->formacion) }}</textarea>
    </div>
    
    <div class="espacio">
        <label for="habilidades">Habilidades:</label>
        <textarea class="form-control" minlength="5" required id="habilidades" name="habilidades" placeholder="Habilidades que tiene el alumno" cols="60" rows="3">{{ old('habilidades', $alumno->habilidades)}}</textarea>
    </div>
    
    <div class="espacio">
        <label>Fotografía:</label>
        
        @if($alumno->fotografia != null)
        <div class="existing-image">
            <img src="{{ $alumno->getPath() }}" width="200px" style="border-radius: 8px;">
            <div class="form-check mt-2">
                <input class="form-check-input" type="checkbox" value="true" id="deleteImage" name="deleteImage">
                <label class="form-check-label" for="deleteImage">
                    Eliminar imagen actual
                </label>
            </div>
        </div>
        @endif
        
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
    
    <div class="espacio">
        <label for="pdf">PDF del CV:</label>
        <input class="form-control" id="pdf" name="pdf" type="file" accept="application/pdf">
    </div>
    
    <div class="espacio">
        <input class="btn btn-primary" value="Actualizar CV" type="submit">
    </div>
</form>

@endsection

@section('scripts')
<script src="{{  url('assets/js/arrastrar.js') }}"></script>
@endsection