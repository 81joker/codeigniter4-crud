<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run()
    {

        $testUsers = [];
        
        for ($i = 0; $i < 10; $i++) {
            $testUsers[] = [
                'firstname' => 'Firstname' . $i,
                'lastname'  => 'Lastname' . $i,
                'avatar'    => 'person_' . $i . '.jpg',
                'email'     => 'user' . $i . '@example.com',
                'status'    => ($i % 2 === 0) ? 'active' : 'inactive',
            ];
        }

        $this->db->table('users')->insertBatch($testUsers);
    }
}
