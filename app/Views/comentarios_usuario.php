<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Proyecto STEAM de creación de eco-crayones caseros en nivel inicial.">
  <title>Comentarios de Usuario – Jardín de Infantes Francisca Dalinda López</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/estilos.css">
</head>

<body>

<?= view('partials/navbar')?>

<main class="container my-5">
  <h1 class="h3 text-center mb-5">
    Comentarios de <span class="text-primary">*usuario*</span>
  </h1>

  <div class="row justify-content-center">
    <!-- Foto de usuario y botones de acción -->
    <div class="col-md-4 text-center mb-4">
      <img src="../public/img/sample.jpg"
           alt="Foto de perfil del usuario"
           class="rounded-circle img-fluid shadow mb-3"
           style="width:180px; height:180px; object-fit:cover;">

      <!-- Botones de acción sobre el usuario -->
      <div class="d-flex flex-column gap-2">
        <button class="boton-gris">
          <i class="bi bi-slash-circle me-1"></i> Suspender cuenta
        </button>
        <button class="boton-rojo-chico">
          <i class="bi bi-trash me-1"></i> Borrar cuenta
        </button>
      </div>
    </div>

    <!-- Lista de comentarios -->
    <div class="col-md-8">
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div>
                <strong>Publicación:</strong> Este es un comentario de ejemplo.<br>
                <small class="text-muted">Publicado el 17/09/2025</small>
              </div>
              <button class="boton-rojo-chico">
                <i class="bi bi-trash me-1"></i> Borrar
              </button>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div>
                <strong>Publicación:</strong> Este es otro comentario de ejemplo.<br>
                <small class="text-muted">Publicado el 17/09/2025</small>
              </div>
              <button class="boton-rojo-chico">
                <i class="bi bi-trash me-1"></i> Borrar
              </button>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div>
                <strong>Publicación:</strong> Tercer comentario de muestra.<br>
                <small class="text-muted">Publicado el 18/09/2025</small>
              </div>
              <button class="boton-rojo-chico">
                <i class="bi bi-trash me-1"></i> Borrar
              </button>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
</main>

<?= view('partials/footer')?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>