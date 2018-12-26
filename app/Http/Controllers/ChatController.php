<?php

namespace App\Http\Controllers;

use App\Http\Services\UsersService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;

class ChatController extends Controller
{
    protected $userService;
    public function __construct(UsersService $userService)
    {
        $this->userService = $userService;
    }

    public function sendMessage(Request $request)
    {
        $redis = Redis::connection();
        $message = $request->get('message', null);
        $user = $this->userService->getRandomUser();

        $data = ['message' => $message, 'user' => $user];
        $redis->publish('message', json_encode($data));
        return response()->json(null, Response::HTTP_OK);
    }
}
