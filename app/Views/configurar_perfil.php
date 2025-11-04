<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Proyecto STEAM de creación de eco-crayones caseros en nivel inicial.">
  <title>Configurar perfil – Jardín de Infantes Francisca Dalinda López</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/estilos.css">
</head>

<body>
<?= view('partials/navbar')?>


<body class="bg-light">
  <div class="container my-5 w-50">
    <h1 class="text-center mb-4">Cambiar Foto</h1>
    <?= view('partials/errores')?>

    <?php
    echo form_open_multipart('form/actualizarFoto', ['class'=>'needs-validation']);
    echo form_label('Foto de perfil', 'imagen');
    echo form_upload([
        'name' => 'imagen',
        'id' => 'imagen',
        'class' => 'form-control',
        'accept' => 'image/*',
        'required' => true
    ]);
    echo "<br>";
    echo form_submit('subir','Actualizar foto',['class'=>'boton-amarillo']);
    echo form_close();
    ?>
    <br>
    
    <div class="d-grid gap-2">
     <a href="<?= base_url('index.php/CambiarContrasenia') ?>">Cambiar contraseña</a>
    </div>
  </div>

    <?= view('partials/footer')?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>