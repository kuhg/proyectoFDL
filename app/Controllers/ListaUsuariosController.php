<?php

namespace App\Controllers;

class ListaUsuariosController extends BaseController
{
    public function index(): string
    {
        return view('lista_usuarios');
    }
}
