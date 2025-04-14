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
    protected $allowedFields    = ['id', 'firstname', 'lastname', 'status', 'avatar', 'email', 'created_at', 'updated_at'];

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
        //  'id'    => 'is_natural_no_zero',
        'firstname' => 'required|min_length[2]|max_length[100]',
        'lastname'  => 'required|min_length[2]|max_length[100]',
        'email'     => 'required|valid_email|is_unique[users.email,id,{id}]',
        'status'    => 'permit_empty|in_list[active,inactive]',
  
        // 'avatar'    => 'uploaded[avatar]|max_size[avatar,1024]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]'
    ];
    
    protected $validationMessages   = [
        'firstname' => [
            'required' => 'Der Vorname ist erforderlich',
            'min_length' => 'Der Vorname muss mindestens zwei Zeichen lang sein',
        ],
        'email' => [
            'required' => 'Die E-Mail-Adresse ist erforderlich',
            'valid_email' => 'Das E-Mail-Format ist ungültig',
            'is_unique' => 'Diese E-Mail-Adresse ist bereits registriert',
        ],
        'avatar' => [
            'uploaded' => 'Bitte wählen Sie ein Avatar-Bild aus',
            'max_size' => 'Die Avatar-Bildgröße darf 1 MB nicht überschreiten',
            'is_image' => 'Nur Bilddateien sind erlaubt',
            'mime_in' => 'Nur JPG-, JPEG- und PNG-Bilder sind erlaubt',
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
