<?php namespace App\Models;
use CodeIgniter\Model;
class RespuestaModel extends Model{
    protected $table='respuestas_comentarios'; protected $primaryKey ='	idRespuesta';
    protected $useAutoIncrement=true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['idComentario', 'idUsuario', 'textoRespuesta','estadoRespuesta'];
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