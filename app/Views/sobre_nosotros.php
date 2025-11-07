<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sobre nosotros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/estilos.css">
</head>
  <body class="fondo-dibujo">
    <?= view('partials/navbar')?>
    <div class="div-con-padding d-flex justify-content-center align-items-center flex-column w-50 mx-auto text-center my-5 fs-3" style="font-size: 200%;">
      <h5 class="fs-1">Jardin de infantes</h5>
      <h1 class="fw-bold fs-1">Francisca Dalinda López</h1>
    </div>
    
    <div class="w-75 align-items-center flex-column justify-content-center mx-auto d-flex">
      <div class="card" style="width: 75rem;">
        <img src="../public/img/imagenJardin5.jpg" class="card-img-top" alt="...">
      </div>
      <br><br>
      <div class="blanco-transparente div-con-padding mx-auto quienes-somos">
            <?php 
            $session = session();
            $usuario = $session->get('usuario'); 
            ?>
            <div class="justify-content-center d-flex mb-3">
              <h2>Quienes somos</h2>
            </div>
            <?php if ($usuario && ($usuario['permisos'] == 1 || $usuario['permisos'] == 3)): ?>
              <div class="justify-content-center d-flex mb-3">
                <button type="button" class="boton-amarillo" data-bs-toggle="modal" data-bs-target="#editarModal">
                  <i class="bi bi-pencil-square"></i> Editar
                </button>
              </div>
            <?php endif; ?>
            <div>
              <p><?= nl2br(esc($info['contenido'] ?? '')) ?></p>
            </div>
        </div>
      </div>

    <div class="blanco-transparente div-con-padding d-flex justify-content-center align-items-center flex-column w-50 mx-auto text-center">
        <h5>Contactos</h5>
        <p>Correo: franciscadalindal@gmail.com</p>
        <p>Direccion: calle d. f. Sarmiento s/n de la localidad de Ambul</p>
    </div>

    <!-- Modal Editar -->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="editarModalLabel">Editar información</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>

          <div class="modal-body">
            <?= form_open('form/editarInformacion', ['method' => 'post']) ?>
              <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control" value="Quienes somos">
              </div>
              <div class="mb-3">
                <label for="contenido" class="form-label">Contenido</label>
                <textarea name="contenido" id="contenido" class="form-control" rows="8">
                </textarea>
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
    <?= view('partials/scriptScroll')?>
    <?= view('partials/footer')?>
    <?= view('partials/fadein')?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>