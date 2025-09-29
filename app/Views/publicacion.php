<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Proyecto STEAM de creación de eco-crayones caseros en nivel inicial.">
  <title>Proyectos – Jardín de Infantes Francisca Dalinda López</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/estilos.css">
</head>

<body>
<?= view('partials/navbar')?>

<main>
  <section class="container text-center my-5">
    <h1 class="display-5 fw-semibold">Título del proyecto o noticia</h1>
    <p class="text-muted">Fecha de publicación</p>
  </section>

  <section class="container my-5">
    <h2 class="h3 text-center mb-4">Resumen del proyecto</h2>
    <p>
      Este proyecto STEAM busca resolver la escasez de marcadores en la sala a través de la creación de eco-crayones caseros utilizando cera de abeja y pigmentos naturales, así como colorantes en pasta comestibles.
      A lo largo de la experiencia, los niños y niñas de 3, 4 y 5 años explorarán conceptos de ciencia (propiedades de materiales, cambios de estado), tecnología (proceso de fabricación simple), ingeniería (diseño de moldes), arte (creación de colores y uso de crayones) y matemáticas (medición, clasificación).
      El proyecto fomenta el consumo responsable y el cuidado del medio ambiente, alineándose con los Objetivos de Desarrollo Sostenible (ODS) y los lineamientos del diseño curricular de nivel inicial de Córdoba, promoviendo el desarrollo de capacidades a través del aprendizaje basado en problemas y la indagación.
    </p>
  </section>

  <section class="container my-5">
    <h2 class="h3 text-center mb-4">Objetivos</h2>
    <ul class=" ms-md-5">
      <li>Fomentar la curiosidad y la indagación científica en relación con los materiales y sus transformaciones.</li>
      <li>Desarrollar habilidades de pensamiento crítico y resolución creativa de problemas a través de una situación real.</li>
      <li>Promover el trabajo colaborativo y la comunicación oral en las diferentes etapas del proyecto.</li>
      <li>Sensibilizar sobre la importancia del consumo responsable, la reutilización y el cuidado del medio ambiente.</li>
      <li>Explorar conceptos matemáticos básicos a través de la experimentación y la producción.</li>
      <li>Estimular la expresión creativa a través de las artes visuales utilizando materiales no convencionales.</li>
      <li>Valorar los recursos naturales y comprender el origen de algunos materiales (cera de abeja).</li>
    </ul>
  </section>

  <!-- Galería de imágenes -->
  <section class="container my-5">
    <h2 class="h3 text-center mb-4">Galería</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
      <div class="col">
        <img src="../public/img/proyecto1-1.jpg" class="img-fluid rounded shadow-sm"
             alt="Niños trabajando en el proyecto, imagen 1">
      </div>
      <div class="col">
        <img src="../public/img/proyecto1-2.jpg" class="img-fluid rounded shadow-sm"
             alt="Niños trabajando en el proyecto, imagen 2">
      </div>
      <div class="col">
        <img src="../public/img/proyecto1-3.jpg" class="img-fluid rounded shadow-sm"
             alt="Niños trabajando en el proyecto, imagen 3">
      </div>
      <div class="col">
        <img src="../public/img/proyecto1-4.jpg" class="img-fluid rounded shadow-sm"
             alt="Niños trabajando en el proyecto, imagen 4">
      </div>
      <div class="col">
        <img src="../public/img/proyecto1-5.jpg" class="img-fluid rounded shadow-sm"
             alt="Niños trabajando en el proyecto, imagen 5">
      </div>
      <div class="col">
        <img src="../public/img/proyecto1-6.jpg" class="img-fluid rounded shadow-sm"
             alt="Niños trabajando en el proyecto, imagen 6">
      </div>
    </div>
  </section>

  <!-- Cierre -->
  <section class="container my-5">
    <h2 class="h3 text-center mb-4">Conclusión</h2>
    <p>
      El proyecto “Nuestros colores con conciencia” permitió a los niños y niñas no solo resolver una necesidad práctica en la sala —la falta de crayones—, sino también sumergirse en una experiencia de aprendizaje profundamente significativa. 
      Al crear sus propios útiles, desarrollaron habilidades científicas, tecnológicas, artísticas y matemáticas de manera integrada, fomentando la creatividad y el pensamiento crítico.
      La inclusión de los principios Waldorf enriqueció la experiencia sensorial y la conexión con la naturaleza, mientras que el enfoque en los ODS los inició en la conciencia ambiental desde una edad temprana.
      Este proyecto culminó con la valoración de los objetos hechos a mano, el respeto por los recursos naturales y la alegría de utilizar sus propios colores en sus creaciones artísticas.
    </p>
  </section>

  <section>
    <div class="card my-4 border-0 shadow-sm align-items-center">
      <div class="card-body d-flex">
          <h2 class="h3 text-center mb-4">Tienes cuenta? Inicia sesion para dejar un comentario!</h3>
      </div>
          <button class="boton-amarillo">Iniciar Sesion</button>
    </div>
  </section>

  <section class="container my-5">
    <h2 class="h3 text-center mb-4">Comentarios</h2><br>

    <div class="d-flex justify-content-center mb-4">
      <button type="button"
              class="boton-amarillo"
              data-bs-toggle="modal"
              data-bs-target="#comentarioModal">
        Dejar comentario
      </button>
    </div>
<!-- Tarjeta de comentario -->
    <div class="card my-4 border-0 shadow-sm">
      <div class="card-body d-flex">
        <!-- Avatar -->
        <img src="../public/img/sample.jpg" alt="Avatar de usuario"
            class="rounded-circle me-3"
            style="width:60px; height:60px; object-fit:cover;">

        <div class="flex-grow-1">
          <div class="d-flex justify-content-between align-items-start mb-1">
            <h6 class="fw-bold mb-0">Nombre del usuario</h6>
            <!-- Botón que abre el modal -->
            <button type="button"
                    class="boton-rojo btn-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#reportModal">
              <i class="bi bi-flag"></i> Reportar
            </button>
          </div>
          <p class="mb-2">
            Este es un comentario de ejemplo sobre la publicación.
          </p>
          <small class="text-muted">Publicado el 17/09/2025</small>
        </div>
      </div>
    </div>
  </section>

<!-- Modal comentario-->

<div class="modal fade" id="comentarioModal" tabindex="-1" aria-labelledby="comentarioModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-warning-subtle">
        <h5 class="modal-title fw-bold" id="comentarioModalLabel">Nuevo comentario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <form id="formComentario" method="POST" action="ruta_backend_comentario.php" class="needs-validation" novalidate>
        <div class="modal-body">
          <div class="mb-3">
            <label for="comentarioTexto" class="form-label">Escriba su comentario</label>
            <textarea class="form-control" id="comentarioTexto" name="comentario" rows="4" required></textarea>
            <div class="invalid-feedback">El comentario no puede estar vacío.</div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="boton-gris" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="boton-amarillo">Comentar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal reporte-->
<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="reportForm">
        <div class="modal-header">
          <h5 class="modal-title" id="reportModalLabel">
            Reportar comentario
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>

        <div class="modal-body">
          <p class="mb-3">Selecciona el motivo del reporte:</p>

          <!-- Motivos -->
          <div class="mb-3">
            <label for="reportReason" class="form-label">Motivo</label>
            <select class="form-select" id="reportReason" name="reason" required>
              <option value="" selected disabled>Elige una opción...</option>
              <option value="spam">Spam o publicidad no deseada</option>
              <option value="abuso">Lenguaje ofensivo o abusivo</option>
              <option value="informacion_falsa">Información falsa o engañosa</option>
              <option value="contenido_inapropiado">Contenido inapropiado</option>
              <option value="otro">Otro</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="reportDetails" class="form-label">Detalles (opcional)</label>
            <textarea class="form-control" id="reportDetails" name="details" rows="3"
                      placeholder="Agrega más información si lo deseas..."></textarea>
          </div>

          <!-- ID del comentario -->
          <input type="hidden" name="comment_id" value="123">
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Enviar reporte</button>
        </div>
      </form>
    </div>
  </div>
</div>
</main>
  <?= view('partials/footer')?>
  <?= view('partials/scriptValidacion')?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>