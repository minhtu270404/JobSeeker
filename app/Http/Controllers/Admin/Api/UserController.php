<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\UserResource;
use App\Services\Admin\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserList(UserService $userService)
    {
        $users = $userService->ListUser();
        return UserResource::collection($users);
    }
}
