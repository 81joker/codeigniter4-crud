<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        $model = new UserModel();
        $fabricator = new \CodeIgniter\Test\Fabricator($model);
    
        $fabricator->create(10);
    
        $builder = $this->db->table('users');
        
        for ($i = 0; $i < 10; $i++) {
            $builder->insert([
                'id'        => $i,
                'firstname' => 'Firstname' . $i,
                'lastname'  => 'Lastname' . $i,
                'avatar' => 'person_' . $i . '.jpg',
                'email'     => 'user' . $i . '@example.com',
                'state'     => rand(0, 1), 
            ]);
        }
    }
}
