<?php namespace App\Models;
use CodeIgniter\Model;
class PublicacionModel extends Model{
    protected $table='publicaciones'; protected $primaryKey ='idPublicacion';
    protected $useAutoIncrement=true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['tituloPublicacion', 'fechaPublicacion', 'resumenPublicacion','objetivosPublicacion','conclucionPublicacion','estadoPublicacion'];
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