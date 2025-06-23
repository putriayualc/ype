<?php

namespace App\Models;

use CodeIgniter\Model;

class TravelMemoriesModel extends Model
{
    protected $table            = 'travel_memories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'heading_id',
        'heading_en',
        'section_id',
        'section_en',
        'title_id',
        'title_en',
        'destination_id',
        'image',
        'slug'
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // Join with destinations table
    public function getMemoriesWithDestination()
    {
        return $this->select('travel_memories.*, destination.title as destination_title')
            ->join('destination', 'destination.id = travel_memories.destination_id')
            ->findAll();
    }
}
