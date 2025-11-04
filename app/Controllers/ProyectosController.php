<?php

namespace App\Controllers;
use App\Models\ImagenModel;
use App\Models\PublicacionModel;

class ProyectosController extends BaseController
{
    public function __construct(){
        helper(['form','url']);
    }
public function index(): string
{
    $publicacionModel = new PublicacionModel();
    $imagenModel = new ImagenModel();

    $publicaciones = $publicacionModel
        ->where('estadoPublicacion', 1)
        ->orderBy('fechaPublicacion', 'DESC')
        ->paginate(5); 

    $pager = $publicacionModel->pager;

    $imagenes = [];
    foreach ($publicaciones as $publicacion) {
        $imagen = $imagenModel
            ->where('idPublicacion', $publicacion['idPublicacion'])
            ->first();

        $imagenes[$publicacion['idPublicacion']] = $imagen;
    }

    $data = [
        'publicaciones' => $publicaciones,
        'imagenes'      => $imagenes,
        'pager'         => $pager
    ];

    return view('proyectos', $data);
}

    public function filtrar(){
        $publicacionModel = new PublicacionModel();
        $imagenModel = new ImagenModel();

        $fechaDesde = $this->request->getPost('desde');
        $fechaHasta = $this->request->getPost('hasta');

        $query = $publicacionModel->where('estadoPublicacion',1);

        //filtros
        if(!empty($fechaDesde)){
            $query->where('fechaPublicacion >=',$fechaDesde);
        }
        if(!empty($fechaHasta)){
            $query->where('fechaPublicacion <=',$fechaHasta);
        }

        //paginacion
        $publicaciones = $query->orderBy('fechaPublicacion','DESC')->paginate(5);
        $pager = $publicacionModel->pager;

        $imagenes=[];
        foreach($publicaciones as $publicacion){
            $imagen = $imagenModel
                ->where('idPublicacion', $publicacion['idPublicacion'])
                ->first();

            $imagenes[$publicacion['idPublicacion']] = $imagen;
        }

        $data = [
            'publicaciones' => $publicaciones,
            'imagenes' => $imagenes,
            'pager' => $pager,
            'fechaDesde' => $fechaDesde,
            'fechaHasta' => $fechaHasta
        ];

        return view('proyectos',$data);

    }
}
