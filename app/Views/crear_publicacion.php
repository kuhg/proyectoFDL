<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Proyecto STEAM de creación de eco-crayones caseros en nivel inicial.">
  <title>Crear publicacion – Jardín de Infantes Francisca Dalinda López</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/estilos.css">
</head>

<body>
<?= view('partials/navbar')?>

  <div class="container my-5">
    <h1 class="text-center mb-4">Cargar nuevo proyecto</h1>

    <form id="formProyecto" enctype="multipart/form-data" method="POST" action="ruta_backend.php" class="needs-validation" novalidate>
      <!-- Título -->
      <div class="mb-3">
        <label for="titulo" class="form-label">Título del proyecto</label>
        <input type="text" class="form-control" id="titulo" name="titulo" required>
        <div class="invalid-feedback">Ingresa un título.</div>
      </div>

      <!-- Resumen -->
      <div class="mb-3">
        <label for="resumen" class="form-label">Resumen</label>
        <textarea class="form-control" id="resumen" name="resumen" rows="4" required></textarea>
        <div class="invalid-feedback">Ingresa un resumen.</div>
      </div>

      <!-- Conclucion -->
      <div class="mb-3">
        <label for="resumen" class="form-label">Conclucion</label>
        <textarea class="form-control" id="conclucion" name="conclucion" rows="4" required></textarea>
        <div class="invalid-feedback">Ingresa la conclucion.</div>
      </div>

      <!-- Objetivos -->
      <div class="mb-3">
        <label for="objetivos" class="form-label">Objetivos (uno por oracion)</label>
        <textarea class="form-control" id="objetivos" name="objetivos" rows="4" required></textarea>
        <div class="invalid-feedback">Ingresa al menos un objetivo.</div>
      </div>

      <!-- Imágenes -->
      <div class="mb-3">
        <label for="imagenes" class="form-label">Imágenes del proyecto (puedes seleccionar hasta 6)</label>
        <input class="form-control" type="file" id="imagenes" name="imagenes[]" accept="image/*" multiple required>
        <div class="invalid-feedback">Selecciona al menos una imagen.</div>
      </div>
      <br>

      <!-- Botones -->
      <div class="d-flex gap-2 mt-3">
        <button class="boton-amarillo" type="submit">Crear Publicacion</button>
        <button class="boton-gris" type="reset">Limpiar</button>
      </div>
    </form>
  </div>

    <?= view('partials/footer')?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<?= view('partials/scriptValidacion')?>
</body>
</html>