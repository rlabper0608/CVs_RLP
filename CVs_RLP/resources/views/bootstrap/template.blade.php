<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ url('assets/img/favicon.ico') }}">
    
    <!-- Título dinámico -->
    <title>@yield('title','CVs-App')</title>
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    
    @yield('styles')
 
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <header class="d-flex justify-content-center py-3 w-100">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a href="{{ route('main') }}" class="nav-link active" aria-current="page">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('alumnos.create') }}" class="nav-link">Añadir CV</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('alumnos.index') }}" class="nav-link">Lista CV</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('about') }}" class="nav-link">About us</a>
                    </li>
                    <li class="nav-item" >
                        <a href="#" class="nav-link disabled" >Proximamente</a>
                    </li>
                </ul>
            </header>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container my-5">
        <!-- Mensajes de éxito -->
        @if(session("mensajeTexto"))
            <div class="alert alert-success">
                {{ session("mensajeTexto") }}
            </div>
        @endif

        <!-- Mensajes de error -->
        @error('mensajeTexto')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror

        <!-- Contenido dinámico -->
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="{{ url('assets/js/main.js') }}"></script>
    @yield('scripts')
</body>

</html>