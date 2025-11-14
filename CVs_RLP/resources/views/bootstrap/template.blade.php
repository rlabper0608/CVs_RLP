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
    @yield('styles')
    <style>
            /* ================================
        Global Styles
      ================================ */
      body {
          background-color: #f5f6f8;
          font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
          color: #333;
      }

      /* ================================
        Navbar
      ================================ */
      .navbar {
          box-shadow: 0 2px 8px rgba(0,0,0,0.15);
      }

      .navbar .nav-link {
          color: #c6c6c6 !important;
          transition: color 0.2s ease-in-out;
      }

      .navbar .nav-link:hover {
          color: #fff !important;
      }

      .navbar .nav-link.link-secondary {
          color: #fff !important;
          font-weight: 500;
      }

      /* ================================
        Header Navigation
      ================================ */
      header {
          border-color: #444 !important;
      }

      header .nav-link {
          font-size: 1rem;
          font-weight: 500;
          color: #ddd !important;
      }

      header .nav-link:hover {
          color: #fff !important;
      }

      header .nav-link.disabled {
          color: #777 !important;
          cursor: not-allowed;
      }

      /* ================================
        Alerts
      ================================ */
      .alert {
          border-radius: 10px;
          font-weight: 500;
      }

      /* ================================
        Container content
      ================================ */
      .container {
          max-width: 1100px;
      }

      h1, h2, h3 {
          font-weight: 600;
          color: #222;
      }

      /* ================================
        Buttons
      ================================ */
      .btn-primary {
          background-color: #0d6efd;
          border-color: #0d6efd;
          transition: all 0.2s ease-in-out;
      }

      .btn-primary:hover {
          background-color: #0b5ed7;
          border-color: #0a58ca;
      }

      /* ================================
        Custom Card Style
      ================================ */
      .card {
          border-radius: 12px;
          border: none;
          box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
      }

      .card-header {
          background-color: #0d6efd !important;
          color: #fff;
          font-weight: 600;
      }

      /* ================================
        Forms
      ================================ */
      form label {
          font-weight: 500;
      }

      form input, form select, form textarea {
          border-radius: 8px !important;
      }

      form input:focus,
      form select:focus,
      form textarea:focus {
          border-color: #0d6efd !important;
          box-shadow: 0 0 0 0.15rem rgba(13,110,253,.25);
      }

      /* ================================
        Footer (por si lo agregas)
      ================================ */
      footer {
          padding: 20px 0;
          margin-top: 40px;
          text-align: center;
          color: #777;
      }

    </style>
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

      @if(session("mensajeTexto"))
      <div class="alert alert-success">
          {{ session("mensajeTexto") }}
        </div>
      @endif

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