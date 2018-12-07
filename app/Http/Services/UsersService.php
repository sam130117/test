<?php

namespace App\Http\Services;

use App\User;

class UsersService extends BaseService
{
    public function getById($id)
    {
        return User::where('id', $id)
            ->first();
    }

    public function getAll()
    {
        return User::paginate(self::LIMIT);
    }

    public function deleteById($id)
    {
        return User::where('id', $id)
            ->delete();
    }

    public function updateById($id, array $data)
    {
        return User::where('id', $id)
            ->update($data);
    }
}
