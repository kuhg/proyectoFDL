<?php

namespace App\Controllers;

class CrearPublicacionController extends BaseController
{
    public function index(): string
    {
        return view('crear_publicacion');
    }
}
