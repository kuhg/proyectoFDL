<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Proyecto STEAM de creación de eco-crayones caseros en nivel inicial.">
  <title>Iniciar Sesion – Jardín de Infantes Francisca Dalinda López</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/estilos.css">
</head>

<body>
<?= view('partials/navbar')?>
  <div class="container my-5 w-25">
    <h1 class="text-center mb-4">Iniciar sesion</h1>

    <?= view('partials/errores')?>
    <?= 
    form_open('form/iniciarSesion', [
        'id' => 'formProyecto',
        'enctype' => 'multipart/form-data',
        'class' => 'needs-validation',
        'novalidate' => true
    ]);

    // Documento del usuario
    echo form_label('Documento del Usuario: ', 'documentoUsuario');
    echo form_input([
        'type' => 'text',
        'name' => 'documento',
        'id' => 'documento',
        'class' => 'form-control',
        'required' => true
    ]);
    echo '<div class="invalid-feedback">Esta casilla está vacía</div><br>';

    // Contraseña
    echo form_label('Contraseña: ', 'contrasenia');
    echo form_password([
        'name' => 'contrasenia',
        'id' => 'contrasenia',
        'class' => 'form-control',
        'required' => true
    ]);
    echo '<div class="invalid-feedback">Esta casilla está vacía</div><br>';

    // Botones
    echo '<div class="d-flex gap-2 mt-3 justify-content-center">';
    echo form_submit('enviar', 'Iniciar sesión', ['class' => 'boton-amarillo']);
    echo form_reset('reset', 'Limpiar', ['class' => 'boton-gris']);
    echo '</div>';

    echo form_close();
    ?>
    <br>
    <div class="d-grid justify-content-center gap-2">
     <a href="<?= base_url('index.php/RecuperarContrasenia') ?>">Olvide mi contraseña</a>
    </div>
  </div>

    <?= view('partials/footer')?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<?= view('partials/scriptValidacion')?>
</body>
</html>