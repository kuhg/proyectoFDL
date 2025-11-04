<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Proyecto STEAM de creación de eco-crayones caseros en nivel inicial.">
  <title>Crear Usuario – Jardín de Infantes Francisca Dalinda López</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/estilos.css">
</head>

<body>
<?= view('partials/navbar')?>

  <div class="container my-5 w-50">
    <h1 class="text-center mb-4">Cargar usuario nuevo</h1>
    
    <?= view('partials/errores')?>
    <?php
      echo form_open('form/crearUsuario', [
          'id' => 'formProyecto',
          'enctype' => 'multipart/form-data',
          'class' => 'needs-validation',
          'novalidate' => true
      ]);

      // Nombre del usuario
      echo form_label('Nombre del usuario: ', 'nombreUsuario');
      echo form_input([
          'type' => 'text',
          'name' => 'nombreUsuario',
          'id' => 'nombreUsuario',
          'class' => 'form-control',
          'required' => true
      ]);
      echo '<div class="invalid-feedback">Esta casilla está vacía</div><br>';

      // Apellido del usuario
      echo form_label('Apellido del usuario: ', 'apellidoUsuario');
      echo form_input([
          'type' => 'text',
          'name' => 'apellidoUsuario',
          'id' => 'apellidoUsuario',
          'class' => 'form-control',
          'required' => true
      ]);
      echo '<div class="invalid-feedback">Esta casilla está vacía</div><br>';

      // Correo del usuario
      echo form_label('Correo del usuario: ', 'correoUsuario');
      echo form_input([
          'type' => 'email',
          'name' => 'correoUsuario',
          'id' => 'correoUsuario',
          'class' => 'form-control',
          'required' => true
      ]);
      echo '<div class="invalid-feedback">Esta casilla está vacía</div><br>';

      // Documento del usuario
      echo form_label('Documento del usuario: ', 'documentoUsuario');
      echo form_input([
          'type' => 'number',
          'name' => 'documentoUsuario',
          'id' => 'documentoUsuario',
          'class' => 'form-control',
          'required' => true
      ]);
      echo '<div class="invalid-feedback">Esta casilla está vacía</div><br>';
      //direccion
      echo form_label('Direccion del usuario: ', 'direccionUsuario');
      echo form_input([
          'name' => 'direccionUsuario',
          'id' => 'direccionUsuario',
          'class' => 'form-control',
          'required' => true
      ]);
      echo '<div class="invalid-feedback">Esta casilla está vacía</div><br>';
      //telefono de contacto
      echo form_label('Contacto del usuario: ', 'contactoUsuario');
      echo form_input([
          'type' => 'number',
          'name' => 'contactoUsuario',
          'id' => 'contactoUsuario',
          'class' => 'form-control',
          'required' => true
      ]);
      echo '<div class="invalid-feedback">Esta casilla está vacía</div><br>';
      //contacto de urgencia
      echo form_label('Contacto de urgencia: ', 'contactoUrgenciaUsuario');
      echo form_input([
          'type' => 'number',
          'name' => 'contactoUrgenciaUsuario',
          'id' => 'contactoUrgenciaUsuario',
          'class' => 'form-control',
          'required' => true
      ]);
      echo '<div class="invalid-feedback">Esta casilla está vacía</div><br>';

      // Contraseña
      echo form_label('Contraseña: ', 'contraseniaUsuario');
      echo form_password([
          'name' => 'contraseniaUsuario',
          'id' => 'contraseniaUsuario',
          'class' => 'form-control',
          'required' => true
      ]);
      echo '<div class="invalid-feedback">Esta casilla está vacía</div><br>';

      // Verificación de contraseña
      echo form_label('Ingrese otra vez la contraseña: ', 'contraseniaVerificacionUsuario');
      echo form_password([
          'name' => 'contraseniaVerificacionUsuario',
          'id' => 'contraseniaVerificacionUsuario',
          'class' => 'form-control',
          'required' => true
      ]);
      echo '<div class="invalid-feedback">Esta casilla está vacía</div><br>';
      // Tipo de permiso
      echo form_label('Tipo de permiso: ', 'permiso');
      echo form_dropdown(
          'permiso',
          [
              '0' => 'Tutor',
              '1' => 'Administrador',
              '2' => 'Moderador',
              '3' => 'Editor'
          ],
          '',
          [
              'id' => 'permiso',
              'class' => 'select-crear-usuario form-control'
          ]
      );
      echo '<br><br>';

      // Botones
      echo '<div class="d-flex gap-2 mt-3">';
      echo form_submit('enviar', 'Crear el usuario', ['class' => 'boton-amarillo']);
      echo form_reset('reset', 'Limpiar', ['class' => 'boton-gris']);
      echo '</div>';

      echo form_close();
      ?>
  </div>

    <?= view('partials/footer')?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<?= view('partials/scriptValidacion')?>
</body>
</html>