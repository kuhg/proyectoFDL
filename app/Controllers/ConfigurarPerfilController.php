<?php

namespace App\Controllers;

class ConfigurarPerfilController extends BaseController
{
    public function index(): string
    {
        return view('configurar_perfil');
    }
}
