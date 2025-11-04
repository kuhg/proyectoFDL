<?php

namespace App\Controllers;
class PaginaErrorController extends BaseController
{
    public function index(): string
    {

        return view('pagina_error' );
    }
}
