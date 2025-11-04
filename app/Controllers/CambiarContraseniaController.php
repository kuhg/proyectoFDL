<?php

namespace App\Controllers;
use App\Models\UsuarioModel;

class CambiarContraseniaController extends BaseController
{
    public function __construct(){
        helper(['form','url']);
    }
    public function index(): string
    {
        return view('cambiar_contrasenia');
    }

    public function cambiarContrasenia(){
        $validation = service('validation');

        $validation->setRules([
            'contraseniaAntigua'=>'required|min_length[6]',
            'contraseniaNueva' => 'required|min_length[6]',
            'contraseniaNuevaValidacion' => 'required|matches[contraseniaNueva]',
        ], [
            'contraseniaAntigua'=>[
                'required' => 'Debes ingresar una nueva contraseña.',
                'min_length' => 'La contraseña debe tener al menos 6 caracteres.'
            ],
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

        $session = session();
        $idUsuario = $session->get('usuario')['id'];

        if (!$idUsuario) {
            return redirect()->to(base_url('index.php/IniciarSesion'))
                ->with('error', 'Debes iniciar sesión para cambiar tu contraseña.');
        }

        $contraseniaAntigua = $this->request->getPost('contraseniaAntigua');
        $contraseniaNueva   = $this->request->getPost('contraseniaNueva');

        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->find($idUsuario);

        if (!$usuario) {
            return redirect()->back()
                ->with('error', 'Usuario no encontrado.');
        }

        if (!password_verify($contraseniaAntigua, $usuario['contraseniaUsuario'])) {
            return redirect()->back()
                ->withInput()
                ->with('errors', ['contraseniaAntigua' => 'La contraseña actual es incorrecta.']);
        }

        $nuevaHash = password_hash($contraseniaNueva, PASSWORD_DEFAULT);

        $usuarioModel->update($idUsuario, [
            'contraseniaUsuario' => $nuevaHash
        ]);

        return redirect()->to(base_url('index.php/Index'));
    
    }
}
