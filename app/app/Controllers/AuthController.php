<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Helpers\FileUploadService;
use CodeIgniter\Exceptions\RuntimeException;

class AuthController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new UserModel();
        helper(['form', 'url', 'session']);
    }

    public function register()
    {
        $uploadService = new FileUploadService();

        if ($this->request->getMethod() === 'get') {
            return view('auth/register');
        }

        $rules = [
            'firstname' => 'required|min_length[3]|max_length[30]',
            'lastname' => 'required|min_length[3]|max_length[30]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]|max_length[255]',
            'password_confirm' => 'matches[password]',
            'avatar'    => [
                'rules' => 'uploaded[avatar]|is_image[avatar]',
                'errors' => [
                    'uploaded' => 'Please select an avatar image',
                    'is_image' => 'Only image files (jpg, png, gif) are allowed'
                ]
            ]
        ];

        $messages = [
            'firstname' => [
                'required' => 'Vorname ist erforderlich',
                'min_length' => 'Der Vorname muss mindestens 3 Zeichen lang sein',
                'max_length' => 'Der Vorname darf nicht länger als 30 Zeichen sein'
            ],
            'lastname' => [
                'required' => 'Nachname ist erforderlich',
                'min_length' => 'Der Nachname muss mindestens 3 Zeichen lang sein',
                'max_length' => 'Der Nachname darf 30 Zeichen nicht überschreiten'
            ],
            'email' => [
                'required' => 'E-Mail ist erforderlich',
                'valid_email' => 'Bitte geben Sie eine gültige E-Mail-Adresse ein',
                'is_unique' => 'Diese E-Mail ist bereits registriert'
            ],
            'password' => [
                'required' => 'Passwort ist erforderlich',
                'min_length' => 'Das Passwort muss mindestens 8 Zeichen lang sein'
            ],
            'password_confirm' => [
                'matches' => 'Die Passwörter stimmen nicht überein'
            ],
            'avatar' => [
                'uploaded' => 'Bitte wählen Sie ein Avatar-Bild aus',
                'is_image' => 'Nur Bilddateien (jpg, png, gif) sind zulässig.'
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return view('auth/register', [
                'validation' => $this->validator
            ]);
        }


        $avatar = $this->request->getFile('avatar');

        try {
            $avatarPath = $uploadService->upload($avatar, 'avatars');
        } catch (RuntimeException $e) {
            return redirect()->back()
                ->with('errors', ['avatar' => $e->getMessage()])
                ->withInput();
        }
        $userData = [
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'avatar' => $avatarPath
        ];


        $this->model->save($userData);


        $user = $this->model->where('email', $userData['email'])->first();

        session()->set([
            'id' => $user['id'],
            'name' => $user['firstname'] . ' ' . $user['lastname'],
            'email' => $user['email'],
            'avatar' => $user['avatar'] ?? null,
            'logged_in' => true
        ]);

        return redirect()->to('/')->with('success', 'Benutzer erfolgreich gespeichert');

        return redirect()->to('/login');
    }


    public function login()
    {
        if ($this->request->getMethod() === 'get') {
            return view('auth/login');
        }

        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]'
        ];

        $messages = [
            'email' => [
                'required' => 'Email is required',
                'valid_email' => 'Please enter a valid email address'
            ],
            'password' => [
                'required' => 'Password is required',
                'min_length' => 'Password must be at least 8 characters'
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            return view('auth/login', [
                'validation' => $this->validator
            ]);
        }

        $email = trim($this->request->getPost('email'));
        $password = trim($this->request->getPost('password'));



        $user = $this->model->where('email', $email)->first();

        if (!$user) {
            session()->setFlashdata('error', 'Invalid credentials');
            return redirect()->back()->withInput();
        }





        if (!password_verify($password, $user['password'])) {
            session()->setFlashdata('error', 'Invalid credentials');
            return redirect()->back()->withInput();
        }

        session()->set([
            'id' => $user['id'],
            'name' => $user['firstname'] . ' ' . $user['lastname'],
            'email' => $user['email'],
            'avatar' => $user['avatar'] ?? null,
            'logged_in' => true
        ]);


        return redirect()->to('/')->with('success', 'User Logged in successfully');
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
