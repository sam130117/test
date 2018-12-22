<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $redis = Redis::connection();
        $data = ['message' => $request->input('message'), 'user' => $request->input('user')];
        $redis->publish('message', json_encode($data));
        return response()->json([]);
    }
}
