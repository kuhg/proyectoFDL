<?php

namespace App\Controllers;

class RecuperarContraseniaController extends BaseController
{
    public function index(): string
    {
        return view('recuperar_contrasenia');
    }
}
