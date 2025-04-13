<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\PostModel;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'firstname', 'lastname', 'avatar', 'email', 'state', 'created_at', 'updated_at'];

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
        'id'    => 'is_natural_no_zero',
        'firstname' => 'required|min_length[2]|max_length[100]',
        'lastname'  => 'required|min_length[2]|max_length[100]',
        'email'     => 'required|valid_email|is_unique[users.email,id,{id}]',
  
        // 'avatar'    => 'uploaded[avatar]|max_size[avatar,1024]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]'
    ];
    
    protected $validationMessages   = [
        'firstname' => [
            'required'    => 'الاسم الأول مطلوب',
            'min_length'  => 'الاسم الأول يجب أن يحتوي على حرفين على الأقل',
        ],
        'email' => [
            'required'     => 'البريد الإلكتروني مطلوب',
            'valid_email'  => 'صيغة البريد غير صحيحة',
            'is_unique'    => 'هذا البريد مسجل بالفعل',
        ],
        'avatar' => [
            'uploaded' => 'Please select an avatar image',
            'max_size' => 'Avatar image size should not exceed 1MB',
            'is_image' => 'Only image files are allowed',
            'mime_in'  => 'Only JPG, JPEG, and PNG images are allowed'
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


    public function posts()
    {
        return $this->hasMany(PostModel::class , 'user_id');
    }

}
