<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class ListaUsuariosController extends BaseController
{
    public function __construct(){
        helper(['form','url']);
    }

    public function index()
    {
        $session = session();
        if($session->has('usuario') && (!$session->get('usuario')['permisos'] == 1 || !$session->get('usuario')['permisos'] == 2)){
            return redirect()->to(base_url('index.php/Error'));
        }
        
        $usuarioModel = new UsuarioModel();

        $usuarios = $usuarioModel
            ->select('usuarios.*, COUNT(comentarios.idComentario) as comentarios_count')
            ->join('comentarios', 'comentarios.idUsuario = usuarios.idUsuario', 'left')
            ->groupBy('usuarios.idUsuario')
            ->orderBy('usuarios.nomUsuario', 'ASC')
            ->paginate(10); 

        $pager = $usuarioModel->pager;

        $data = [
            'usuarios' => $usuarios,
            'pager'    => $pager
        ];

        return view('lista_usuarios', $data);
    }

    public function filtrarUsuarios():string
    {
        $usuarioModel = new UsuarioModel();

        $nombre     = $this->request->getPost('nombre');
        $documento  = $this->request->getPost('documento');
        $estado     = $this->request->getPost('estado');
        $fechaDesde = $this->request->getPost('desde');
        $fechaHasta = $this->request->getPost('hasta');

        $usuarioModel = new UsuarioModel();

        if (!empty($nombre)) {
            $usuarioModel->like('nomUsuario', $nombre);
        }

        if (!empty($documento)) {
            $usuarioModel->like('docUsuario', $documento);
        }

        if ($estado !== '') {
            $usuarioModel->where('estadoUsuario', $estado);
        }

        if (!empty($fechaDesde)) {
            $usuarioModel->where('creacion >=', $fechaDesde);
        }

        if (!empty($fechaHasta)) {
            $usuarioModel->where('creacion <=', $fechaHasta);
        }

        $usuarioModel->select('usuarios.*, COUNT(comentarios.idComentario) as comentarios_count');
        $usuarioModel->join('comentarios', 'comentarios.idUsuario = usuarios.idUsuario', 'left');
        $usuarioModel->groupBy('usuarios.idUsuario');

        $usuarios = $usuarioModel->orderBy('nomUsuario', 'ASC')->paginate(10);
        $pager    = $usuarioModel->pager;

        $data = [
            'usuarios'   => $usuarios,
            'pager'      => $pager,
            'fechaDesde' => $fechaDesde,
            'fechaHasta' => $fechaHasta
        ];

        return view('lista_usuarios', $data);
    }



    public function suspenderUsuario(){
        $usuarioModel = new UsuarioModel();
        $idUsuario = $this->request->getPost('idUsuario');
        $usuarioModel->update($idUsuario,['estadoUsuario'=>0]);
        return redirect()->to(site_url('ListaUsuarios'));
    }

    public function quitarSuspencion(){
        $usuarioModel = new UsuarioModel();
        $idUsuario = $this->request->getPost('idUsuario');
        $usuarioModel->update($idUsuario,['estadoUsuario'=>1]);
        return redirect()->to(site_url('ListaUsuarios'));
    }

}
