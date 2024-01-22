<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link href="https://bootswatch.com/5/darkly/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <h1>PEPO</h1>
  <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
      <!-- <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> -->
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="{{ url('reporteempleados')}}">Inicio
              <span class="visually-hidden">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('reporteempleados')}} ">Estudiantes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('altaempleado')}} ">Registrar estudiantes</a>
          </li>
        </ul>
      </div>
  </nav>
  </div>
  <div id="contenido">
    @yield('contenido')
  </div>
</body>

</html>