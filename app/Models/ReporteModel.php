<?php namespace App\Models;
use CodeIgniter\Model;
class ReporteModel extends Model{
    protected $table='reportes'; protected $primaryKey ='idReporte';
    protected $useAutoIncrement=true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['idComentario', 'idUsuario', 'comentarioReporte','motivoReporte','estadoReporte'];
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