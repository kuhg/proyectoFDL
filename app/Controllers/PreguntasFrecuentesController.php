<?php

namespace App\Controllers;

class PreguntasFrecuentesController extends BaseController
{
    public function index(): string
    {
        return view('preguntas_frecuentes');
    }
}
