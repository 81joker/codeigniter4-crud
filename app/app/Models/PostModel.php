<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table            = 'posts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'title', 'content'];

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
    protected $validationRules      = [
        'user_id' => 'required|integer',
        'title'   => 'required|min_length[5]|max_length[255]',
        'content' => 'required|min_length[10]',
    ];
    protected $validationMessages   = [
        'title' => [
            'required'    => 'العنوان مطلوب',
            'min_length'  => 'العنوان يجب أن يكون أطول من 5 أحرف',
        ],
        'content' => [
            'required'    => 'المحتوى مطلوب',
            'min_length'  => 'المحتوى يجب أن يحتوي على 10 أحرف على الأقل',
        ]
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



    // public function user()
    // {
    //     return $this->belongsTo(UserModel::class,'id');
    // }
}
