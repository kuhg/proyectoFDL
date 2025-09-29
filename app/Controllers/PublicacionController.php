<?php

namespace App\Controllers;

class PublicacionController extends BaseController
{
    public function index(): string
    {
        return view('publicacion');
    }
}
