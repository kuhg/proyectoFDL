<?php

namespace App\Controllers;

class CambiarContraseniaOlvidadaController extends BaseController
{
    public function index(): string
    {
        return view('cambiar_contrasenia_olvidada');
    }
}
