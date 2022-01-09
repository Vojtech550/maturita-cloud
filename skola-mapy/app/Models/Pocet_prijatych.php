<?php

namespace App\Models;

use CodeIgniter\Model;

class Pocet_prijatych extends Model
{
    protected function initialize()
    {
        //$this->allowedFields[] = 'middlename';
    }
    
    protected $table      = 'pocet_prijatych';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['obor','skola','pocet','rok'];

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

    public function select_skola(){
        $select = $this->db->query('SELECT skola.id, skola.nazev FROM skola ORDER BY `nazev` ASC;');
        return $select->getResult();
    }
    public function select_obor(){
        $select = $this->db->query('SELECT DISTINCT pocet_prijatych.obor, obor.nazev FROM pocet_prijatych
        INNER JOIN obor ON pocet_prijatych.obor=obor.id
        ORDER BY obor.nazev ASC;');
        return $select->getResult();
    }
}