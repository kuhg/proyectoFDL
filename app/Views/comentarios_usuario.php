<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Comentarios de un usuario específico.">
  <title>Comentarios de Usuario – Jardín de Infantes Francisca Dalinda López</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('public/css/estilos.css') ?>">
</head>

<body>
<?= view('partials/navbar') ?>

<main class="container my-5">
  <h1 class="h3 text-center mb-5">
    Comentarios de <span class="text-primary"><?= esc($usuario['nomUsuario'] . ' ' . $usuario['apeUsuario']) ?></span>
  </h1>

  <div class="row justify-content-center">

    <!-- Foto de usuario y botones de acción -->
    <div class="col-md-4 text-center mb-4">
      <img src="<?= base_url('public/' . ($usuario['fotoUsuario'] ?? 'img/sample.jpg')) ?>"
           alt="Foto de perfil del usuario"
           class="rounded-circle img-fluid shadow mb-3"
           style="width:180px; height:180px; object-fit:cover;">

      <!-- informacion sobre el usuario -->
      <div class="d-flex flex-column align-items-center mt-3">
          <p><strong>Correo: </strong><?= $usuario['correoUsuario'] ?></p>
          <p><strong>Contacto: </strong><?= $usuario['contactoUsuario'] ?></p>
          <p><strong>Contacto de urgencia: </strong><?= $usuario['contactoUrgenciaUsuario'] ?></p>
          <p><strong>Direccion: </strong><?= $usuario['direccionUsuario'] ?></p>
      </div>

      <!-- Botones de acción sobre el usuario -->
      <div class="d-flex flex-column align-items-center mt-3">
          <?php if($usuario['estadoUsuario']==0): ?>
            <?= form_open('form/quitarSuspencion') ?>
              <input type="hidden" name="idUsuario" value="<?= esc($usuario['idUsuario']) ?>">
              <button type="submit" class="boton-amarillo-chico">
                <i class="bi bi-slash-circle me-1"></i>Quitar suspencion
              </button>
            <?= form_close() ?>
            <?php else: ?>
            <?= form_open('form/suspenderUsuario') ?>
              <input type="hidden" name="idUsuario" value="<?= esc($usuario['idUsuario']) ?>">
              <button type="submit" class="boton-rojo-chico">
                <i class="bi bi-slash-circle me-1"></i>Suspender
              </button>
            <?= form_close() ?>
          <?php endif; ?>
      </div>
    </div>

    <!-- Lista de comentarios -->
    <div class="col-md-8">
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <?php if (!empty($comentarios)): ?>
          <ul class="list-group">
            <?php foreach ($comentarios as $comentario): ?>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div>
                  <strong>Comentario:</strong> <?= esc($comentario['textoComentario']) ?><br>
                  <small class="text-muted">Publicado el <?= date('d/m/Y', strtotime($comentario['fechaComentario'])) ?></small>
                </div>
                <?php if($comentario['estadoComentario']==1): ?>

                <?= form_open('form/borrarComentario') ?>
                <?php echo form_hidden('idUsuario', $usuario['idUsuario']) ?>
                <?php echo form_hidden('idComentario', $comentario['idComentario']) ?>
                <?php echo form_submit('enviar','Quitar', ['class'=>'boton-rojo'] ) ?>
                <?= form_close() ?>
                <?php endif; ?>

              </li>
            <?php endforeach; ?>
          </ul>
          <div class="d-flex justify-content-center my-4">
            <?= $pager->links() ?>
          </div>
          <?php else: ?>
            <p class="text-center text-muted">Este usuario aún no ha realizado comentarios.</p>
          <?php endif; ?>
        </div>
      </div>
    </div>

  </div>
</main>

<?= view('partials/footer') ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
