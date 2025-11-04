<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acceso denegado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/estilos.css">
  </head>
  <body>
    <?= view('partials/navbar')?>
    <div class="d-flex flex-column justify-content-center align-items-center vh-100 text-center bg-light">
        <div class="p-5 border rounded-4 shadow-lg bg-white">
        <i class="bi bi-exclamation-triangle-fill text-warning" style="font-size: 4rem;"></i>
        <h1 class="mt-3 fw-bold text-danger">Acceso denegado</h1>
        <p class="mt-3 fs-5">No tienes permisos para acceder a esta página.</p>
        <a href="<?= base_url('index.php/Index') ?>" class="btn boton-rojo mt-4">
            <i class="bi bi-house-door"></i> Volver al inicio
        </a>
        </div>
    </div>
    <footer class="amarillo w-100 mt-auto py-3 text-center">
      <p>Copyright © 2025 Jardín de Infantes Francisca Dalinda López</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
