<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class IniciarSesionController extends BaseController
{
    public function __construct(){
        helper(['form','url']);
    }
    public function index(): string
    {
        return view('iniciar_sesion');
    }

    public function inicioSesion(){
        $validation = service('validation');
        $validation->reset();
        $validation->setRules([
            'documento'=>'required|min_length[8]|max_length[11]',
            'contrasenia'=>'required'],
            ['documento'=>[
                'required'=>'El documento es obligatorio',
                'min_length'=>'La longitud minima es de 8 numeros',
                'max_length'=>'La longitud maxima es de 11 numeros'
            ],
            'contraseniaUsuario'=>[
                'required'=>'La contraseña es obligatoria',
                'min_length'=>'La longitud de la contraseña debe ser de 6 caracteres minimo',
            ],
            ]
        );

        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }

        $documento = $this->request->getPost('documento');
        $contrasenia = $this->request->getPost('contrasenia');

        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->where('docUsuario',$documento)->first();

        if(!$usuario){
            return redirect()->back()->with('errors',['documento'=>'El usuario no existe']);
        }

        if(!password_verify($contrasenia,$usuario['contraseniaUsuario'])){
            return redirect()->back()->with('errors',['contrasenia'=>'La contraseña es incorrecta']);
        }

        if($usuario['estadoUsuario']!=1){
            return redirect()->back()->with('errors',['usuario'=>'El usuario no tiene una cuenta activa o no existe']);
        }

        session()->set('usuario',[
            'id'=>$usuario['idUsuario'],
            'nombre'=>$usuario['nomUsuario'],
            'apellido'=>$usuario['apeUsuario'],
            'permisos'=>$usuario['permisosUsuario']
        ]);
        
        return redirect()->to(base_url('index.php/Index'));
    }

}
