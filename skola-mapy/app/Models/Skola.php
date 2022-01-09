<?php

namespace App\Models;

use CodeIgniter\Model;

class Skola extends Model
{
    protected function initialize()
    {
        //$this->allowedFields[] = 'middlename';
    }
    
    protected $table      = 'skola';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nazev','mesto','geo_lat', 'geo_long'];

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

    public function select_mesto(){
        // $db = db_connect();
        // $builder = $this->db->table('skola');
        // $query = $this->builder()->distinct()->select('skola.mesto, mesto.nazev')->join('mesto', 'skola.mesto=mesto.id')->orderBy('mesto.nazev','ASC');
        $select = $this->db->query('SELECT DISTINCT skola.mesto, mesto.nazev FROM skola INNER JOIN mesto ON skola.mesto=mesto.id ORDER BY mesto.nazev ASC;');
        return $select->getResult();
        //return $query->get()->getResult();
    }
}