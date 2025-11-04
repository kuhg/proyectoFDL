<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Formulario para cambiar contraseña de usuario">
  <title>Cambiar Contraseña – Jardín de Infantes Francisca Dalinda López</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('public/css/estilos.css') ?>">
</head>

<body>
  <?= view('partials/navbar') ?>

  <div class="container my-5" style="max-width: 480px;">
    <div class="card shadow-sm p-4">
      <h1 class="text-center mb-4">Cambiar contraseña</h1>

      <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
          <?php foreach (session('errors') as $error): ?>
            <div><?= esc($error) ?></div>
          <?php endforeach ?>
        </div>
      <?php elseif (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
          <?= esc(session('success')) ?>
        </div>
      <?php endif; ?>

      <?= form_open('form/cambiarContrasenia', ['class' => 'needs-validation', 'novalidate' => true]) ?>

        <div class="mb-3">
          <?= form_label('Contraseña actual:', 'contraseniaAntigua', ['class' => 'form-label']) ?>
          <?= form_password([
                'name' => 'contraseniaAntigua',
                'id' => 'contraseniaAntigua',
                'class' => 'form-control',
                'autocomplete' => 'current-password',
                'required' => true
          ]) ?>
          <div class="invalid-feedback">Este campo es obligatorio.</div>
        </div>

        <div class="mb-3">
          <?= form_label('Contraseña nueva:', 'contraseniaNueva', ['class' => 'form-label']) ?>
          <?= form_password([
                'name' => 'contraseniaNueva',
                'id' => 'contraseniaNueva',
                'class' => 'form-control',
                'autocomplete' => 'new-password',
                'required' => true
          ]) ?>
          <div class="invalid-feedback">Este campo es obligatorio.</div>
        </div>

        <div class="mb-3">
          <?= form_label('Confirmar contraseña nueva:', 'contraseniaNuevaValidacion', ['class' => 'form-label']) ?>
          <?= form_password([
                'name' => 'contraseniaNuevaValidacion',
                'id' => 'contraseniaNuevaValidacion',
                'class' => 'form-control',
                'autocomplete' => 'new-password',
                'required' => true
          ]) ?>
          <div class="invalid-feedback">Este campo es obligatorio.</div>
        </div>

        <div class="d-flex gap-2 mt-3 justify-content-center">
          <?= form_submit('submit', 'Cambiar Contraseña', ['class' => 'boton-amarillo']) ?>
          <?= form_reset('reset', 'Limpiar', ['class' => 'boton-gris']) ?>
        </div>

      <?= form_close() ?>
    </div>
  </div>

  <?= view('partials/footer') ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <?= view('partials/scriptValidacion') ?>
</body>
</html>
