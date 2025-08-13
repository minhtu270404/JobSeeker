<?php
namespace App\Repositories\Admin;

use App\Models\User;

class UserRepository
{
    public function GetUser()
    {
        $query = User::query()
            ->where('is_active', false)
            ->get();
        return $query;
    }
    public function FindOnceUser(int $id)
    {
        $query = User::findOrFail($id);
        return $query;
    }
}