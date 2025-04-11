<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\PostModel;

class PostSeeder extends Seeder
{
    public function run()
    {
        $model = new PostModel();
        $fabricator = new \CodeIgniter\Test\Fabricator($model);
    
        $fabricator->create(10);
    
        $builder = $this->db->table('posts');
        
        for ($i = 0; $i < 10; $i++) {
            $builder->insert([
                'user_id'  => rand(1, 10),
                'title'    => 'Sample Post ' . $i,
                'content'  => 'This is the content of post number ' . $i,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
