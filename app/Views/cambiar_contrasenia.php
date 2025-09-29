<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Formulario para cambiar contraseña de usuario">
  <title>Cambiar Contraseña – Jardín de Infantes Francisca Dalinda López</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/estilos.css">
</head>

<body>
  <?= view('partials/navbar')?>

  <div class="container my-5" style="max-width: 480px;">
    <div class="card shadow-sm p-4">
      <h1 class="text-center mb-4">Cambiar contraseña</h1>

      <form id="formProyecto" method="POST" action="ruta_backend.php"
            class="needs-validation" novalidate>

        <div class="mb-3">
          <label for="contraseniaActual" class="form-label">Contraseña actual</label>
          <input type="password" class="form-control" id="contraseniaActual"
                 name="contraseniaActual" autocomplete="current-password" required>
          <div class="invalid-feedback">Este campo es obligatorio.</div>
        </div>

        <div class="mb-3">
          <label for="contraseniaNueva" class="form-label">Contraseña nueva</label>
          <input type="password" class="form-control" id="contraseniaNueva"
                 name="contraseniaNueva" autocomplete="new-password" required>
          <div class="invalid-feedback">Este campo es obligatorio.</div>
        </div>

        <div class="mb-3">
          <label for="contraseniaNuevaValidacion" class="form-label">
            Confirmar contraseña nueva
          </label>
          <input type="password" class="form-control" id="contraseniaNuevaValidacion"
                 name="contraseniaNuevaValidacion" autocomplete="new-password" required>
          <div class="invalid-feedback">Este campo es obligatorio.</div>
        </div>

        <div class="d-flex gap-2 mt-3 justify-content-center">
          <button class="boton-amarillo" type="submit">Cambiar Contraseña</button>
          <button class="boton-gris" type="reset">Limpiar</button>
        </div>
      </form>
    </div>
  </div>

  <?= view('partials/footer')?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <?= view('partials/scriptValidacion')?>
</body>
</html>