<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UsersApiRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UsersResource;
use App\Http\Services\UsersService;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class UsersController extends Controller
{
    protected $usersService;

    public function __construct(UsersService $usersService)
    {
        $this->usersService = $usersService;
    }

    public function index()
    {
        return new UsersResource($this->usersService->getAll());
    }

    public function store(UsersApiRequest $request)
    {
        $data = $request->only(['name', 'email', 'password']);
        User::create($data);

        return response()->json(null, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return new UserResource($this->usersService->getById($id));
    }

    public function update(UsersApiRequest $request, $id)
    {
        $data = $request->only(['name', 'email', 'password']);
        $this->usersService->updateById($id, $data);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function destroy($id)
    {
        $this->usersService->deleteById($id);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
