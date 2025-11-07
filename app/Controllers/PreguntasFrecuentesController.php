<?php

namespace App\Controllers;

use App\Models\PreguntaFrecuenteModel;

class PreguntasFrecuentesController extends BaseController
{
    public function __construct(){
        helper(['form', 'url']);
    }
    public function index(): string
    {
        $preguntaFrecuenteModel = new PreguntaFrecuenteModel();

        // Obtener solo las preguntas activas
        $preguntasFrecuentes = $preguntaFrecuenteModel
            ->where('estadoFaq', 1)
            ->findAll();

        $data = ['preguntas' => $preguntasFrecuentes];

        return view('preguntas_frecuentes', $data);
    }

    public function agregarPregunta(){
        $preguntaFrecuente = new PreguntaFrecuenteModel();
        $preguntaFrecuente->save([
            'pregunta'=>$this->request->getPost('pregunta'),
            'respuesta'=>$this->request->getPost('respuesta'),
            'estadoFaq'=>1
        ]);
        return redirect()->to(site_url('PreguntasFrecuentes'));
    }

    public function eliminarPregunta(){
        $preguntaFrecuente = new PreguntaFrecuenteModel();
        $id = $this->request->getPost('idPregunta');
        $preguntaFrecuente->update($id,['estadoFaq'=>0]);
        return redirect()->to(site_url('PreguntasFrecuentes'));
    }

    public function editarPregunta(){
        $preguntaFrecuente = new PreguntaFrecuenteModel();
        $id = $this->request->getPost('idFaq');
        $preguntaFrecuente->update($id,[
            'pregunta'=>$this->request->getPost('pregunta'),
            'respuesta'=> $this->request->getPost('respuesta')
        ]);
        return redirect()->to(site_url('PreguntasFrecuentes'));
    }
}
