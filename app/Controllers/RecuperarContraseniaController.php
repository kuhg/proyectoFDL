<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\I18n\Time;
use Config\Services;

class RecuperarContraseniaController extends BaseController
{
    public function __construct(){
        helper(['form']);
    }
    public function index(): string
    {
        return view('recuperar_contrasenia');
    }

    public function enviarCorreo(){
        $email=$this->request->getPost('email');
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->where('correoUsuario',$email)->first();
        if(!$usuario){
            return redirect()->back()->with('error','No existe una cuenta con ese correo');
        }
        //generamos token

        $token = bin2hex(random_bytes(32));
        $db = \Config\Database::connect();
        $builder = $db->table('contrasenia_reset');
        $builder->insert([
            'email'=>$email,
            'token'=>$token,
            'creado'=>Time::now()
        ]);

        $emailService = Services::email();
        $emailService->setFrom('liasvilla@gmail.com','Soporte Jardín');
        $emailService->setTo($email);
        $emailService->setSubject('Recuperación de contraseña');
        $link = base_url('index.php/CambiarContraseniaOlvidada/' . $token);
        $emailService->setMessage("
            Hola, para recuperar tu contraseña hacé clic en el siguiente enlace:
            <a href='{$link}'>Recuperar contraseña</a>
            Este enlace expira en 1 hora.
        ");

        if ($emailService->send()) {
            return redirect()->back()->with('error', 'Te enviamos un correo con el enlace de recuperación.');
        } else {
            return redirect()->back()->with('error', 'Error al enviar el correo.');
        }

    }

}
