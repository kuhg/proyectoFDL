<?php

namespace App\Controllers;

class CambiarContraseniaController extends BaseController
{
    public function index(): string
    {
        return view('cambiar_contrasenia');
    }
}
