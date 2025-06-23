<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageDestinationModel extends Model
{
    protected $table            = 'image_destination';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['destination_id', 'image_name_id', 'image_name_en', 'slug', 'image', 'alt_image'];

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
    public function getDescriptionsWithDestination()
    {
        return $this->select('image_destination.*, destination.title as title')
                   ->join('destination', 'destination.id = image_destination.destination_id')
                   ->orderBy('image_destination.id', 'ASC')
                   ->findAll();
    }
}
