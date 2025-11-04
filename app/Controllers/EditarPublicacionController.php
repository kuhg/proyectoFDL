<?php

namespace App\Controllers;
use App\Models\ImagenModel;
use App\Models\PublicacionModel;

class EditarPublicacionController extends BaseController
{
    public function __construct(){
        helper(['form']);
    }
    public function index($id)
    {
        $session = session();
        if($session->has('usuario') && (!$session->get('usuario')['permisos'] == 1 || !$session->get('usuario')['permisos'] == 3)){
            return redirect()->to(base_url('index.php/Error'));
        }
        $publicacionModel = new PublicacionModel();
        $publicacion = $publicacionModel
        ->find( $id);

        $data = [
            'publicacion' => $publicacion 
        ];

        return view('editar_publicacion', $data);
    }

    public function editarPublicacion(){
        $validation = service('validation');

        $validation->setRules([
            'titulo'=>'required',
            'resumen'=>'required',
            'conclucion'=>'required',
            'objetivos'=>'required'
        ],
        [
            'titulo'=>['required'=>'La publicacion necesita un titulo'],
            'resumen'=>['required'=>'La publicacion necesita un resumen'],
            'conclucion'=>['required'=>'La publicacion necesita una conclucion'],
            'objetivos'=>['required'=>'La publicacion necesita objetivos']
        ]);

        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }

        $publicacionModel = new PublicacionModel();
        $id =  $this->request->getPost('idPublicacion');
        $publicacionModel->update($id,[
            'tituloPublicacion' => $this->request->getPost('titulo'),
            'resumenPublicacion' => $this->request->getPost('resumen'),
            'conclucionPublicacion' => $this->request->getPost('conclucion'),
            'objetivosPublicacion' => $this->request->getPost('objetivos'),
        ]);

        return redirect()->to(base_url("index.php/Publicacion/".$id));
    }
}
