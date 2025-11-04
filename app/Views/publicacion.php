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
  <link rel="stylesheet" href="<?= base_url('public/css/estilos.css') ?>">
  <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
</head>

<body class="fondo-dibujo">
<?= view('partials/navbar')?>

<main>
  <?php $session = session(); ?>
  <section class="container blanco-transparente text-center my-5">
    <h1 class="display-5 fw-semibold "><?= esc($publicacion['tituloPublicacion']) ?></h1>
    <p class="text-muted">Publicado en: <?= date('d/m/Y', strtotime($publicacion['fechaPublicacion'])) ?></p>
  </section>

  <?php if ($session->has('usuario') && ($session->get('usuario')['permisos'] == 1 || $session->get('usuario')['permisos'] == 2)): ?>

    <section class="container my-4">
      <div class="d-flex gap-2 justify-content-center">
        <div>
          <?= form_open('form/borrarPublicacion') ?>
            <input type="hidden" name="idPublicacion" value="<?= esc($publicacion['idPublicacion']) ?>">
            <?= form_submit('borrar', 'Borrar', ['class' => 'boton-rojo']) ?>
          <?= form_close() ?>
        </div>
        <div>
          <?php //Editar publicacion ?>
            <a href="<?= base_url().'index.php/EditarPublicacion/'.$publicacion['idPublicacion'] ?>" class="boton-amarillo">
                Ver Proyecto
            </a>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <section class="container blanco-transparente my-5">
    <h2 class="h3 text-center mb-4 titulo-seccion">Resumen del proyecto</h2>
    <p class="texto-principal">
      <?= esc($publicacion['resumenPublicacion']) ?>  
    </p>
  </section>

      <!-- Galería de imágenes -->
  <section class="container my-5">
    <h2 class="h3 text-center mb-4"></h2>
  <div class="grid">
  <div class="grid-sizer"></div>
    <?php
      foreach($imagenes as $img){
        echo '<div class="grid-item">
                <img src="'.base_url('public/'.$img['rutaImagen']).'" class="img-fluid rounded shadow-sm imagen-zoom" alt="Imagen del proyecto">
              </div>';
      }
    ?>
  </div>
  </section>

  <section class="container blanco-transparente my-5">
    <?php 
      $objetivos = explode('.', $publicacion['objetivosPublicacion']);
    ?>
    <h2 class="h3 text-center titulo-seccion mb-4">Objetivos</h2>
    <ul class=" ms-md-5">
    <?php
      foreach ($objetivos as $objetivo) {
        $objetivo = trim($objetivo);
          if ($objetivo !== '') { 
              echo "<li>" . esc($objetivo) . "</li>";
        }
      }
    ?>
    </ul>
  </section>

  <!-- Cierre -->
  <section class="container blanco-transparente my-5">
    <div class="container-fluid ">
      <h2 class="h3 text-center titulo-seccion mb-4">Conclusión</h2>
      <p class="texto-principal"><?= esc($publicacion['conclucionPublicacion']) ?></p>
    </div>
  </section>
  <?php $session = session(); ?>
  <?php if (!$session->has('usuario')):?>
  <section>
    <div class="container card my-4 border-0 shadow-sm align-items-center">
      <div class="card-body d-flex">
          <h2 class="h3 text-center mb-4">¿Tienes cuenta? Inicia sesion para dejar un comentario!</h3>
      </div>
          <?php 
            $session->set('idPublicacion', $publicacion['idPublicacion']);
          ?>
          <a href="<?= base_url('index.php/IniciarSesion') ?>">
            <button class="boton-amarillo">Iniciar Sesion</button>
          </a>
    </div>
  </section>
  <?php endif; ?>
  
  <section class="container my-5">
    <h2 class="h3 text-center mb-4">Comentarios</h2><br>
    <?php if ($session->has('usuario')): ?>
    <div class="d-flex  justify-content-center mb-4">
      <button type="button"
              class="boton-amarillo"
              data-bs-toggle="modal"
              data-bs-target="#comentarioModal">
        Dejar comentario
      </button>
    </div>
    <?php endif; ?>
    <!-- Tarjeta de comentario -->
    <?php if (!empty($comentarios)): ?>
      <?php foreach ($comentarios as $comentario): ?>
        <div class="blanco-transparente card my-4 border-0 shadow-sm">
          <div class="card-body d-flex">
            <!-- Avatar -->
            <img src="<?= base_url('public/' . ($comentario['fotoUsuario'] ?? 'img/sample.jpg')) ?>" 
                alt="Avatar de usuario"
                class="rounded-circle me-3"
                style="width:60px; height:60px; object-fit:cover;">

            <div class="flex-grow-1">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="fw-bold mb-0"><?= esc($comentario['nomUsuario'].' '.$comentario['apeUsuario']) ?></h6>
                <div class="d-flex gap-2">
                  <!-- boton respuesta -->
                  <?php if ($session->has('usuario')): ?>
                    <button type="button"
                            class="boton-verde btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#respuestaModal"
                            onclick="setComentarioIdRespuesta(<?= esc($comentario['idComentario']) ?>)">
                      <i class="bi bi-chat-dots me-1"></i> Responder
                    </button>
                  <?php endif; ?>
                  <!-- boton reporte -->
                  <?php if ($session->has('usuario')): ?>
                    <button type="button"
                            class="boton-rojo btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#reportModal"
                            onclick="setComentarioId(<?= esc($comentario['idComentario']) ?>)">
                      <i class="bi bi-flag"></i> Reportar
                    </button>
                  <?php endif; ?>
                  <!-- boton borrar -->
                  <?php $usuario = $session->get('usuario'); ?>
                  <?php if (($session->has('usuario')) && ($usuario['permisos'] == 1 || $usuario['id'] == $comentario['idUsuario'])): ?>
                    <?= form_open('form/borrarComentarioPublicacion', ['class' => 'm-0']) ?>
                      <input type="hidden" name="idComentario" value="<?= esc($comentario['idComentario']) ?>">
                      <input type="hidden" name="idPublicacion" value="<?= esc($publicacion['idPublicacion']) ?>">
                      <button type="submit" class="boton-rojo-chico btn-sm">
                        <i class="bi bi-slash-circle me-1"></i> Borrar
                      </button>
                    <?= form_close() ?>
                  <?php endif; ?>
                </div>
              </div>

              <p class="mb-2"><?= esc($comentario['textoComentario']) ?></p>
              <small class="text-muted">
                Publicado el <?= date('d/m/Y', strtotime($comentario['fechaComentario'])) ?>
              </small>

              <!-- Respuestas del comentario -->
              <?php if (!empty($comentario['respuestas'])): ?>
                <div class="mt-3 ms-5 border-start ps-3">
                  <?php foreach ($comentario['respuestas'] as $respuesta): ?>
                    <br>
                    <div class="d-flex mb-3">
                      <img src="<?= base_url('public/' . ($respuesta['fotoUsuario'] ?? 'img/sample.jpg')) ?>" 
                          alt="Avatar de respuesta"
                          class="rounded-circle me-2"
                          style="width:45px; height:45px; object-fit:cover;">
                      <div>
                        <h6 class="fw-bold mb-1">
                          <?= esc($respuesta['nomUsuario'].' '.$respuesta['apeUsuario']) ?>
                        </h6>
                        <p class="mb-1"><?= esc($respuesta['textoRespuesta']) ?></p>
                        <small class="text-muted">Respuesta</small>
                      </div>
                      <div class="d-flex gap-2 ms-auto">
                        <!-- boton reporte -->
                        <?php if ($session->has('usuario')): ?>
                          <button type="button"
                                  class="boton-rojo btn-sm"
                                  data-bs-toggle="modal"
                                  data-bs-target="#reportRespuestaModal"
                                  onclick="setRespuestaId(<?= esc($respuesta['idRespuesta']) ?>)">
                            <i class="bi bi-flag"></i> Reportar
                          </button>
                        <?php endif; ?>
                        <!-- boton borrar -->
                        <?php $usuario = $session->get('usuario'); ?>
                        <?php if (($session->has('usuario')) && ($usuario['permisos'] == 1 || $usuario['id'] == $comentario['idUsuario'])): ?>
                          <?= form_open('form/borrarRespuestaPublicacion', ['class' => 'm-0']) ?>
                            <input type="hidden" name="idRespuesta" value="<?= esc($respuesta['idRespuesta']) ?>">
                            <input type="hidden" name="idPublicacion" value="<?= esc($publicacion['idPublicacion']) ?>">
                            <button type="submit" class="boton-rojo-chico btn-sm">
                              <i class="bi bi-slash-circle me-1"></i> Borrar
                            </button>
                          <?= form_close() ?>
                        <?php endif; ?>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
              <!-- Fin de respuestas -->
            </div>
          </div>
        </div>
      <?php endforeach; ?>

      <div class="d-flex justify-content-center mt-4">
        <?= $pager->links('comentarios', 'default_full') ?>
      </div>

    <?php else: ?>
      <p class="text-center text-muted">Aún no hay comentarios para esta publicación.</p>
    <?php endif; ?>
  </section>

<!-- Modal comentario-->

<div class="modal fade" id="comentarioModal" tabindex="-1" aria-labelledby="comentarioModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-warning-subtle">
        <h5 class="modal-title fw-bold" id="comentarioModalLabel">Nuevo comentario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <?php 
        echo form_open('form/comentario', ['class'=>'needs-validation', 'novalidate'=>true]); 
        ?>
        <input type="hidden" name="idPublicacion" value="<?= esc($publicacion['idPublicacion']) ?>">

        <div class="modal-body">
          <?php 
            echo form_label('Escriba su comentario', 'comentarioTexto');
            echo form_textarea([
              'name' => 'comentario',
              'id' => 'comentarioTexto',
              'rows' => 4,
              'class' => 'form-control',
              'required' => 'required'
            ]);
          ?>
          <div class="invalid-feedback">El comentario no puede estar vacío.</div>
        </div>

        <div class="modal-footer">
          <button type="button" class="boton-gris" data-bs-dismiss="modal">Cancelar</button>
          <?php echo form_submit('submit', 'Comentar', ['class'=>'boton-amarillo']); ?>
          <?php echo form_close(); ?>
        </div>
    </div>
  </div>
</div>

  <!--Modal respuesta-->

  <div class="modal fade" id="respuestaModal" tabindex="-1" aria-labelledby="respuestaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow">
        <div class="modal-header bg-warning-subtle">
          <h5 class="modal-title fw-bold" id="respuestaModalLabel">Responder comentario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <?php 
          echo form_open('form/respuesta', ['class'=>'needs-validation', 'novalidate'=>true]); 
          ?>
          <input type="hidden" name="idComentarioRespuesta" id="idComentarioRespuesta" value="">
          <input type="hidden" name="idPublicacion" value="<?= esc($publicacion['idPublicacion']) ?>">

          <div class="modal-body">
            <?php 
              echo form_label('Escriba su respuesta', 'respuestaTexto');
              echo form_textarea([
                'name' => 'respuesta',
                'id' => 'respuestaTexto',
                'rows' => 4,
                'class' => 'form-control',
                'required' => 'required'
              ]);
            ?>
            <div class="invalid-feedback">La respuesta no puede estar vacía.</div>
          </div>

          <div class="modal-footer">
            <button type="button" class="boton-gris" data-bs-dismiss="modal">Cancelar</button>
            <?php echo form_submit('submit', 'Responder', ['class'=>'boton-amarillo']); ?>
            <?php echo form_close(); ?>
          </div>
      </div>
    </div>
  </div>

  <!-- Modal reporte-->
  <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <?php echo form_open('form/reporte', ['id' => 'reportForm', 'class' => 'needs-validation', 'novalidate' => true]); ?>
          <div class="modal-header">
            <h5 class="modal-title" id="reportModalLabel">Reportar comentario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>

          <div class="modal-body">
            <p class="mb-3">Selecciona el motivo del reporte:</p>
            <input type="hidden" name="idComentario" id="idComentarioReporte" value="">
            <input type="hidden" name="idPublicacion" value="<?= esc($publicacion['idPublicacion']) ?>">

            <!-- Motivos -->
            <div class="mb-3">
              <?php
                echo form_label('Motivo: ', 'razonReporte');
                echo form_dropdown(
                  'razon',
                  [
                    'spam' => 'Spam o publicidad no deseada',
                    'abuso' => 'Lenguaje ofensivo o abusivo',
                    'informacion_falsa' => 'Información falsa o engañosa',
                    'contenido_inapropiado' => 'Contenido inapropiado',
                    'otro' => 'Otro'
                  ],
                  '',
                  [
                    'id' => 'razonReporte',
                    'class' => 'form-select',
                    'required' => 'required'
                  ]
                );
              ?>
            </div>

            <div class="mb-3">
              <?php 
                echo form_label('Detalles (Opcional)', 'detallesReporte');
                echo form_textarea([
                  'name' => 'detalles',
                  'id' => 'detallesReporte',
                  'rows' => 3,
                  'class' => 'form-control'
                ]);
              ?>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="boton-gris" data-bs-dismiss="modal">Cancelar</button>
            <?php echo form_submit('enviar', 'Enviar Reporte', ['class' => 'boton-amarillo']); ?>
          </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>

  <!-- Modal reporte de respuesta -->
  <div class="modal fade" id="reportRespuestaModal" tabindex="-1" aria-labelledby="reportRespuestaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <?php echo form_open('form/reporteRespuesta', ['id' => 'reportForm', 'class' => 'needs-validation', 'novalidate' => true]); ?>
          <div class="modal-header">
            <h5 class="modal-title" id="reportRespuestaModalLabel">Reportar respuesta</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>

          <div class="modal-body">
            <p class="mb-3">Selecciona el motivo del reporte:</p>
            <input type="hidden" name="idRespuesta" id="idRespuestaReporte" value="">
            <input type="hidden" name="idPublicacion" value="<?= esc($publicacion['idPublicacion']) ?>">

            <!-- Motivos -->
            <div class="mb-3">
              <?php
                echo form_label('Motivo: ', 'razonReporte');
                echo form_dropdown(
                  'razon',
                  [
                    'spam' => 'Spam o publicidad no deseada',
                    'abuso' => 'Lenguaje ofensivo o abusivo',
                    'informacion_falsa' => 'Información falsa o engañosa',
                    'contenido_inapropiado' => 'Contenido inapropiado',
                    'otro' => 'Otro'
                  ],
                  '',
                  [
                    'id' => 'razonReporte',
                    'class' => 'form-select',
                    'required' => 'required'
                  ]
                );
              ?>
            </div>

            <div class="mb-3">
              <?php 
                echo form_label('Detalles (Opcional)', 'detallesReporte');
                echo form_textarea([
                  'name' => 'detalles',
                  'id' => 'detallesReporte',
                  'rows' => 3,
                  'class' => 'form-control'
                ]);
              ?>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="boton-gris" data-bs-dismiss="modal">Cancelar</button>
            <?php echo form_submit('enviar', 'Enviar Reporte', ['class' => 'boton-amarillo']); ?>
          </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</main>
  <?= view('partials/footer')?>
  <?= view('partials/scriptValidacion')?>
  <script>
    function setComentarioId(comentarioId) {
      document.getElementById('idComentarioReporte').value = comentarioId;
    }
    function setComentarioIdRespuesta(comentarioId) {
      document.getElementById('idComentarioRespuesta').value = comentarioId;
    }
    function setRespuestaId(respuestaId) {
      const input = document.querySelector('#reportRespuestaModal input[name="idRespuesta"]');
      if (input) input.value = respuestaId;
    }
  </script>
  <?= view('partials/fadein')?>
  <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
  <script>
  document.addEventListener("DOMContentLoaded", function() {
    var grid = document.querySelector('.grid');

    // Esperar a que las imágenes carguen
    imagesLoaded(grid, function() {
      new Masonry(grid, {
        itemSelector: '.grid-item',
        columnWidth: '.grid-sizer',
        percentPosition: true,
        gutter: 15
      });
    });
  });
  </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>