<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preguntas frecuentes – Jardín de Infantes Francisca Dalinda López</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/estilos.css">
</head>
  <body class="fondo-dibujo ">
    <?= view('partials/navbar')?>

      <div class="container blanco-transparente div-con-padding mx-auto quienes-somos text-center">
            <?php 
            $session = session();
            $usuario = $session->get('usuario'); 
            ?>

            <h2 class="mb-4">Preguntas frecuentes</h2>
            <?php if ($usuario && ($usuario['permisos'] == 1 || $usuario['permisos'] == 3)): ?>
              <div class="justify-content-center d-flex mb-3">
                <button type="button" class="boton-amarillo" data-bs-toggle="modal" data-bs-target="#preguntaModal">
                  <i class="bi bi-pencil-square"></i> Agregar pregunta
                </button>
              </div>
            <?php endif; ?>
      </div>


  <section class="container blanco-transparente mb-5">
      <div class="accordion" id="faqAccordion">
        <?php if (!empty($preguntas)): ?>
          <?php foreach ($preguntas as $index => $faq): ?>
            <div class="accordion-item">
              <h2 class="accordion-header" id="heading<?= $index ?>">
                <button class="accordion-button <?= $index === 0 ? '' : 'collapsed' ?>" 
                        type="button" 
                        data-bs-toggle="collapse"
                        data-bs-target="#collapse<?= $index ?>" 
                        aria-expanded="<?= $index === 0 ? 'true' : 'false' ?>" 
                        aria-controls="collapse<?= $index ?>">
                  <?= esc($faq['pregunta']) ?>
                </button>
              </h2>

              <div id="collapse<?= $index ?>" 
                  class="accordion-collapse collapse <?= $index === 0 ? 'show' : '' ?>" 
                  aria-labelledby="heading<?= $index ?>" 
                  data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  <?= esc($faq['respuesta']) ?>
                  <!-- Botón Editar y borrar -->
                  <?php if ($usuario && ($usuario['permisos'] == 1 || $usuario['permisos'] == 3)): ?>
                    <div class="mt-2 justify-content-center d-flex text-end gap-2 ">
                      <?php echo form_open('form/eliminarPregunta') ?>
                      <input type="hidden" name="idPregunta" value="<?= esc($faq['idFaq']) ?>">
                      <?= form_submit('borrar', 'Borrar', ['class' => 'boton-rojo']) ?>
                      <?php echo form_close(); ?>
                      </a>
                      <button type="button" 
                              class="btn boton-amarillo btn-editar" 
                              data-id="<?= esc($faq['idFaq']) ?>"
                              data-pregunta="<?= esc($faq['pregunta']) ?>"
                              data-respuesta="<?= esc($faq['respuesta']) ?>"
                              data-bs-toggle="modal" 
                              data-bs-target="#editarModal">
                        <i class="bi bi-pencil-square"></i> Editar
                      </button>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p class="text-center">No hay preguntas frecuentes disponibles.</p>
        <?php endif; ?>
      </div>
  </section>

      <!-- Modal Agregar -->
    <div class="modal fade" id="preguntaModal" tabindex="-1" aria-labelledby="preguntaModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="preguntaModalLabel">Agregar Pregunta frecuente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>

          <div class="modal-body">
            <?= form_open('form/agregarPregunta', ['method' => 'post', 'class' => 'needs-validation', 'novalidate' => true]) ?>
              <div class="mb-3">
                <label for="pregunta" class="form-label">Pregunta:</label>
                <input type="text" name="pregunta" id="pregunta" class="form-control" required>
                <div class="invalid-feedback">
                  Por favor ingrese una pregunta.
                </div>
              </div>

              <div class="mb-3">
                <label for="respuesta" class="form-label">Respuesta:</label>
                <textarea name="respuesta" id="respuesta" class="form-control" rows="3" required></textarea>
                <div class="invalid-feedback">
                  Por favor ingrese una respuesta.
                </div>
              </div>

              <div class="text-end">
                <button type="submit" class="btn boton-amarillo">
                  <i class="bi bi-save"></i> Guardar
                </button>
              </div>
            <?= form_close() ?>
          </div>
        </div>
      </div>
    </div>

      <!-- Modal Editar -->
      <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            
            <div class="modal-header">
              <h5 class="modal-title" id="editarModalLabel">Editar pregunta frecuente</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body">
              <?= form_open('form/editarPregunta', ['method' => 'post', 'class' => 'needs-validation', 'novalidate' => true]) ?>
                <input type="hidden" name="idFaq" id="editar-idFaq">

                <div class="mb-3">
                  <label for="editar-pregunta" class="form-label">Pregunta:</label>
                  <input type="text" name="pregunta" id="editar-pregunta" class="form-control" required>
                  <div class="invalid-feedback">
                    Por favor ingrese una pregunta.
                  </div>
                </div>

                <div class="mb-3">
                  <label for="editar-respuesta" class="form-label">Respuesta:</label>
                  <textarea name="respuesta" id="editar-respuesta" class="form-control" rows="3" required></textarea>
                  <div class="invalid-feedback">
                    Por favor ingrese una respuesta.
                  </div>
                </div>

                <div class="text-end">
                  <button type="submit" class="btn boton-amarillo">
                    <i class="bi bi-save"></i> Guardar cambios
                  </button>
                </div>
              <?= form_close() ?>
            </div>
          </div>
        </div>
      </div>

    <div class="blanco-transparente div-con-padding d-flex justify-content-center align-items-center flex-column w-50 mx-auto text-center">
        <h5>Contactos</h5>
        <p>Correo: franciscadalindal@gmail.com</p>
        <p>Direccion: calle D. F. Sarmiento s/n de la localidad de Ambul</p>
    </div>

    <?= view('partials/footer')?>
    <?= view('partials/scriptEditarPregunta')?>
    <?= view('partials/scriptScroll')?>
    <?= view('partials/scriptValidacion')?>
    <?= view('partials/fadein')?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>