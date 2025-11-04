<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class ConfigurarPerfilController extends BaseController
{
    public function __construct()
    {
        helper(['form']);
    }

    public function index(): string
    {
        return view('configurar_perfil');
    }

    public function cambiarFoto()
    {
        $validation = service('validation');

        $validation->setRules([
            'imagen' => [
                'rules' => 'uploaded[imagen]|is_image[imagen]|max_size[imagen,2048]',
                'errors' => [
                    'uploaded' => 'Debes subir una imagen',
                    'is_image' => 'El archivo debe ser una imagen válida',
                    'max_size' => 'La imagen no debe superar los 2MB'
                ]
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $validation->getErrors());
        }

        $file = $this->request->getFile('imagen');
        $session = session();
        $usuario = $session->get('usuario');
        $idUsuario = $usuario['id'];

        $usuarioModel = new UsuarioModel();

        if ($file->isValid() && !$file->hasMoved()) {
            $nuevoNombre = $file->getRandomName();

            $rutaDestino = ROOTPATH . 'public/fotosPerfil/';

            if (!is_dir($rutaDestino)) {
                mkdir($rutaDestino, 0777, true);
            }

            $file->move($rutaDestino, $nuevoNombre);

            $rutaRelativa = 'fotosPerfil/' . $nuevoNombre;

            $usuarioModel->update($idUsuario, [
                'fotoUsuario' => $rutaRelativa
            ]);

            $usuario['fotoUsuario'] = $rutaRelativa;
            $session->set('usuario', $usuario);

            return redirect()->back()->with('success', 'Foto actualizada correctamente.');
        }

        return redirect()->back()->with('error', 'No se pudo subir la imagen.');
    }
}
