<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProfileController extends BaseController
{
    public function profile()
    {
        // Check if user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'You need to be logged in to view your profile.');
        }
        $name = session()->get('firstname'). ''. session()->get('lastname');
        // Pass session data to view
        return view('users/profile', [
            'user' => [
                'firstname' =>  session()->get('firstname'),
                'email' => session()->get('email'),
                'avatar' => session()->get('avatar')
            ]
        ]);
    }
}
