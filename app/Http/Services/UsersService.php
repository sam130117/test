<?php

namespace App\Http\Services;

use App\User;
use Carbon\Carbon;

class UsersService extends BaseService
{
    const MODEL_NAME = User::class;

    public function getAll()
    {
        if (self::MODEL_NAME)
            return (self::MODEL_NAME)::get();
        return null;
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

    public function getAllIds()
    {
        return (self::MODEL_NAME)::select('id')->get()->pluck('id')->toArray();
    }

    public function getRandomUser()
    {
        $userIds = $this->getAllIds();
        $randomUserId = array_rand($userIds,1);

        return (self::MODEL_NAME)::where('id', $randomUserId)->first();
    }

}
