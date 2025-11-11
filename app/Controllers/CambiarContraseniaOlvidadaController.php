<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\ContraseniaResetModel;
use CodeIgniter\I18n\Time;

class CambiarContraseniaOlvidadaController extends BaseController
{
    public function __construct(){
        helper(['form','url']);
    }
    public function index($token = null)
    {
        if ($token === null) {
            return redirect()->to(base_url('index.php'))->with('error', 'Token no proporcionado.');
        }

        $resetModel = new ContraseniaResetModel();

        $reset = $resetModel->where('token', $token)->first();

        if (!$reset) {
            return redirect()->to(base_url('index.php'))->with('error', 'Token inválido.');
        }

        $creado = new \CodeIgniter\I18n\Time($reset['creado']);
        $ahora = \CodeIgniter\I18n\Time::now();

        if ($ahora->getTimestamp() - $creado->getTimestamp() > 3600) {
            return redirect()->to(base_url('index.php'))->with('error', 'El enlace ha expirado.');
        }

        return view('cambiar_contrasenia_olvidada', ['email' => $reset['email']]);
    }
    public function actualizarContrasenia()
    {
        $email = $this->request->getPost('email');

        $validation = service('validation');

        $validation->setRules([
            'contraseniaNueva' => 'required|min_length[6]',
            'contraseniaNuevaValidacion' => 'required|matches[contraseniaNueva]',
        ], [
            'contraseniaNueva' => [
                'required' => 'Debes ingresar una nueva contraseña.',
                'min_length' => 'La contraseña debe tener al menos 6 caracteres.'
            ],
            'contraseniaNuevaValidacion' => [
                'required' => 'Debes confirmar la nueva contraseña.',
                'matches' => 'Las contraseñas no coinciden.'
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        
        $password = password_hash($this->request->getPost('contraseniaNueva'), PASSWORD_DEFAULT);

        
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->where('correoUsuario', $email)->first();

        if (!$usuario) {
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }

        $usuarioModel->update($usuario['idUsuario'], ['contraseniaUsuario' => $password]);

        $resetModel = new ContraseniaResetModel();
        $resetModel->where('email', $email)->delete();

        return redirect()->to(base_url('index.php/Index'))->with('success', 'Contraseña actualizada correctamente.');

    }
}
