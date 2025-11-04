<?php namespace App\Models;
use CodeIgniter\Model;
class ComentarioModel extends Model{
    protected $table='comentarios'; protected $primaryKey ='idComentario';
    protected $useAutoIncrement=true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['idPublicacion', 'idUsuario', 'textoComentario','fechaComentario','estadoComentario'];
    protected $useTimestamps = false;  // Dates
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [];  // Validation
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;
}