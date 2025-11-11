<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Recuperar contraseña – Jardín de Infantes Francisca Dalinda López</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/estilos.css">
</head>
<body>

<?= view('partials/navbar')?>

    <div class="d-flex align-items-center">
        <?= view('partials/notificacionInicio')?>
    </div>

  <main class="container d-flex align-items-center justify-content-center" style="min-height: 80vh;">
    <div class="card shadow-sm p-4 w-100" style="max-width: 420px;">
      <div class="text-center mb-4">
        <h2 class="mt-2">Recuperar contraseña</h2>
        <p class="text-muted">Ingresa tu correo electrónico y te enviaremos un enlace para restablecerla.</p>
        <?= view('partials/errores')?>
      </div>

      <!-- Formulario -->
       <?php echo form_open('form/recuperarContrasenia'); ?>
        <div class="mb-3">
          <?php echo form_label('Correo: ','email', ['class'=>'form-label']); ?>
          <?php echo form_input([
                'type' => 'email',
                'placeholder'=>'tuemail@ejemplo.com',
                'name' => 'email',
                'id' => 'email',
                'class' => 'form-control',
                'required' => true
            ]);;
          ?>
          <br>
        <div class="d-flex justify-content-center">
          <?php echo form_button([
                'name' => 'enviar',
                'type' => 'submit',
                'content' => '<i class="bi bi-envelope"></i> Enviar enlace',
                'class' => 'boton-amarillo'
            ]);
          ?>
        </div>
      <?php echo form_close(); ?>

      <div class="text-center mt-3">
        <a href="/login" class="text-decoration-none">Volver al inicio de sesión</a>
      </div>
    </div>
  </main>

    <?= view('partials/footer')?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
