<?php

namespace App\Models;

use CodeIgniter\Model;

class Obor extends Model
{
    protected function initialize()
    {
        //$this->allowedFields[] = 'middlename';
    }
    
    protected $table      = 'obor';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nazev'];

    protected $useTimestamps = false;
    protected $dateFormat = 'datetime'; //not needed
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;
    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    public function select_menu(){
        $select = $this->db->query('SELECT obor.id, obor.nazev FROM obor');
        return $select->getResult();
    }
}