<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Proyecto STEAM de creación de eco-crayones caseros en nivel inicial.">
  <title>Lista de Usuarios – Jardín de Infantes Francisca Dalinda López</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/estilos.css">
</head>

<body>
<?= view('partials/navbar')?>

  <section class="container my-5">
    <h2 class="h3 text-center mb-4">Usuarios</h2><br>
    <div class="d-flex">
      <form action="" class="d-flex">
        <input type="password" class="form-control me-2" id="documento" name="documento" placeholder="Documento">
        <button class="boton-amarillo-chico" type="submit">Buscar</button>
      </form>
    </div>

<div class="card my-4 border-0 shadow-sm p-3">
  <div class="d-flex justify-content-between align-items-center">
    
    <div class="d-flex align-items-center">
      <img src="../public/img/sample.jpg" alt="Avatar de usuario"
           class="rounded-circle me-3 imagen-perfil-grande">

      <div>
        <h6 class="mb-1 fw-bold texto-grande-titulo" >
          Nombre del usuario
          <span class="badge bg-primary ms-2">Administrador</span>
        </h6>
        <p class="mb-1 texto-grande">Comentarios: xx</p>
        <p class="mb-1 text-muted small">Documento: 00000000</p>
        <small class="text-muted">Fecha de creación: 17/09/2025</small>
      </div>
    </div>

    <div class="d-flex flex-column gap-2">
      <button class="boton-verde-chico d-flex align-items-center justify-content-center">
        <i class="bi bi-chat-dots me-1"></i>Ver comentarios
      </button>
      <button class="boton-amarillo-chico d-flex align-items-center justify-content-center">
        <i class="bi bi-slash-circle me-1"></i>Suspender
      </button>
      <button class="boton-rojo-chico d-flex align-items-center justify-content-center">
        <i class="bi bi-trash me-1"></i>Eliminar
      </button>
    </div>

  </div>
</div>
  </section>

    <?= view('partials/footer')?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>