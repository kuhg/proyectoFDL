<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagina de inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/estilos.css">
</head>
  <body class="fondo-dibujo">
    <?= view('partials/navbar')?>
    <div class="div-con-padding d-flex justify-content-center align-items-center flex-column w-50 mx-auto text-center my-5">
        <h5>Jardin de infantes</h5>
        <h1 class="fw-bold">Francisca Dalinda López</h1>
    </div>
    <div id="carouselExampleCaptions" class=" div-con-padding carousel slide w-75 mx-auto rounded-2">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner rounded-4">
        <div class="carousel-item active">
        <img src="../public/img/imagenJardin5.jpg" class="d-block w-100 h-50 object-fit-cover" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5></h5>
        </div>
        </div>
        <div class="carousel-item">
        <img src="../public/img/imagenJardin2.jpg" class="d-block w-100 h-50 object-fit-cover" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5></h5>
        </div>
        </div>
        <div class="carousel-item">
        <img src="../public/img/imagenJardin1.jpg" class="d-block w-100 h-50 object-fit-cover" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5></h5>
        </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
    
    <div class="blanco-transparente div-con-padding d-flex justify-content-center align-items-center flex-column w-50 mx-auto text-center">
        <strong><h2>Nuestro objetivo</h2></strong><br>
        <p class="lead">Cení Francisca Dalinda López es una institución educativa ubicado en la calle d. f. Sarmiento s/n de la localidad de Ambul, en el dpto. San Alberto.La institución está inserta en un contexto social semi rural.</p>
        <p class="lead">Objetivos de nuestra misión educadora:</p>
        <p class="lead">•	Promover que nuestra institución educativa fortalezca su capacidad de resignificación y progreso, buscando la mejora continua desde una perspectiva situada en el marco de la política provincial.</p>
        <p class="lead">•	Contribuir al desarrollo integral de la persona, al entender las capacidades como potencialidades inherentes a los sujetos que les permiten enfrentar la realidad en condiciones más favorables.</p>
        <p class="lead">•	Asegurar el derecho al aprendizaje de los estudiantes bajo los principios de calidad, equidad e inclusión.</p>
        <p class="lead">•	Fomentar una gestión escolar aglutinadora y transversal que promueva un liderazgo pedagógico compartido entre docentes y directivos, orientado a la transformación y la acción innovadora.</p>
    </div>

    <div class="blanco-transparente div-con-padding container my-5">
    <div class="row text-center">
        
        <div class="col">
        <a href="<?= base_url('index.php/SobreNosotros') ?>" class="text-decoration-none">
            <div class="icon-circle bg-primary text-white mx-auto mb-2">
            <i class="bi bi-person-badge fs-2"></i>
            </div>
            <p>Sobre Nosotros</p>
        </a>
        <p>Informacion sobre quienes somos y cual es nuestro objetivo.</p>
        </div>
        
        <div class="col">
        <a href="<?= base_url('index.php/PreguntasFrecuentes') ?>" class="text-decoration-none">
            <div class="icon-circle bg-success text-white mx-auto mb-2">
            <i class="bi bi-question-circle fs-2"></i>
            </div>
            <p>Preguntas Frecuentes</p>
        </a>
        <p>Respuestas a preguntas realizadas de forma frecuente a la institucion.</p>
        </div>
        
        <div class="col">
        <a href="<?= base_url('index.php/Proyectos') ?>" class="text-decoration-none">
            <div class="icon-circle bg-warning text-dark mx-auto mb-2">
            <i class="bi bi-briefcase fs-2"></i>
            </div>
            <p>Proyectos</p>
        </a>
        <p>Una galeria mostrando nuestos trabajos realizados e informacion pertinente.</p>
        </div>
        
        </div>
    </div>

    <div>
        <div class="div-con-padding  container my-5">
            <h2 class="text-center mb-4">Últimos Proyectos</h2>
            <br><br>

            <div class="row justify-content-center g-4">
                <?php if (!empty($publicaciones)): ?>
                    <?php foreach ($publicaciones as $publicacion): ?>
                        <div class="col-md-3 d-flex">
                            <div class="card w-100 h-100">
                                <?php if (!empty($imagenes[$publicacion['idPublicacion']]['rutaImagen'])): ?>
                                    <img src="<?= base_url( 'public/'.esc($imagenes[$publicacion['idPublicacion']]['rutaImagen'])) ?>" 
                                        class="card-img-top imagen-ajustada object-fit-cover" 
                                        alt="<?= esc($publicacion['tituloPublicacion']) ?>">
                                <?php else: ?>
                                    <img src="<?= base_url('public/img/sample.jpeg')?>" 
                                        class="card-img-top object-fit-cover" 
                                        alt="Sin imagen">
                                <?php endif; ?>

                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"><?= esc($publicacion['tituloPublicacion']) ?></h5>
                                    <p class="card-text text-truncate"><?= esc($publicacion['fechaPublicacion']) ?></p>

                                    <div class="mt-auto">
                                        <a href="<?= base_url('index.php/Publicacion/' . $publicacion['idPublicacion']) ?>" 
                                        class="boton-amarillo w-100">
                                        Leer más
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center">No hay proyectos disponibles por el momento.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Botón Ver más -->
    <div class="div-con-padding justify-content-center mt-5 align-items-center flex-column d-flex">
        <a href="<?= base_url('index.php/Proyectos') ?>" class="btn boton-gris px-5 py-2">
            Ver más proyectos
        </a>
    </div>
    <button type="button" class="btn-flotante" data-bs-toggle="modal" data-bs-target="#contactoModal">
    +
    </button>
    <!--Modal contacto-->
    <div class="modal fade" id="contactoModal" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="miModalLabel">Título del Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body"> 
                <div class=" d-flex justify-content-center align-items-center flex-column w-50 mx-auto text-center">
                    <h5>Contactos</h5>
                    <p>Correo: franciscadalindal@gmail.com</p>
                    <p>Direccion: calle d. f. Sarmiento s/n de la localidad de Ambul</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>


    <footer class="amarillo">
    <div class="d-flex justify-content-center align-items-center flex-column w-50 mx-auto text-center">
        <p>Copyright © 2025 Jardin de infantes Francisca Dalinda López</p>
    </div>
    </footer>
    <?= view('partials/scriptScroll')?>
    <?= view('partials/fadein')?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>