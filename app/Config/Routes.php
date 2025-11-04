<?php

use App\Controllers\PublicacionController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('Index', 'Home::index');

//sobre nosotros
$routes->get('SobreNosotros', 'SobreNosotrosController::index');
$routes->post('form/editarInformacion','SobreNosotrosController::editarInformacion');

//preguntas frecuentes
$routes->get('PreguntasFrecuentes', 'PreguntasFrecuentesController::index');
$routes->post('form/agregarPregunta','PreguntasFrecuentesController::agregarPregunta');
$routes->post('form/eliminarPregunta','PreguntasFrecuentesController::eliminarPregunta');

//pagina error
$routes->get('PaginaError','PaginaErrorController::index');

//proyectos
$routes->get('Proyectos', 'ProyectosController::index');
$routes->post('form/filtrarProyectos', 'ProyectosController::filtrar');

//ver publicaciones
$routes->get('Publicacion', 'PublicacionController::index');
$routes->get('Publicacion/(:num)', 'PublicacionController::index/$1');
$routes->post('form/comentario', 'PublicacionController::publicarComentario');
$routes->post('form/reporte', 'PublicacionController::reportarComentario');
$routes->post('form/borrarPublicacion', 'PublicacionController::borrarPublicacion');
$routes->post('form/borrarComentarioPublicacion', 'PublicacionController::borrarComentario');
$routes->post('form/respuesta','PublicacionController::responderComentario');
$routes->post('form/reporteRespuesta','PublicacionController::reportarRespuesta');
$routes->post('form/borrarRespuestaPublicacion', 'PublicacionController::borrarRespuesta');

//crear publicacion
$routes->get('CrearPublicacion','CrearPublicacionController::index');
$routes->post('form/crearPublicacion','CrearPublicacionController::crearPublicacion');

//editar publicacion
$routes->get('EditarPublicacion/(:num)', 'EditarPublicacionController::index/$1');
$routes->post('form/editarPublicacion','EditarPublicacionController::editarPublicacion');

//crear usuario
$routes->get('CrearUsuario','CrearUsuarioController::index');
$routes->post('form/crearUsuario', 'CrearUsuarioController::crearUsuario');

//lista usuarios
$routes->get('ListaUsuarios', 'ListaUsuariosController::index');
$routes->post('form/quitarSuspencion', 'ListaUsuariosController::quitarSuspencion');
$routes->post('form/suspenderUsuario', 'ListaUsuariosController::suspenderUsuario');
$routes->post('form/filtrarUsuarios', 'ListaUsuariosController::filtrarUsuarios');

//comentarios del usuario
$routes->get('ComentariosUsuario/(:num)', 'ComentariosUsuarioController::index/$1');
$routes->post('form/quitarSuspencion', 'ComentariosUsuarioController::quitarSuspencion');
$routes->post('form/suspenderUsuario', 'ComentariosUsuarioController::suspenderUsuario');
$routes->post('form/borrarComentario','ComentariosUsuarioController::quitarComentario');

//reportes
$routes->get('ComentariosReportados','ComentariosReportadosController::index');
$routes->post('form/ignorarReporteComentario', 'ComentariosReportadosController::ignorarReporte');
$routes->post('form/borrarComentario', 'ComentariosReportadosController::borrarComentario');
$routes->post('form/ignorarReporteRespuesta', 'ComentariosReportadosController::ignorarReporteRespuesta');
$routes->post('form/borrarRespuesta', 'ComentariosReportadosController::borrarRespuesta');
//iniciar sesion
$routes->get('IniciarSesion','IniciarSesionController::index');
$routes->post('form/iniciarSesion','IniciarSesionController::inicioSesion');

//recuperar contrasenia
$routes->get('RecuperarContrasenia','RecuperarContraseniaController::index');
$routes->post('form/recuperarContrasenia','RecuperarContraseniaController::enviarCorreo');

//contrasenia recuperada
$routes->get('CambiarContraseniaOlvidada/(:any)','CambiarContraseniaOlvidadaController::index/$1');
$routes->post('form/recuperarContraseniaOlvidada','CambiarContraseniaOlvidadaController::actualizarContrasenia');

//configurar perfil
$routes->get('ConfigurarPerfil','ConfigurarPerfilController::index');
$routes->post('form/actualizarFoto','ConfigurarPerfilController::cambiarFoto');

//cambiar contraseña
$routes->get('CambiarContrasenia','CambiarContraseniaController::index');
$routes->post('form/cambiarContrasenia','CambiarContraseniaController::cambiarContrasenia');

//cerrar sesion
$routes->get('CerrarSesion', "CerrarSesionController::logout");


