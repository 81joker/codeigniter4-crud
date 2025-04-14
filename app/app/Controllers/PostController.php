<?php

namespace App\Controllers;

use App\Models\PostModel;
use CodeIgniter\HTTP\Request;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Helpers\FileUploadService;
use CodeIgniter\Exceptions\RuntimeException;


class PostController extends BaseController
{
    public function index(){

    
        // Get request parameters with defaults
        $perPage = $this->request->getGet('per_page') ?? 10;
        $search = $this->request->getGet('search') ?? '';
        $sortField = $this->request->getGet('sort_field') ?? 'updated_at';
        $sortDirection = $this->request->getGet('sort_direction') ?? 'DESC';
    
        // Validate sort direction
        $sortDirection = strtoupper($sortDirection) === 'ASC' ? 'ASC' : 'DESC';
    
        // Build the query
        $userModel = new PostModel();
        $query = $userModel;
        $query = $query->select('posts.*, users.firstname, users.lastname, users.email')
        ->join('users', 'users.id = posts.user_id');

        if (!empty($search)) {
            $query = $query->groupStart()
                ->like('title', $search)
                ->orLike('content', $search)
                ->orLike('firstname', match: $search)
                ->orLike('lastname', match: $search)
            ->groupEnd(); 
        }
    
        // Apply sorting
        $query = $query->orderBy($sortField, $sortDirection);
    
        // Get paginated results
        $data = [
            'posts' => $query->paginate($perPage),
            'pager' => $userModel->pager,
            'search' => $search,
            'sortField' => $sortField,
            'sortDirection' => $sortDirection
        ];
    
        return view('posts/index', ['posts' => $data]);
    }


    public function create(){
        $users = new \App\Models\UserModel();
        return view('posts/create', ['users' => $users->findAll()]);
    }

    public function store()
    {

        $model = new PostModel();
        $uploadService = new FileUploadService();

        if (!$this->validate($model->validationRules)) {
            return redirect()->back()
                ->with('errors', $this->validator->getErrors())
                ->withInput();
        }


        $image = $this->request->getFile('image');
        
        try {
            $imaePath = $uploadService->upload($image, 'images');
        } catch (RuntimeException $e) {
            return redirect()->back()
                ->with('errors', ['image' => $e->getMessage()])
                ->withInput();
        }

        $status = $this->request->getPost('status') === 'active' ? 'active' : 'inactive';
        $data = [
            'title' => $this->request->getPost('title'),
            'content'  => $this->request->getPost('content'),
            'user_id' => $this->request->getPost('user_id'),
            'status' => $status,
            'image' => $imaePath
        ];
        
        $model->save($data);
        return redirect()->to('/posts')->with('success', 'Post updated successfully');
    }

    public function edit($id)
    {
        $model = new PostModel();
        $data['post'] = $model->find($id);
        return view('posts/edit', $data);
    }

    public function update($id)
    {
        $model = new PostModel();

        if (!$this->validate($model->validationRules)) {
            return redirect()->back()
                ->with('errors', $this->validator->getErrors())
                ->withInput();
        }
        
        $model->update($id, [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content')
        ]);
        return redirect()->to('/posts')->with('success', 'Post updated successfully');
    }

    public function delete($id)
    {
        $model = new PostModel();
        $model->delete($id);
        return redirect()->to('/posts')->with('success', 'Post deleted successfully');

    }


}
