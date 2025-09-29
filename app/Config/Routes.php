<?php

use App\Controllers\PublicacionController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('Index', 'Home::index');
$routes->get('SobreNosotros', 'SobreNosotrosController::index');
$routes->get('PreguntasFrecuentes', 'PreguntasFrecuentesController::index');
$routes->get('Proyectos', 'ProyectosController::index');
$routes->get('Publicacion', 'PublicacionController::index');
$routes->get('CrearPublicacion','CrearPublicacionController::index');
$routes->get('CrearUsuario','CrearUsuarioController::index');
$routes->get('ListaUsuarios', 'ListaUsuariosController::index');
$routes->get('ComentariosUsuario', 'ComentariosUsuarioController::index');
$routes->get('ComentariosReportados','ComentariosReportadosController::index');
$routes->get('IniciarSesion','IniciarSesionController::index');
$routes->get('RecuperarContrasenia','RecuperarContraseniaController::index');
$routes->get('ConfigurarPerfil','ConfigurarPerfilController::index');
$routes->get('CambiarContrasenia','CambiarContraseniaController::index');
$routes->get('CambiarContraseniaOlvidada','CambiarContraseniaOlvidadaController::index');