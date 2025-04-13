<?php

namespace App\Controllers;

use App\Enums\PostStatus;
use App\Enums\UserStatus;
use App\Models\PostModel;
use App\Models\UserModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function index()
    {
        $modelUser = new UserModel();
        $modelPost = new PostModel();
        $latestUsers = $modelUser->orderBy('created_at', 'desc')->limit(5)->findAll();
        $latestPosts = $modelPost->orderBy('created_at', 'desc')->limit(5)->findAll();
        
        $activeUsers = $modelUser->where('state', UserStatus::Active->value)->countAllResults();
        $activePosts = $modelPost->countAllResults();
        // $activePosts = $modelPost->where('state', PostStatus::Active->value)->countAllResults();
        $data = [
            'title' => 'Dashboard',
            'activeUsers' => $activeUsers,
            'activePosts' => $activePosts,
            'latestUsers' => $latestUsers,
            'latestPosts' => $latestPosts,
        ];
        return view('dashboard', $data);
    }
    

    // public function activeUsers()
    // {
    //     return UserModel::where('status', UserStatus::Active->value)->count();
    // }
}
