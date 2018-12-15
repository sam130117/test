<?php

namespace App\Http\Services;

use App\User;
use Carbon\Carbon;

class UsersService extends BaseService
{
    const MODEL_NAME = User::class;

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
