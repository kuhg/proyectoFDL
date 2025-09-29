<?php

namespace App\Controllers;

class SobreNosotrosController extends BaseController
{
    public function index(): string
    {
        return view('sobre_nosotros');
    }
}
