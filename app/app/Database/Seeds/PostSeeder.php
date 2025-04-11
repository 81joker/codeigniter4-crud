<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\PostModel;
use App\Models\UserModel;

class PostSeeder extends Seeder
{
    public function run()
    {


        $model = new PostModel();
        $fabricator = new \CodeIgniter\Test\Fabricator($model);
    
        $fabricator->create(10);
    
        $builder = $this->db->table('posts');

        $model = new UserModel();
        $users = $model->findAll();
        $user_id = array_column($users, 'id');

        for ($i = 0; $i < 10; $i++) {
            $random_user_id = $user_id[array_rand($user_id)];
            if ($random_user_id == null) {
                $random_user_id = 1;
            }
            $builder->insert([
                'user_id'   => $random_user_id,
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
