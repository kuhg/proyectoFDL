<?php

namespace App\Controllers;

use App\Models\ReporteModel;
use App\Models\ReporteRespuestaModel;
use App\Models\ComentarioModel;
use App\Models\RespuestaModel;
use App\Models\UsuarioModel;
class ComentariosReportadosController extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function index()
    {
        $session = session();
        if($session->has('usuario') && (!$session->get('usuario')['permisos'] == 1 || !$session->get('usuario')['permisos'] == 2)){
            return redirect()->to(base_url('index.php/Error'));
        }
        $reporteModel = new ReporteModel();
        $builder = $reporteModel->builder();
        $builder->select('
            reportes.*, 
            usuarios_reportante.idUsuario AS idUsuarioReportante,
            usuarios_reportante.nomUsuario AS nomReportante, 
            usuarios_reportante.apeUsuario AS apeReportante, 
            usuarios_reportante.fotoUsuario AS fotoReportante,
            usuarios_reportado.idUsuario AS idUsuarioReportado,
            usuarios_reportado.nomUsuario AS nomReportado, 
            usuarios_reportado.apeUsuario AS apeReportado, 
            usuarios_reportado.fotoUsuario AS fotoReportado,
            comentarios.textoComentario
        ');

        // unir usuario que realizó el reporte
        $builder->join('usuarios AS usuarios_reportante', 'usuarios_reportante.idUsuario = reportes.idUsuario');

        // unir usuario que fue reportado (autor del comentario)
        $builder->join('comentarios', 'comentarios.idComentario = reportes.idComentario');
        $builder->join('usuarios AS usuarios_reportado', 'usuarios_reportado.idUsuario = comentarios.idUsuario');

        $builder->where('reportes.estadoReporte', 1);

        $reportes = $builder->get()->getResultArray();

        $reporteRespuestaModel = new ReporteRespuestaModel();
        $builder = $reporteRespuestaModel->builder();

        $builder->select('
            reportes_respuestas.*, 
            usuarios_reportante.idUsuario AS idUsuarioReportante,
            usuarios_reportante.nomUsuario AS nomReportante, 
            usuarios_reportante.apeUsuario AS apeReportante, 
            usuarios_reportante.fotoUsuario AS fotoReportante,

            usuarios_reportado.idUsuario AS idUsuarioReportado,
            usuarios_reportado.nomUsuario AS nomReportado, 
            usuarios_reportado.apeUsuario AS apeReportado, 
            usuarios_reportado.fotoUsuario AS fotoReportado,

            respuestas_comentarios.textoRespuesta
        ');

        // unir usuario que hizo el reporte
        $builder->join('usuarios AS usuarios_reportante', 'usuarios_reportante.idUsuario = reportes_respuestas.idUsuario');

        // unir respuesta reportada
        $builder->join('respuestas_comentarios', 'respuestas_comentarios.idRespuesta = reportes_respuestas.idRespuesta');

        // unir usuario que fue reportado (autor de la respuesta)
        $builder->join('usuarios AS usuarios_reportado', 'usuarios_reportado.idUsuario = respuestas_comentarios.idUsuario');

        // traer solo reportes activos
        $builder->where('reportes_respuestas.estadoReporte', 1);

        $reportesRespuestas = $builder->get()->getResultArray();

        // Después de obtener $reportes y $reportesRespuestas:
        foreach ($reportes as &$r) {
            $r['tipo'] = 'comentario';
        }
        foreach ($reportesRespuestas as &$r) {
            $r['tipo'] = 'respuesta';
        }

        // Fusionar ambas listas
        $reportesTotales = array_merge($reportes, $reportesRespuestas);

        $data['reportes'] = $reportesTotales;
        return view('comentarios_reportados', $data);
    }

    public function ignorarReporte(){
        $reporteModel = new ReporteModel();
        $idReporte = $this->request->getPost('idReporte');

        $reporteModel->update($idReporte,['estadoReporte'=>0]);

        return redirect()->to(site_url('ComentariosReportados'));
    }

    public function borrarComentario(){
        $reporteModel = new ReporteModel();
        $comentarioModel = new ComentarioModel();

        $idComentario = $this->request->getPost('idComentario');

        $comentarioModel->update($idComentario,['estadoComentario'=>0]);

        $reporteModel->where('idComentario', $idComentario)
                ->set(['estadoReporte' => 0]) 
                ->update();

        return redirect()->to(site_url('ComentariosReportados'));
    }

    public function ignorarReporteRespuesta(){
        $reporteModel = new ReporteRespuestaModel();
        $idReporte = $this->request->getPost('idReporte');

        $reporteModel->update($idReporte,['estadoReporte'=>0]);

        return redirect()->to(site_url('ComentariosReportados'));
    }

    public function borrarRespuesta(){
        $reporteModel = new ReporteRespuestaModel();
        $respuestaModel = new RespuestaModel();

        $idRespuesta = $this->request->getPost('idRespuesta');

        $respuestaModel->update($idRespuesta,['estadoRespuesta'=>0]);

        $reporteModel->where('idRespuesta', $idRespuesta)
                ->set(['estadoReporte' => 0]) 
                ->update();

        return redirect()->to(site_url('ComentariosReportados'));
    }
}
