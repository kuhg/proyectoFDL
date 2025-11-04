<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Proyectos – Jardín de Infantes Francisca Dalinda López</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('public/css/estilos.css') ?>">
</head>

<body class="fondo-dibujo">
  <?= view('partials/navbar') ?>

  <div class="d-flex justify-content-center align-items-center flex-column w-50 mx-auto text-center my-5">
    <h2>Proyectos escolares</h2>
  </div>


  <div class="container my-4">
    <?php echo form_open('form/filtrarProyectos',['class'=>'row g-3 align-items-end justify-content-center']); ?>
      <div class="col-md-3">
        <?php echo form_label('Desde:','desde'); ?>
        <?= form_input([
          'type'  => 'date',
          'name'  => 'desde',
          'id'    => 'desde',
          'class' => 'form-control',
          'value' => esc($fechaDesde ?? '')
        ]); ?>
      </div>

      <div class="col-md-3">
        <?php echo form_label('Hasta:','hasta'); ?>
        <?= form_input([
          'type'  => 'date',
          'name'  => 'hasta',
          'id'    => 'hasta',
          'class' => 'form-control',
          'value' => esc($fechaHasta ?? '')
        ]); ?>
      </div>

      <div class="col-md-2 text-center">
        <?php echo form_submit('enviar', 'Filtrar',['class'=>'boton-amarillo w-100']); ?>
      </div>

      <div class="col-md-2 text-center">
        <?php echo form_reset('reset', 'Limpiar Formulario',['class'=>'boton-gris w-100']); ?>
      </div>
    <?php form_close(); ?>
  </div>

  <div class="container-fluid d-flex align-items-center flex-column">

    <?php if (!empty($publicaciones)): ?>
      <?php foreach ($publicaciones as $pub): ?>
        <div class="card blanco-transparente mb-4 w-75 mx-auto shadow-lg">
          <div class="row g-0">

            <div class="col-md-3">
              <?php if (!empty($imagenes[$pub['idPublicacion']])): //si no es null carga imagen?>
                <img 
                  src="<?= base_url('public/'.$imagenes[$pub['idPublicacion']]['rutaImagen']) ?>" 
                  class="img-fluid rounded-start h-100 object-fit-cover" 
                  alt="<?= esc($pub['tituloPublicacion']) ?>">
              <?php else: //si es null carga sample?>
                <img 
                  src="<?= base_url('public/img/sample.jpg') ?>" 
                  class="img-fluid rounded-start h-100 object-fit-cover" 
                  alt="Sin imagen">
              <?php endif; ?>
            </div>

            <div class="col-md-7 d-flex align-items-center">
              <div class="card-body">
                <h4 class="card-title fs-2"><?= esc($pub['tituloPublicacion']) ?></h4>
                <p class="card-text">
                  <small class="text-muted">
                    Publicado el <?= date('d/m/Y', strtotime($pub['fechaPublicacion'])) ?>
                  </small>
                </p>
                <a href="<?= base_url().'index.php/Publicacion/'.$pub['idPublicacion'] ?>" class="boton-amarillo">
                  Ver Proyecto
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-center my-4">
            <?php $pager->links() ?> 
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-center mt-5">No hay proyectos disponibles por el momento.</p>
    <?php endif; ?>

  </div>

  <?= view('partials/footer') ?>
  <?= view('partials/scriptScroll') ?>
  <?= view('partials/fadein')?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>