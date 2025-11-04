<?php

namespace App\Controllers;

class CerrarSesionController extends BaseController
{
    public function logout(){
        $session = session();
        $session->destroy();

        return redirect()->to(base_url('index.php/Index'));

    }
}
