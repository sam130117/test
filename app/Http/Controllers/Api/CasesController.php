<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CasesApiRequest;
use App\Http\Resources\CaseResource;
use App\Http\Resources\CasesResource;
use App\Http\Services\CasesService;
use App\Models\Cases;
use App\Http\Controllers\Controller;
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
        return new CasesResource($this->casesService->getAll());
    }

    public function store(CasesApiRequest $request)
    {
        $data = $request->only(['title', 'client_email', 'website', 'country', 'user_id']);
        Cases::create($data);

        return response()->json(null, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return new CaseResource($this->casesService->getById($id));
    }

    public function update(CasesApiRequest $request, $id)
    {
        $data = $request->only(['title', 'client_email', 'website', 'country', 'user_id']);
        $this->casesService->updateById($id, $data);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function destroy($id)
    {
        $this->casesService->deleteById($id);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
