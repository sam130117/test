<?php

namespace App\Http\Services;

use App\User;
use Carbon\Carbon;

class UsersService extends BaseService
{
    public function getById($id)
    {
        return User::getById($id);
    }

    public function getAll()
    {
        return User::paginate(self::LIMIT);
    }

    public function deleteById($id)
    {
        return User::deleteById($id);
    }

    public function updateById($id, array $data)
    {
        return User::updateById($id, $data);
    }

    public function saveUserToken(User $user)
    {
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if (request()->get('remember_me', null))
            $token->expires_at = Carbon::now()->addWeeks(1);
        else
            $token->expires_at = Carbon::now()->addHours(1);
        $token->save();
        return $tokenResult;
    }
}
