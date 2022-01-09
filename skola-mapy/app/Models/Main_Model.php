<?php

namespace App\Models;

use CodeIgniter\Model;

class Main_Model extends Model
{
    protected $table      = 'mesto';
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
    
    public function load_data()
    {
        $result = $this->db->query('
        SELECT pocet_prijatych.id AS admitted_id, skola.id AS skola_id, mesto.nazev AS nazev_mesto, obor.nazev AS nazev_obor, pocet_prijatych.pocet AS prijatych, 
        pocet_prijatych.rok AS rok_prijeti, skola.nazev AS nazev_skola, skola.geo_lat AS geo_lattitude, skola.geo_long AS geo_longtitude 
        FROM mesto
        INNER JOIN skola ON mesto.id=skola.mesto INNER JOIN pocet_prijatych ON skola.id=pocet_prijatych.skola 
        INNER JOIN obor ON pocet_prijatych.obor=obor.id');
        return $result->getResult();
    }
}