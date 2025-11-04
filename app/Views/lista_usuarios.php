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
  <link rel="stylesheet" href="<?= base_url('public/css/estilos.css') ?>">
</head>

<body>
<?= view('partials/navbar')?>

  <section class="container my-5">
  <h2 class="h3 text-center mb-4">Usuarios</h2><br>
  <div class="d-flex mb-5">
    
      <?= form_open('form/filtrarUsuarios', ['class' => 'row g-3 align-items-end']); ?>
      <div class="col-md-3">
          <?= form_label('Buscar por nombre', 'nombre'); ?>
          <?= form_input(array(
            'name'=>'nombre',
            'id'=>'nombre',
            'class'=>'form-control',
            'placeholder'=>'Nombre'
          )); ?>
      </div>
      <div class="col-md-3">
          <?= form_label('Buscar por Documento', 'documento'); ?>
          <?= form_input(array(
            'name'=>'documento',
            'id'=>'documento',
            'class'=>'form-control',
            'placeholder'=>'XXXXXXXX'
          )); ?>
      </div>

      <div class="col-md-2">
          <?= form_label('Estado:', 'estado'); ?>
          <?= form_dropdown('estado', [
              ''  => 'Todos',
              '1' => 'Activos',
              '0' => 'Suspendidos'
          ], '', ['id'=>'estado','class'=>'form-select']); ?>
      </div>

      <div class="col-md-2">
          <?= form_label('Desde:', 'desde'); ?>
          <?= form_input([
            'type'  => 'date',
            'name'  => 'desde',
            'id'    => 'desde',
            'class' => 'form-control',
            'value' => esc($fechaDesde ?? '')
          ]); ?>
      </div>

      <div class="col-md-2">
          <?= form_label('Hasta:', 'hasta'); ?>
          <?= form_input([
          'type'  => 'date',
          'name'  => 'hasta',
          'id'    => 'hasta',
          'class' => 'form-control',
          'value' => esc($fechaDesde ?? '')
        ]); ?>
      </div>

      <div class="col-12 d-flex justify-content-center gap-2 mt-3">
          <?= form_submit('filtrar','Filtrar',['class'=>'boton-amarillo']); ?>
          <?= form_reset('reset','Limpiar',['class'=>'boton-gris']); ?>
      </div>

      <?= form_close(); ?>

  </div>

  <?php if(!empty($usuarios)): ?>
    <?php foreach($usuarios as $usuario): ?>
      <div class="card my-4 border-0 shadow-sm p-3">
        <div class="d-flex justify-content-between align-items-center">

          <div class="d-flex align-items-center">
            <img src="<?= base_url('public/' . ($usuario['fotoUsuario'] ?? 'img/sample.jpg')) ?>" 
                 alt="Avatar de usuario"
                 class="rounded-circle me-3 imagen-perfil-grande">

            <div>
              <h6 class="mb-1 fw-bold texto-grande-titulo">
                <?= esc($usuario['nomUsuario'] . ' ' . $usuario['apeUsuario']) ?>
                <?php switch ($usuario['permisosUsuario']){ 
                  case 0: echo '<span class="badge bg-primary ms-2">Tutor</span>';
                          break;
                  case 1: echo '<span class="badge bg-primary ms-2">Administrador</span>';
                          break;
                  case 2: echo '<span class="badge bg-primary ms-2">Moderador</span>';
                          break;
                  case 3: echo '<span class="badge bg-primary ms-2">Editor</span>';
                          break;
                 } ?>
              </h6>
              <p class="mb-1 texto-grande">Comentarios: <?= esc($usuario['comentarios_count'] ?? '0') ?></p>
              <p class="mb-1 text-muted small">Documento: <?= esc($usuario['docUsuario']) ?></p>
              <small class="text-muted">Fecha de creación: <?= esc($usuario['creacion'] ?? 'Desconocida') ?></small>
            </div>
          </div>

          <div class="d-flex flex-column gap-2">
            <a href="<?= base_url().'index.php/ComentariosUsuario/'.$usuario['idUsuario'] ?>" 
               class="boton-verde-chico d-flex align-items-center justify-content-center">
              <i class="bi bi-chat-dots me-1"></i>Ver perfil
            </a>
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
      </div>
      
    <?php endforeach; ?>
    <?= $pager->links() ?>
  <?php else: ?>
    <p class="text-center text-muted">No hay usuarios registrados.</p>
  <?php endif; ?>
</section>

    <?= view('partials/footer')?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>