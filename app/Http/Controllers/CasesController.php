<?php

namespace App\Http\Controllers;

use App\Http\Requests\CaseWithCardsRequest;
use App\Http\Services\CasesService;
use App\Http\Services\UsersService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CasesController extends Controller
{
    protected $casesService;
    public function __construct(CasesService $casesService)
    {
        $this->casesService = $casesService;
    }

    public function index()
    {
        return view('index');
    }

    public function getCase($id): JsonResponse
    {
        $case = $this->casesService->getCaseWithCards($id);
        $users = (new UsersService())->getAll();
        return response()->json(['case' => $case, 'users' => $users]);
    }

    public function store(CaseWithCardsRequest $request): JsonResponse
    {
        $case = $request->get('case', null);
        return response()->json(null, Response::HTTP_OK);
    }

}
