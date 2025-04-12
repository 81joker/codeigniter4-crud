<?php

namespace App\Controllers;

use App\Enums\UserStatus;
use App\Models\UserModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $activeUsers = $model->where('state', UserStatus::Active->value)->countAllResults();
        // Typically you'd want to return a view with this data
        return view('dashboard', ['activeUsers' => $activeUsers]);
    }
    

    // public function activeUsers()
    // {
    //     return UserModel::where('status', UserStatus::Active->value)->count();
    // }
}
