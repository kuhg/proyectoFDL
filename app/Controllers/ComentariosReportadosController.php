<?php

namespace App\Controllers;

class ComentariosReportadosController extends BaseController
{
    public function index(): string
    {
        return view('comentarios_reportados');
    }
}
