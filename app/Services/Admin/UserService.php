<?php

namespace App\Services\Admin;

use App\Models\User;
use App\Repositories\Admin\UserRepository;

class UserService
{
    protected $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }
    public function ListUser()
    {
       return $this->users->GetUser(); 
    }
     public function ListOnceUser(int $id)
    {
       return $this->users->FindOnceUser($id); 
    }
}