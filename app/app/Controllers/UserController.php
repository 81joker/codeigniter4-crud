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

     
            // $search = $this->request->getGet('search');
             $model = new UserModel();
            $usersFetch =  $model->findAll();

            // $query = $model->builder()->where('firstname', 'like', "%{$search}%");
            // // dd($query);
            // // Only perform search if a term was provided
            // if (!empty($search)) {
            //     $data['searchResults'] = $model
            //         ->groupStart()
            //             ->like('firstname', $search)
            //             ->orLike('email', $search)
            //         ->groupEnd()
            //         ->findAll();
            // }
            $data = [
                'users' => $model->paginate(2),
                'pager' => $model->pager,
            ];
            return view('users/index', ['users' => $data]);

        // $search = $this->request->getGet('search');
        // $model = new UserModel();
        // $usersSearch = $model->like('firstname', $search)->orLike('email', $search)->findAll();
        // $data = [
        //     'users' => $model->findAll(), // 10 items per page
        //     // 'pager' => $model->pager,
        //     'search' => $usersSearch

        // ];
        // $data = [
        //     'users' => $model->paginate(10), // 10 items per page
        //     'pager' => $model->pager,
        //     'search' => $search
        // ];
        
        // if (!empty($search)) {
        //     $model->groupStart()
        //           ->like('name', $search)
        //           ->orLike('email', $search)
        //           ->groupEnd();
        // }
  ;
        

    }
    // public function index()
    // {

    //     $search = request('search', '');
    //     $model = new UserModel();
    //     $query = $model->builder();
    //     dd($query);
    //         // ->where('title', 'like', "%{$search}%")
    //         // ->orderBy($sortField, $sortDirection)
    //         // ->paginate($perPage);

    //     // return ProductListResource::collection($query);
    //     // $model = new UserModel();
    //     // $users = $model->findAll();
    //     // return view('users/index', ['users' => $users]);
        
    // }

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
