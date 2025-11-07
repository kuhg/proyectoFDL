<?php

namespace App\Controllers;

class SobreNosotrosController extends BaseController
{
    public function __construct(){
        helper(['form','url']);
    }
    public function index(): string
    {
        $ruta = WRITEPATH . 'data/informacion.json';
        $contenido = [];

        if (file_exists($ruta)) {
            $json = file_get_contents($ruta);
            $contenido = json_decode($json, true);
        }

        return view('sobre_nosotros', ['info' => $contenido]);
    }

    public function editarInformacion(){
        $titulo = $this->request->getPost('titulo');
        $contenido = $this->request->getPost('contenido');
        
        $data = [
            'titulo' => $titulo,
            'contenido' => $contenido
        ];

        $ruta = WRITEPATH . 'data/informacion.json';
        file_put_contents($ruta, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        return redirect()->to(site_url('SobreNosotros'));
    }
}
