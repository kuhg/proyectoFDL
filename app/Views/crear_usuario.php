<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Proyecto STEAM de creación de eco-crayones caseros en nivel inicial.">
  <title>Crear Usuario – Jardín de Infantes Francisca Dalinda López</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/estilos.css">
</head>

<body>
<?= view('partials/navbar')?>

  <div class="container my-5 w-50">
    <h1 class="text-center mb-4">Cargar usuario nuevo</h1>

    <form id="formProyecto" enctype="multipart/form-data" method="POST" action="ruta_backend.php" class="needs-validation" novalidate>
      <div class="mb-3">
        <label for="nombreUsuario" class="form-label">Nombre del usuario</label>
        <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" required>
        <div class="invalid-feedback">Esta casilla esta vacia</div>
      </div>

      <div class="mb-3">
        <label for="apellidoUsuario" class="form-label">Apellido del usuario</label>
        <input type="text" class="form-control" id="apellidoUsuario" name="apellidoUsuario" required>
        <div class="invalid-feedback">Esta casilla esta vacia</div>
      </div>

      <div class="mb-3">
        <label for="correoUsuario" class="form-label">Correo del usuario</label>
        <input type="email" class="form-control" id="correoUsuario" name="correoUsuario" required>
        <div class="invalid-feedback">Esta casilla esta vacia</div>
      </div>

      <div class="mb-3">
        <label for="documentoUsuario" class="form-label">Documento del usuario</label>
        <input type="text" class="form-control" id="documentoUsuario" name="documentoUsuario" required>
        <div class="invalid-feedback">Esta casilla esta vacia</div>
      </div>
      
      <div class="mb-3">
        <label for="contraseniaUsuario" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="contraseniaUsuario" name="contraseniaUsuario" required>
        <div class="invalid-feedback">Esta casilla esta vacia</div>
      </div>
      <div class="mb-3">
        <label for="contraseniaVerificacionUsuario" class="form-label">Ingrese otra vez la contraseña</label>
        <input type="password" class="form-control" id="contraseniaVerificacionUsuario" name="contraseniaVerificacionUsuario" required>
        <div class="invalid-feedback">Esta casilla esta vacia</div>
      </div>

      <div class="mb-3">
        <label for="permiso" class="form-label">Tipo de permiso</label>
        <select class="select-crear-usuario" name="permiso" id="permiso">
            <option value="1">Administrador</option>
            <option value="0">No administrador</option>
        </select>
      </div><br>

      <!-- Botones -->
      <div class="d-flex gap-2 mt-3">
        <button class="boton-amarillo" type="submit">Crear el usuario</button>
        <button class="boton-gris" type="reset">Limpiar</button>
      </div>
    </form>
  </div>

    <?= view('partials/footer')?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<?= view('partials/scriptValidacion')?>
</body>
</html>