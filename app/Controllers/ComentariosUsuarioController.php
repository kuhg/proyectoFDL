<?php

namespace App\Controllers;

class ComentariosUsuarioController extends BaseController
{
    public function index(): string
    {
        return view('comentarios_usuario');
    }
}
