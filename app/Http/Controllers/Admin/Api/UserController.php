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
     public function getOnceUserList(UserService $userService , int $id)
    {
        $users = $userService->ListOnceUser($id);
        return new UserResource ($users);
    }
}
