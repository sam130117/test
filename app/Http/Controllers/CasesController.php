<?php

namespace App\Http\Controllers;

use App\Http\Services\CasesService;
use App\Models\Cases;
use Illuminate\Http\JsonResponse;

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
        return response()->json(['case' => $case]);
    }

}
