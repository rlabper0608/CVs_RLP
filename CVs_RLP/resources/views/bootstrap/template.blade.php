<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ url('assets/img/favicon.ico') }}"></link>
    <!-- directiva -->
    <title>
      @yield('title','CVs-App') 
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0"> <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                <svg class="bi" width="0" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg> </a> </div>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{ route('main') }}" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="{{ route('alumnos.index') }}" class="nav-link px-2">Students CVs</a></li>
            <li><a href="{{ route('alumnos.create') }}" class="nav-link px-2">Add CV</a></li>
            <li><a href="" class="nav-link px-2 disabled">Edit CV</a></li>
        </ul>
    </header>
</div>
    </nav>

    <div class="container my-5">

      <!-- return redirect() -> route('main')->with($message); -->
      @if(session("mensajeTexto"))
      <div class="alert alert-success">
          {{ session("mensajeTexto") }}
        </div>
      @endif

      <!-- return back()->withInput()->withErrors($message); -->
      @error('mensajeTexto')
        <div class="alert alert-danger">
          {{ $message }}
        </div>
      @enderror

      @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"></script>
    <script src="{{ url('assets/js/main.js') }}"></script>
  </body>

</html>