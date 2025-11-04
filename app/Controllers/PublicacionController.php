<?php

namespace App\Controllers;

use App\Models\ComentarioModel;
use App\Models\ImagenModel;
use App\Models\PublicacionModel;
use App\Models\ReporteModel;
use App\Models\RespuestaModel;
use App\Models\ReporteRespuestaModel;
class PublicacionController extends BaseController
{
    public function __construct(){
        helper(['form','url']);
    }
    public function index($id)
    {
        $publicacionModel = new PublicacionModel();
        $imagenModel = new ImagenModel();
        $comentarioModel = new ComentarioModel();

        $publicacion = $publicacionModel->find($id);

        if (!$publicacion) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Publicación no encontrada");
        }

        $imagenes = $imagenModel->where('idPublicacion', $id)->findAll();

        $comentarioModel = new ComentarioModel();
        $comentarios = $comentarioModel
            ->select('comentarios.*, usuarios.nomUsuario, usuarios.apeUsuario, usuarios.fotoUsuario')
            ->join('usuarios', 'usuarios.idUsuario = comentarios.idUsuario')
            ->where('comentarios.idPublicacion', $id)
            ->where('comentarios.estadoComentario', 1)
            ->orderBy('comentarios.fechaComentario', 'DESC')
            ->paginate(5, 'comentarios');

        $pager = $comentarioModel->pager;

        $respuestaModel = new RespuestaModel();
        foreach ($comentarios as &$comentario) {
        $comentario['respuestas'] = $respuestaModel
            ->select('respuestas_comentarios.*, usuarios.nomUsuario, usuarios.apeUsuario, usuarios.fotoUsuario')
            ->join('usuarios', 'usuarios.idUsuario = respuestas_comentarios.idUsuario')
            ->where('respuestas_comentarios.idComentario', $comentario['idComentario'])
            ->where('respuestas_comentarios.estadoRespuesta', 1)
            ->orderBy('respuestas_comentarios.idRespuesta', 'ASC')
            ->findAll();
    }

        $data = [
            'publicacion' => $publicacion,
            'imagenes'    => $imagenes,
            'comentarios' => $comentarios,
            'pager' => $pager
        ];

        return view('publicacion', $data);
    }

    public function publicarComentario(){
        $session = session();
        $idUsuario = $session->get('usuario')['id'];
        $comentarioModel = new ComentarioModel();
        $fecha = date('Y-m-d');

        $comentarioModel->save([
            'idPublicacion'=>$this->request->getPost('idPublicacion'),
            'idUsuario'=> $idUsuario,
            'textoComentario'=>$this->request->getPost('comentario'),
            'fechaComentario'=>$fecha,
            'estadoComentario'=>1
        ]);

        if ($this->request->getPost('idPublicacion')) {
            return redirect()->to(base_url("index.php/Publicacion/".$this->request->getPost('idPublicacion')));
        }
    }

    public function responderComentario(){
        $session = session();
        $idUsuario = $session->get('usuario')['id'];
        $respuestaModel = new RespuestaModel();
        $fecha = date('Y-m-d');

        $respuestaModel->save([
            'idComentario'=>$this->request->getPost('idComentarioRespuesta'),
            'idUsuario'=> $idUsuario,
            'textoRespuesta'=>$this->request->getPost('respuesta'),
            'fechaRespuesta'=>$fecha,
            'estadoRespuesta'=>1
        ]);

        if ($this->request->getPost('idPublicacion')) {
            return redirect()->to(base_url("index.php/Publicacion/".$this->request->getPost('idPublicacion')));
        }
    }

    public function reportarComentario(){
        $session = session();
        $idUsuario = $session->get('usuario')['id'];
        $reporteModel=new ReporteModel();
        $reporteModel->save([
            'idComentario'=>$this->request->getPost('idComentario'),
            'idUsuario'=>$idUsuario,
            'comentarioReporte'=>$this->request->getPost('detalles'),
            'motivoReporte'=>$this->request->getPost('razon'),
            'estadoReporte'=>1
        ]);
        if ($this->request->getPost('idPublicacion')) {
            return redirect()->to(base_url("index.php/Publicacion/".$this->request->getPost('idPublicacion')));
        }
    }

    public function reportarRespuesta(){
        $session = session();
        $idUsuario = $session->get('usuario')['id'];
        $reporteRespuestaModel=new ReporteRespuestaModel();
        $reporteRespuestaModel->save([
            'idRespuesta'=>$this->request->getPost('idRespuesta'),
            'idUsuario'=>$idUsuario,
            'comentarioReporte'=>$this->request->getPost('detalles'),
            'motivoReporte'=>$this->request->getPost('razon'),
            'estadoReporte'=>1
        ]);
        if ($this->request->getPost('idPublicacion')) {
            return redirect()->to(base_url("index.php/Publicacion/".$this->request->getPost('idPublicacion')));
        }
    }

    public function borrarComentario(){
        $reporteModel = new ReporteModel();
        $comentarioModel = new ComentarioModel();

        $idComentario = $this->request->getPost('idComentario');

        $comentarioModel->update($idComentario,['estadoComentario'=>0]);

        $reporteModel->where('idComentario', $idComentario)
                ->set(['estadoReporte' => 0]) 
                ->update();

        return redirect()->to(base_url("index.php/Publicacion/".$this->request->getPost('idPublicacion')));
    }

    public function borrarRespuesta(){
        $reporteModel = new ReporteRespuestaModel();
        $respuestaModel = new RespuestaModel();

        $idRespuesta = $this->request->getPost('idRespuesta');

        $respuestaModel->update($idRespuesta,['estadoRespuesta'=>0]);

        $reporteModel->where('idRespuesta', $idRespuesta)
                ->set(['estadoReporte' => 0]) 
                ->update();

        return redirect()->to(base_url("index.php/Publicacion/".$this->request->getPost('idPublicacion')));
    }

    public function borrarPublicacion(){
        $publicacionModel = new PublicacionModel();
        $idPublicacion = $this->request->getPost('idPublicacion');

        $publicacionModel->update($idPublicacion, ['estadoPublicacion' => 0]);
         return redirect()->to(base_url('index.php/Proyectos'));
    }
}