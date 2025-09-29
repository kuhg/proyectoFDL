<?php

namespace App\Controllers;

class ProyectosController extends BaseController
{
    public function index(): string
    {
        return view('proyectos');
    }
}
