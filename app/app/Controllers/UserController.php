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
                $query = $query->groupStart()
                    ->like('firstname', $search)
                    ->orLike('lastname', $search)
                    ->orLike('email', $search)
                ->groupEnd(); 
            }
        
            // Apply sorting
            $query = $query->orderBy($sortField, $sortDirection);
        
            // Get paginated results
            $data = [
                'users' => $query->paginate($perPage),
                'pager' => $userModel->pager,
                'search' => $search,
                'sortField' => $sortField,
                'sortDirection' => $sortDirection
            ];
        
            return view('users/index', ['users' => $data]);
        }

   
    public function create(){
        return view('users/create');
    }

    public function store()
    {
        // var_dump($this->request->getPost());
        $model = new UserModel();
        $data = [
            'firstname' => $this->request->getPost('firstname'),
            'lastname'  => $this->request->getPost('lastname'),
            'email'     => $this->request->getPost('email')
        ];
        // if ($id = $this->request->getPost('id')) {
        //     $data['id'] = $id;
        // }
        if (!$model->save($data)) {
            // Validation failed
            return redirect()->back()
                ->with('errors', $model->errors())
                ->withInput();
        }    
        return redirect()->to('/users')
        ->with('message', 'User saved successfully');
        // $model->save([
        //     'firstname' => $this->request->getPost('firstname'),
        //     'lastname' => $this->request->getPost('lastname'),
        //     'email' => $this->request->getPost('email'),
        // ]);
        
        // return redirect()->to('/users')->with('success', 'Post created successfully');
    }

    public function edit($id)
    {
        $model = new UserModel();
        $data['user'] = $model->find($id);
        return view('users/edit', $data);
    }

    public function update($id)
    {
        $model = new UserModel();
        $model->update($id, [
            'firstname' => $this->request->getPost('firstname'),
        ]);
        return redirect()->to('/users')->with('success', 'User updated successfully');
    }

    public function delete($id)
    {
        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('/users')->with('success', 'User deleted successfully');

    }


}
