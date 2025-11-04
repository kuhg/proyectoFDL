<?php

namespace App\Controllers;
use App\Models\ImagenModel;
use App\Models\PublicacionModel;
class CrearPublicacionController extends BaseController
{
    public function __construct(){
        helper(['form']);
    }
    public function index(){
        $session = session();
        if($session->has('usuario') && (!$session->get('usuario')['permisos'] == 1 || !$session->get('usuario')['permisos'] == 3)){
            return redirect()->to(base_url('index.php/Error'));
        }
        return view('crear_publicacion');
    }

    public function crearPublicacion(){
        $validation = service('validation');

        $validation->setRules([
            'titulo'=>'required',
            'resumen'=>'required',
            'conclucion'=>'required',
            'objetivos'=>'required',
            'imagenes.0' => 'uploaded[imagenes.0]|is_image[imagenes.0]|max_size[imagenes.0,2048]'
        ],
        [
            'titulo'=>['required'=>'La publicacion necesita un titulo'],
            'resumen'=>['required'=>'La publicacion necesita un resumen'],
            'conclucion'=>['required'=>'La publicacion necesita una conclucion'],
            'objetivos'=>['required'=>'La publicacion necesita objetivos'],
            'imagenes.0' => [
                'uploaded' => 'Debes subir al menos una imagen',
                'is_image' => 'Cada archivo debe ser una imagen válida',
                'max_size' => 'Las imágenes no deben superar los 2MB'
            ]
        ]);

        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }

        // Guardar publicación
        $publicacionModel = new PublicacionModel();
        $publicacionModel->save([
            'tituloPublicacion' => $this->request->getPost('titulo'),
            'resumenPublicacion' => $this->request->getPost('resumen'),
            'conclucionPublicacion' => $this->request->getPost('conclucion'),
            'objetivosPublicacion' => $this->request->getPost('objetivos'),
            'fechaPublicacion' => date('Y-m-d H:i:s'),
            'estadoPublicacion' => 1
        ]);

        $idPublicacion = $publicacionModel->getInsertID();

        // Guardar imágenes
        $imagenes = $this->request->getFileMultiple('imagenes');
        $imagenModel = new ImagenModel();

        foreach($imagenes as $img){
            if($img->isValid() && !$img->hasMoved()){
                $nuevoNombre = $img->getRandomName();
                $img->move(ROOTPATH . 'public/uploads', $nuevoNombre);

                $imagenModel->save([
                    'idPublicacion' => $idPublicacion,
                    'nombreImagen' => $nuevoNombre,
                    'rutaImagen' => 'uploads/' . $nuevoNombre
                ]);
            }
        }
        return redirect()->to(base_url('index.php/Proyectos'));

    }

}
