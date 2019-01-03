<?php

namespace App\Http\Repositories;

use App\User;
use Carbon\Carbon;

class UsersRepository extends BaseRepository
{
    function model(): string
    {
        return User::class;
    }

    public function getAll()
    {
        if ($this->model)
            return $this->model::get();
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
        return $this->model::select('id')->get()->pluck('id')->toArray();
    }

    public function getRandomUser()
    {
        $userIds = $this->getAllIds();
        $randomUserId = array_rand($userIds,1);

        return $this->model::where('id', $randomUserId)->first();
    }

}
