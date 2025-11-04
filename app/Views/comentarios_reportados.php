<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Comentarios reportados por los usuarios.">
  <title>Comentarios Reportados – Jardín de Infantes Francisca Dalinda López</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/estilos.css">
</head>

<body>
<?= view('partials/navbar') ?>

<section class="container my-5">
  <h2 class="h3 text-center mb-4">Reportes de usuarios</h2><br>

  <?php if (!empty($reportes)): ?>
    <?php foreach ($reportes as $reporte): ?>
      <div class="card my-4 border-0 shadow-sm">
        <div class="card-body d-flex justify-content-between align-items-start">
          <div class="d-flex">
            <div>
              <h6 class="mb-1 fw-bold texto-grande-titulo">
                <?= esc($reporte['nomReportante'])." ".esc($reporte['apeReportante']) ." reportó a: ".esc($reporte['nomReportado'])." ".esc($reporte['apeReportado']) ?>
              </h6>

              <p class="mb-1 texto-grande">
                <strong><?= $reporte['tipo'] === 'comentario' ? 'Comentario' : 'Respuesta' ?>:</strong>
                <?= esc($reporte['tipo'] === 'comentario' ? $reporte['textoComentario'] : $reporte['textoRespuesta']) ?>
              </p>

              <?php 
                switch($reporte['motivoReporte']){
                  case 'spam': $motivoReporte = "Spam o publicidad no deseada"; break;
                  case 'abuso': $motivoReporte = "Lenguaje ofensivo o abusivo"; break;
                  case 'informacion_falsa': $motivoReporte = "Información falsa o engañosa"; break;
                  case 'contenido_inapropiado': $motivoReporte = "Contenido inapropiado"; break;
                  default: $motivoReporte = "Otros";
                }
              ?>
              <p class="mb-1 text-muted small">
                <strong>Razón del reporte:</strong> <?= esc($motivoReporte) ?>
              </p>

              <?php if (!empty($reporte['comentarioReporte'])): ?>
                <p class="mb-1 text-muted small">
                  <strong>Información extra:</strong> <?= esc($reporte['comentarioReporte']) ?>
                </p>
              <?php endif; ?>
            </div>
          </div>

          <div class="ms-3 d-flex flex-column gap-2">
            <a href="<?= site_url('ComentariosUsuario/' . $reporte['idUsuarioReportado']) ?>" class="boton-verde-chico">
              <i class="bi bi-person me-1"></i> Ver Usuario
            </a>

            <?php if ($reporte['tipo'] === 'comentario'): ?>
              <?= form_open('form/borrarComentario') ?>
                <input type="hidden" name="idComentario" value="<?= esc($reporte['idComentario']) ?>">
                <input type="hidden" name="idReporte" value="<?= esc($reporte['idReporte']) ?>">
                <button type="submit" class="boton-rojo-chico">
                  <i class="bi bi-slash-circle me-1"></i> Borrar
                </button>
              <?= form_close() ?>
            <?php else: ?>
              <?= form_open('form/borrarRespuesta') ?>
                <input type="hidden" name="idRespuesta" value="<?= esc($reporte['idRespuesta']) ?>">
                <input type="hidden" name="idReporte" value="<?= esc($reporte['idReporteRespuesta']) ?>">
                <button type="submit" class="boton-rojo-chico">
                  <i class="bi bi-slash-circle me-1"></i> Borrar
                </button>
              <?= form_close() ?>
            <?php endif; ?>

            <?php if ($reporte['tipo'] === 'comentario'): ?>
              <?= form_open('form/ignorarReporteComentario') ?>
                <input type="hidden" name="idReporte" value="<?= esc($reporte['idReporte']) ?>">
                <button type="submit" class="boton-gris-chico">
                  <i class="bi bi-eye-slash me-1"></i> Ignorar
                </button>
              <?= form_close() ?>
            <?php else: ?>
              <?= form_open('form/ignorarReporteRespuesta') ?>
                <input type="hidden" name="idReporte" value="<?= esc($reporte['idReporteRespuesta']) ?>">
                <input type="hidden" name="idRespuesta" value="<?= esc($reporte['idRespuesta']) ?>">
                <button type="submit" class="boton-gris-chico">
                  <i class="bi bi-eye-slash me-1"></i> Ignorar
                </button>
              <?= form_close() ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p class="text-center text-muted">No hay reportes activos actualmente.</p>
  <?php endif; ?>
</section>

<?= view('partials/footer') ?>
<?= view('partials/scriptValidacion') ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
