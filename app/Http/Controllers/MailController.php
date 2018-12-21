<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Jobs\SendMailJob;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class MailController extends Controller
{
    public function send(MailRequest $request): JsonResponse
    {
        $name = $request->get('name', null);
        $email = $request->get('email', null);
        $message = $request->get('message', null);
        $data = compact('name', 'email', 'message');

        $job = (new SendMailJob($data))->delay(Carbon::now()->addSeconds(5));
        dispatch($job);


        return response()->json(null, Response::HTTP_OK);
    }
}
