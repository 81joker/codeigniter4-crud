<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PostController extends BaseController
{
    public function index()
    {
        $model = new PostModel();
        dd($model);
        $posts = $model->findAll();
        return view('posts/index', ['posts' => $posts]);
        
    }
}
