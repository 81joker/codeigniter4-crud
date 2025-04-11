<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\Request;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $users = $model->findAll();
        return view('users/index', ['users' => $users]);
        
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
