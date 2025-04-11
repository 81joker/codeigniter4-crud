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
        $user_id = 1;
        for ($i = 0; $i < 10; $i++) {
            $builder->insert([
                'user_id'  => 1,
                'title'    => 'Sample Post dolor' . $i,
                'content'  => 'Lorem ipsum dolor sit amet, 
                consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
                 consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore  ' . $i,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
