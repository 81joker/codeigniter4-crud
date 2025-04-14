<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\Request;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Helpers\FileUploadService;
use CodeIgniter\Exceptions\RuntimeException;

class UserController extends BaseController
{
    
    public function index()
    {


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

    public function show()
    {
        return view('users/show');
    }

    public function create()
    {
        return view('users/create');
    }

    public function store()
    {
        $model = new UserModel();
        $uploadService = new FileUploadService();

        $rules = [
            'firstname' => 'required|min_length[2]|max_length[50]',
            'lastname'  => 'required|min_length[2]|max_length[50]',
            'email'     => 'required|valid_email|is_unique[users.email]',
            'avatar'    => [
                'rules' => 'uploaded[avatar]|max_size[avatar,1024]|is_image[avatar]',
                'errors' => [
                    'uploaded' => 'Please select an avatar image',
                    'is_image' => 'Only image files (jpg, png, gif) are allowed'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->with('errors', $this->validator->getErrors())
                ->withInput();
        }

        $avatar = $this->request->getFile('avatar');
        
        try {
            $avatarPath = $uploadService->upload($avatar, 'avatars');
        } catch (RuntimeException $e) {
            return redirect()->back()
                ->with('errors', ['avatar' => $e->getMessage()])
                ->withInput();
        }

        $status = $this->request->getPost('status') === 'active' ? 'active' : 'inactive';

        $data = [
            'firstname' => $this->request->getPost('firstname'),
            'lastname'  => $this->request->getPost('lastname'),
            'email'     => $this->request->getPost('email'),
            'avatar'    => $avatarPath,
            'status'    => $status
        ];

        if (!$model->save($data)) {
            // Delete the uploaded file if save fails
            @unlink(FCPATH . $avatarPath);

            return redirect()->back()
                ->with('errors', $model->errors())
                ->withInput();
        }

        return redirect()->to('/users')
            ->with('message', 'User saved successfully');
    }
    public function edit($id)
    {
        $model = new UserModel();
        $data['user'] = $model->find($id);
        return view('users/edit', $data);
    }

    public function update($id = null)
    {
        $model = new UserModel();
        $uploadService = new FileUploadService();

        $user = $model->find($id);
        $oldAvatarPath = $user['avatar'] ?? null;


        $status = $this->request->getPost('status') === 'active' ? 'active' : 'inactive';
        $rules = [
            'firstname' => 'required|min_length[2]|max_length[50]',
            'lastname'  => 'required|min_length[2]|max_length[50]',
            'email'     => "required|valid_email|is_unique[users.email,id,{$id}]",


            'avatar'    => [
                'rules' => 'if_exist|max_size[avatar,1024]|is_image[avatar]',
                'errors' => [
                    'uploaded' => 'Please select an avatar image',
                    'max_size' => 'Avatar image size is too large (max 3MB)',
                    'is_image' => 'Only image files (jpg, png, gif) are allowed'
                ]
            ]
        ];

        $avatar = $this->request->getFile('avatar');
        $avatarPath = null;

        try {
            $avatarPath = $uploadService->updateFile(
                $avatar, 
                'avatars',
                $oldAvatarPath
            );
        } catch (RuntimeException $e) {
            return redirect()->back()
                ->with('errors', ['avatar' => $e->getMessage()])
                ->withInput();
        }

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->with('errors', $this->validator->getErrors())
                ->withInput();
        }
        $data = [
            'firstname' => $this->request->getPost('firstname'),
            'lastname'  => $this->request->getPost('lastname'),
            'email'     => $this->request->getPost('email'),
            'status'    => $status
        ];

        if ($avatarPath) {
            $data['avatar'] = $avatarPath;
        }

        $db = \Config\Database::connect();
        $db->table('users')
            ->set($data)
            ->set('updated_at', date('Y-m-d H:i:s'))
            ->where('id', $id)
            ->update();

        // $model->update($id ,$data);
        return redirect()->to('/users')->with('success', 'User updated successfully');
    }

    public function delete($id)
    {
        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('/users')->with('success', 'User deleted successfully');
    }
}
