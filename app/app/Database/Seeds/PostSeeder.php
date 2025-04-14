<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        $userModel = new \App\Models\UserModel();
        $postModel = new \App\Models\PostModel();
        $faker = \Faker\Factory::create();

        $users = $userModel->findAll();

        if (empty($users)) {
            echo "Keine Benutzer gefunden. Fügen Sie vor dem Versenden von Beiträgen einige Benutzer hinzu.\n";
            return;
        }

        foreach ($users as $user) {
            for ($i = 0; $i < 5; $i++) {
                $postModel->insert([
                    'title' => $faker->sentence,
                    'content' => $faker->paragraph,
                    'user_id' => $user['id'],
                    'status' => $faker->randomElement(['active', 'inactive']),
                    'image' => 'uploads/image/default.jpg', 
                    'created_at' => $faker->dateTimeThisYear->format('Y-m-d H:i:s'),
                    'updated_at' => $faker->dateTimeThisYear->format('Y-m-d H:i:s'),
                ]);
            }
        }


    }
}
