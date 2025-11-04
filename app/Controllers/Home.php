<?php

namespace App\Controllers;
use App\Models\ImagenModel;
use App\Models\PublicacionModel;

class Home extends BaseController
{
    public function index(): string
    {
        $publicacionModel = new PublicacionModel();
        $imagenModel = new ImagenModel();

        $publicaciones = $publicacionModel
            ->where('estadoPublicacion', 1)
            ->orderBy('fechaPublicacion', 'DESC')
            ->findAll(3);
        $imagenes = [];
        
        foreach ($publicaciones as $publicacion) {
            $imagen = $imagenModel
                ->where('idPublicacion', $publicacion['idPublicacion'])
                ->first();

            $imagenes[$publicacion['idPublicacion']] = $imagen;
        }

        $data = [
            'publicaciones' => $publicaciones,
            'imagenes'      => $imagenes
        ];

        return view('inicio', $data);
    }
}
