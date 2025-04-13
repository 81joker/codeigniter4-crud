<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\UserModel;

class PostModel extends Model
{
    protected $table            = 'posts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'title', 'content'];
    // protected $allowedFields    = ['user_id', 'title', 'content'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'user_id' => 'permit_empty|is_natural_no_zero|exists[users,id]', 
        'title'   => 'required|min_length[3]|max_length[255]',
        'content' => 'required|min_length[6]|max_length[750]',
    ];
    protected $validationMessages = [
        'title' => [
            'required' => 'Der Vorname ist erforderlich',
            'min_length' => 'Der Vorname muss mindestens zwei Zeichen enthalten',
        ],
        'content' => [
            'required' => 'Der Nachname ist erforderlich',
            'min_length' => 'Der Nachname muss mindestens zwei Zeichen enthalten',
            'max_length' => 'Der Nachname darf nicht länger als 255 Zeichen sein',

        ],
    ];

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



    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }
}
