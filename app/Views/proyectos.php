<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proyectos – Jardín de Infantes Francisca Dalinda López</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/estilos.css">
</head>
  <body class="fondo-dibujo">
  <?= view('partials/navbar')?>
    <div class="d-flex justify-content-center align-items-center flex-column w-50 mx-auto text-center my-5">
        <h2>Proyectos escolares</h2>
    </div>
    
    <div class="container-fluid d-flex align-items-center flex-column">
        <div class="card mb-4 w-75 mx-auto shadow-lg">
        <div class="row g-0">
            <div class="col-md-5">
            <img src="../public/img/sample.jpg" class="img-fluid rounded-start h-100 object-fit-cover" alt="...">
            </div>
            <div class="col-md-7 d-flex align-items-center">
            <div class="card-body">
                <h4 class="card-title fs-2">Proyecto de jardin</h4>
                <p class="card-text fs-5">
                Pequeña descripcion del proyecto
                </p>
                <p class="card-text"><small class="text-muted">Fecha y hora de publicacion</small></p>
                <button class="boton-amarillo">Ver Proyecto</button>
            </div>
            </div>
        </div>
        </div>
    </div>

    <?= view('partials/footer')?>
    <?= view('partials/scriptScroll')?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>