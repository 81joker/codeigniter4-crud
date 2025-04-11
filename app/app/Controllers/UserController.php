<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\Request;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
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
        $userModel = new UserModel();
        $query = $userModel;

        if (!empty($search)) {
            // $query = $query->like('firstname', $search);
            $query = $query->groupStart() // Start a group for OR conditions
            ->like('firstname', $search)
            ->orLike('lastname', $search)
            ->orLike('email', $search)
        ->groupEnd(); 
        }

        // Apply sorting
        $query = $query->orderBy($sortField, $sortDirection);

        // Get paginated results
        $data['users'] = $query->paginate($perPage);
        $data['pager'] = $userModel->pager;

        // For API responses, you might want to return JSON
        //  return $this->response->setJSON($data);
         return view('users/index', ['users' => $data]);


    }
   
    public function create(){
        return view('users/create');
    }

    public function store()
    {
        // var_dump($this->request->getPost());
        $model = new UserModel();
        $model->save([
            'title' => $this->request->getPost('title'),
            'body' => $this->request->getPost('body')
        ]);
        return redirect()->to('/users')->with('success', 'Post created successfully');
    }

    public function edit($id)
    {
        var_dump($id);
        $model = new UserModel();
        $data['post'] = $model->find($id);
        return view('users/edit', $data);
    }

    public function update($id)
    {
        $model = new UserModel();
        $model->update($id, [
            'title' => $this->request->getPost('title'),
            'body' => $this->request->getPost('body')
        ]);
        return redirect()->to('/users')->with('success', 'Post updated successfully');
    }

    public function delete($id)
    {
        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('/users')->with('success', 'Post deleted successfully');

    }


}
