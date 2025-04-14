<?php

namespace App\Tests\Unit;

use App\Models\PostModel;
use App\Models\UserModel;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Services;

final class PostModelTest extends CIUnitTestCase
{
    private $userId;

    protected function setUp(): void
    {
        parent::setUp();

        $migrations = Services::migrations();
        $migrations->latest();

        $userModel = new UserModel();
        $this->userId = $userModel->insert([
            'firstname' => 'Nehad',
            'lastname'  => 'Altimimi',
            'email'     => 'unit_' . time() . '@example.com',
            'status'    => 'active'
        ]);
    }

    public function testPostCanBeCreated(): void
    {
        $model = new PostModel();

        $postId = $model->insert([
            'title'   => 'PHPUnit Post Test',
            'content' => 'Dies ist ein Test-Post lorem ipsum dolor sit amet.',
            'user_id' => $this->userId,
            'status'  => 'active',
            'image'   => 'images/dummy.jpg'
        ]);

        $this->assertIsInt($postId, 'Post wurde nicht korrekt erstellt.');

        $post = $model->find($postId);
        $this->assertNotNull($post);
        $this->assertEquals('PHPUnit Post', $post['title']);
    }

    protected function tearDown(): void
    {
        $postModel = new PostModel();
        $postModel->where('user_id', $this->userId)->delete();

        $userModel = new UserModel();
        $userModel->delete($this->userId);

        parent::tearDown();
    }
}
