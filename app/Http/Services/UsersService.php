<?php

namespace App\Http\Services;

use App\User;

class UsersService extends BaseService
{

    public function getById($id)
    {
        return User::where('id', $id)->first();
    }

    public function getAll()
    {
        return User::all();
    }

    public function deleteById($id)
    {
        return User::where('id', $id)->delete();
    }
}
