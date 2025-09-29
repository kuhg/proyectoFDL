<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Proyecto STEAM de creación de eco-crayones caseros en nivel inicial.">
  <title>Comentarios Reportados – Jardín de Infantes Francisca Dalinda López</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/estilos.css">
</head>

<body>
<?= view('partials/navbar')?>

  <section class="container my-5">
    <h2 class="h3 text-center mb-4">Comentarios Reportados</h2><br>
    <div class="card my-4 border-0 shadow-sm">
    <div class="card-body d-flex justify-content-between align-items-start">
        <div class="d-flex">
        <img src="../public/img/sample.jpg" alt="Avatar de usuario"
            class="rounded-circle me-3 imagen-perfil-grande">

        <div>
            <h6 class="mb-1 fw-bold texto-grande-titulo">
            Nombre del usuario
            </h6>

            <!-- Comentario -->
            <p class="mb-1 texto-grande">Comentario: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla lobortis sem lorem. Proin ornare, nisi nec accumsan mattis, metus sem gravida arcu, eget commodo nulla.</p>

            <!-- Razon del reporte -->
            <p class="mb-1 text-muted small">Razon del reporte: Texto de ejemplo</p>
            <p class="mb-1 text-muted small">Informacion extra: Texto de ejemplo</p>
        </div>
        </div>

        <div class="ms-3 d-flex flex-column gap-2">
        <button class="boton-verde-chico">
            <i class="bi bi-person me-1"></i>Ver Usuario
        </button>
        <button class="boton-rojo-chico">
            <i class="bi bi-slash-circle me-1"></i>Borrar
        </button>
        <button class="boton-gris-chico">
            <i class="bi bi-eye-slash me-1"></i>Ignorar
        </button>
        </div>

    </div>
    </div>
  </section>



<?= view('partials/footer')?>
<?= view('partials/scriptValidacion')?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>