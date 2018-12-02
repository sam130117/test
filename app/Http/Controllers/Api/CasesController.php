<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CaseResource;
use App\Http\Resources\CasesResource;
use App\Http\Services\CasesService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CasesController extends Controller
{
    protected $casesService;
    public function __construct(CasesService $casesService)
    {
        $this->casesService = $casesService;
    }

    public function index()
    {
        return new CasesResource($this->casesService->getAll());
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return new CaseResource($this->casesService->getById($id));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $this->casesService->deleteById($id);
    }
}
