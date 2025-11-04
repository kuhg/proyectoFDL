<?php namespace App\Models;
use CodeIgniter\Model;
class PreguntaFrecuenteModel extends Model{
    protected $table='preguntas_frecuentes'; protected $primaryKey ='idFaq';
    protected $useAutoIncrement=true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['pregunta', 'respuesta', 'estadoFaq'];
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