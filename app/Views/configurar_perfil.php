<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Proyecto STEAM de creación de eco-crayones caseros en nivel inicial.">
  <title>Configurar perfil – Jardín de Infantes Francisca Dalinda López</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/estilos.css">
</head>

<body>
<?= view('partials/navbar')?>


<body class="bg-light">
  <div class="container my-5 w-50">
    <h1 class="text-center mb-4">Cambiar Foto</h1>

    <form id="formProyecto" enctype="multipart/form-data" method="POST" action="ruta_backend.php" class="needs-validation" novalidate>
      
      <div class="mb-3">
        <label for="fotoPerfil" class="form-label">Foto de perfil</label>
        <input class="form-control" type="file" id="fotoPerfil" name="fotoPerfil">
      </div><br>

      <div class="d-flex gap-2 mt-3 justify-content-center">
        <button class="boton-amarillo" type="submit">Actualizar perfil</button>
        <button class="boton-gris" type="reset">Limpiar</button>
      </div>
    </form><br>
    <div class="d-grid gap-2">
     <a href="<?= base_url('index.php/CambiarContrasenia') ?>">Cambiar contraseña</a>
    </div>
  </div>

    <?= view('partials/footer')?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>