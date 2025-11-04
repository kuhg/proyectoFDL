<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\ReporteModel;
use App\Models\ComentarioModel;
class ComentariosUsuarioController extends BaseController
{
    public function __construct(){
        helper(['form', 'url']);
    }
    public function index($id)
    {
        $session = session();
        if($session->has('usuario') && (!$session->get('usuario')['permisos'] == 1 || !$session->get('usuario')['permisos'] == 2)){
            return redirect()->to(base_url('index.php/Error'));
        }
        $usuarioModel = new UsuarioModel();

        // Obtener información del usuario
        $usuario = $usuarioModel->find($id);

        if (!$usuario) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Usuario no encontrado');
        }

        // Obtener los comentarios del usuario
        $builder = $usuarioModel->builder();
        $builder->select('comentarios.idComentario, comentarios.textoComentario, comentarios.fechaComentario, comentarios.estadoComentario');
        $builder->join('comentarios', 'comentarios.idUsuario = usuarios.idUsuario');
        $builder->where('usuarios.idUsuario', $id);
        $comentarios = $builder->get()->getResultArray();

        $data = [
            'usuario' => $usuario,
            'comentarios' => $comentarios
        ];

        return view('comentarios_usuario', $data);
    }

    public function suspenderUsuario(){
        $usuarioModel = new UsuarioModel();
        $idUsuario = $this->request->getPost('idUsuario');
        $usuarioModel->update($idUsuario,['estadoUsuario'=>0]);
        return redirect()->to(site_url('ComentariosUsuario/' . $idUsuario));
    }

    public function quitarSuspencion(){
        $usuarioModel = new UsuarioModel();
        $idUsuario = $this->request->getPost('idUsuario');
        $usuarioModel->update($idUsuario,['estadoUsuario'=>1]);
        return redirect()->to(site_url('ComentariosUsuario/' . $idUsuario));
    }

    public function quitarComentario(){
        $reporteModel = new ReporteModel();
        $comentarioModel = new ComentarioModel();
        $idUsuario = $this->request->getPost('idUsuario');
        $idComentario = $this->request->getPost('idComentario');

        $comentarioModel->update($idComentario,['estadoComentario'=>0]);

        $reporteModel->where('idComentario', $idComentario)
                ->set(['estadoReporte' => 0]) 
                ->update();

        return redirect()->to(site_url('ComentariosUsuario/' . $idUsuario));

    }
}
