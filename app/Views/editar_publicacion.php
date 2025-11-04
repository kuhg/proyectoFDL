<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Proyecto STEAM de creación de eco-crayones caseros en nivel inicial.">
  <title>Crear publicacion – Jardín de Infantes Francisca Dalinda López</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('public/css/estilos.css') ?>">
</head>

<body>
<?= view('partials/navbar')?>

  <div class="formulario-publicacion container my-5" >
    <h1 class="text-center mb-4">Cargar nuevo proyecto</h1>
    <?= view('partials/errores')?>
    <?php
      echo form_open_multipart('form/editarPublicacion', [
          'id' => 'formProyecto',
          'enctype' => 'multipart/form-data',
          'class' => 'needs-validation',
          'novalidate' => true
      ]);
    ?>
    <input type="hidden" name="idPublicacion" value="<?= esc($publicacion['idPublicacion']) ?>">
    <?php
      echo form_label('Título del proyecto: ', 'titulo');
      echo form_input([
          'type' => 'text',
          'name' => 'titulo',
          'id' => 'titulo',
          'class' => 'form-control',
          'required' => true,
          'value' => $publicacion['tituloPublicacion']
      ]);
      echo '<div class="invalid-feedback">Ingresa un título.</div><br>';

      echo form_label('Resumen: ', 'resumen');
      echo form_textarea([
          'name' => 'resumen',
          'id' => 'resumen',
          'class' => 'form-control',
          'rows' => 8,
          'required' => true,
          'value' => $publicacion['resumenPublicacion']
      ]);
      echo '<div class="invalid-feedback">Ingresa un resumen.</div><br>';

      echo form_label('Conclusión: ', 'conclucion');
      echo form_textarea([
          'name' => 'conclucion',
          'id' => 'conclucion',
          'class' => 'form-control',
          'rows' => 8,
          'required' => true,
          'value' => $publicacion['conclucionPublicacion']
      ]);
      echo '<div class="invalid-feedback">Ingresa la conclusión.</div><br>';

      echo form_label('Objetivos (uno por oración): ', 'objetivos');
      echo form_textarea([
          'name' => 'objetivos',
          'id' => 'objetivos',
          'class' => 'form-control',
          'rows' => 8,
          'required' => true,
          'value' => $publicacion['objetivosPublicacion']
      ]);
      echo '<div class="invalid-feedback">Ingresa al menos un objetivo.</div><br>';

      // Botones
      echo '<div class="d-flex gap-2 mt-3 justify-content-center">';
      echo form_submit('enviar', 'Editar Publicación', ['class' => 'boton-amarillo']);
      echo form_reset('reset', 'Limpiar', ['class' => 'boton-gris']);
      echo '</div>';

      echo form_close();
    ?>
  </div>

    <?= view('partials/footer')?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.getElementById('imagenes').addEventListener('change', function(e) {
    const preview = document.getElementById('preview');
    preview.innerHTML = '';

    const files = Array.from(e.target.files);
    if (files.length > 6) {
      alert('Solo puedes subir hasta 6 imágenes.');
      e.target.value = '';
      return;
    }

    files.forEach(file => {
      if (!file.type.startsWith('image/')) return;

      const img = document.createElement('img');
      img.src = URL.createObjectURL(file);
      img.style.width = '100px';
      img.style.height = '100px';
      img.style.objectFit = 'cover';
      img.style.borderRadius = '8px';
      img.style.boxShadow = '0 0 5px rgba(0,0,0,0.3)';
      preview.appendChild(img);
    });
  });
</script>
<?= view('partials/scriptValidacion')?>
</body>
</html>