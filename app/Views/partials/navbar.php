<header>
  <?php $session = session(); ?>
  <nav class="navbar navbar-expand-lg py-4 amarillo">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="<?= base_url('index.php/Index') ?>">
        <img src="<?= base_url('public/img/logo1.png') ?>" 
             alt="Logo del Jardín"
             class="rounded-circle me-2"
             style="height:60px; width:60px; object-fit:cover;">
        <span class="fw-bold ms-1">Jardín Francisca Dalinda López</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarNav" aria-controls="navbarNav"
              aria-expanded="false" aria-label="Menú de navegación">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="<?= base_url('index.php/Index') ?>">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('index.php/Proyectos') ?>">Proyectos</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('index.php/PreguntasFrecuentes') ?>">Preguntas Frecuentes</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('index.php/SobreNosotros') ?>">Sobre Nosotros</a></li>
          <?php if ($session->has('usuario')): ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="configuracionMenu"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Configuracion
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="configuracionMenu">
                <li><a class="dropdown-item" href="<?= base_url('index.php/ConfigurarPerfil') ?>">Configuracion Usuario</a></li>
                <li><a class="dropdown-item" href="<?= base_url('index.php/CerrarSesion') ?>">Cerrar Sesion</a></li>
              </ul>
            </li>
          <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('index.php/IniciarSesion') ?>">Iniciar Sesion</a></li>
          <?php endif; ?>
          <?php if ($session->has('usuario') && $session->get('usuario')['permisos'] != 0): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="moderacionMenu"
               role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Moderación
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="moderacionMenu">
              <li><a class="dropdown-item" href="<?= base_url('index.php/ListaUsuarios') ?>">Buscar usuario</a></li>
              <?php if($session->has('usuario') && ($session->get('usuario')['permisos'] == 1 || $session->get('usuario')['permisos'] == 2)): ?>
                <li><a class="dropdown-item" href="<?= base_url('index.php/ComentariosReportados') ?>">Ver Reportes</a></li>
                <li><a class="dropdown-item" href="<?= base_url('index.php/CrearUsuario') ?>">Crear Usuario</a></li>
              <?php endif; ?>

              <?php if($session->has('usuario') && ($session->get('usuario')['permisos'] == 1 || $session->get('usuario')['permisos'] == 3)): ?>
                <li><a class="dropdown-item" href="<?= base_url('index.php/CrearPublicacion') ?>">Crear Publicacion</a></li>
              <?php endif; ?>
            </ul>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
</header>
