<?php

namespace App\Controllers;

class IniciarSesionController extends BaseController
{
    public function index(): string
    {
        return view('iniciar_sesion');
    }
}
