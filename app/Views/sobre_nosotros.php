<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sobre nosotros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/estilos.css">
</head>
  <body class="fondo-dibujo">
    <?= view('partials/navbar')?>
    <div class="div-con-padding d-flex justify-content-center align-items-center flex-column w-50 mx-auto text-center my-5">
        <h5>Jardin de infantes</h5>
        <h1 class="fw-bold">Francisca Dalinda López</h1>
    </div>
    
    <div class="div-con-padding w-75 align-items-center flex-column justify-content-center mx-auto d-flex">
      <div class="card" style="width: 50rem;">
        <img src="../public/img/imagenJardin5.jpg" class="card-img-top" alt="...">
      </div>
      <br><br>
      <div class="blanco-transparente div-con-padding mx-auto text-center quienes-somos">
          <h2>Quienes somos</h2>
          <div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac nisi id orci luctus aliquet ac non massa...</p>
            <p>Nulla facilisi. Quisque viverra mi sit amet felis tempor rutrum...</p>
            <p>Sed felis lorem, rhoncus non malesuada vel, dictum et neque...</p>
          </div>
      </div>
    </div>

    <div class="blanco-transparente div-con-padding d-flex justify-content-center align-items-center flex-column w-50 mx-auto text-center">
        <h5>Contactos</h5>
        <p>Correo: franciscadalindal@gmail.com</p>
        <p>Numero de ejemplo: 354415234356</p>
        <p>Direccion: calle d. f. Sarmiento s/n de la localidad de Ambul</p>
    </div>
        <?= view('partials/scriptScroll')?>
    <?= view('partials/footer')?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>