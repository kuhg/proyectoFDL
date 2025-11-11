<?php

namespace App\Controllers;
use App\Models\UsuarioModel;

class CrearUsuarioController extends BaseController
{
    public function __construct(){
        helper(['form']);
    }
    public function index()
    {
        //$session = session();
        //if($session->has('usuario') && (!$session->get('usuario')['permisos'] == 1)){
            //return redirect()->to(base_url('index.php/Error'));
        //}
        return view('crear_usuario');
    }

    public function crearUsuario(){
        $validation = service('validation');
        $validation->setRules([
            'nombreUsuario'=>'required|min_length[3]',
            'apellidoUsuario'=>'required|min_length[3]',
            'correoUsuario'=>'required',
            'documentoUsuario'=>'required|min_length[8]|max_length[11]',
            'contraseniaUsuario'=>'required|min_length[6]',
            'contraseniaVerificacionUsuario'=>'required|min_length[6]',
            'contactoUsuario'=>'required|min_length[10]|max_length[11]',
            'contactoUrgenciaUsuario'=>'required|min_length[10]|max_length[11]',
            'direccionUsuario'=>'required'
        ],
        [
            'nombreUsuario'=>[
                'required'=>'El nombre es obligatorio',
                'min_length'=>'La longitud minima del nombre es de 3 caracteres'
            ],
            'apellidoUsuario'=>[
                'requiered'=>'El apellido es obligatorio',
                'min_length'=>'La longitud minima del apellido es de 3 caracteres'
            ],
            'correoUsuario'=>[
                'required'=>'El correo es obligatorio'
            ],
            'documentoUsuario'=>[
                'required'=>'El documento es obligatorio',
                'min_length'=>'La longitud minima es de 8 numeros',
                'max_length'=>'La longitud maxima es de 11 numeros'
            ],
            'contraseniaUsuario'=>[
                'required'=>'La contraseña es obligatoria',
                'min_length'=>'La longitud de la contraseña debe ser de 6 caracteres minimo',
            ],
             'contraseniaVerificacionUsuario'=>[
                'required'=>'La contraseña es obligatoria',
                'min_length'=>'La longitud de la contraseña debe ser de 6 caracteres minimo',
             ],
            'contactoUsuario'=>[
                'required'=>'El contacto es obligatorio',
                'min_length'=>'La longitud minima es de 10 numeros',
                'max_length'=>'La longitud maxima es de 11 numeros'
            ],
            'contactoUrgenciaUsuario'=>[
                'required'=>'El contacto es obligatorio',
                'min_length'=>'La longitud minima es de 10 numeros',
                'max_length'=>'La longitud maxima es de 11 numeros'
            ],
            'direccionUsuario'=>[
                'required'=>'La direccion es obligatoria',
            ]
        ]);

        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }

        $usuarioModel = new UsuarioModel();

        $correo = $this->request->getPost('correoUsuario');
        $documento = $this->request->getPost('documentoUsuario');

        $correoExiste = $usuarioModel->where('correoUsuario', $correo)->first();
        $documentoExiste = $usuarioModel->where('docUsuario', $documento)->first();

        if ($correoExiste) {
            return redirect()->back()->withInput()->with('error', 'El correo ya está registrado.');
        }

        if ($documentoExiste) {
            return redirect()->back()->withInput()->with('error', 'El documento ya está registrado.');
        }
        
        $usuarioModel->save([
            'nomUsuario'=>$this->request->getPost('nombreUsuario'),
            'apeUsuario'=>$this->request->getPost('apellidoUsuario'),
            'correoUsuario'=>$this->request->getPost('correoUsuario'),
            'docUsuario'=>$this->request->getPost('documentoUsuario'),
            'fotoUsuario'=>'img/icono-anonimo.webp',
            'contraseniaUsuario'=>password_hash($this->request->getPost('contraseniaUsuario'), PASSWORD_DEFAULT),
            'permisosUsuario'=>$this->request->getPost('permiso'),
            'estadoUsuario'=>'1',
            'creacion' => date('Y-m-d'),
            'direccionUsuario'=>$this->request->getPost('direccionUsuario'),
            'contactoUsuario'=>$this->request->getPost('contactoUsuario'),
            'contactoUrgenciaUsuario'=>$this->request->getPost('contactoUrgenciaUsuario'),
        ]);
        
        return redirect()->to(base_url('index.php/Index'));

    }
}
