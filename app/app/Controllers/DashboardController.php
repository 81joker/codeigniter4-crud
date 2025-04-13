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
        $latestUsers = $model->orderBy('created_at', 'desc')->limit(5)->findAll();
        $activeUsers = $model->where('state', UserStatus::Active->value)->countAllResults();
        return view('dashboard', ['activeUsers' => $activeUsers , 'latestUsers' => $latestUsers]);
    }
    

    // public function activeUsers()
    // {
    //     return UserModel::where('status', UserStatus::Active->value)->count();
    // }
}
