<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\CaseWithCardsRequest;
use App\Http\Repositories\CasesRepository;
use App\Http\Repositories\UsersRepository;
use App\Models\Cases;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;


class CasesController extends Controller
{
    protected $casesService;

    public function __construct(CasesRepository $casesService)
    {
        $this->casesService = $casesService;
    }

    public function index()
    {
        return view('index');
    }

    public function getCases(Request $request)
    {
        $cases = $this->casesService->getAll();
        return response()->json(['cases' => $cases], Response::HTTP_OK);
    }

    public function getCase($id): JsonResponse
    {
        $case = $this->casesService->getCaseWithCards($id);
        $users = (new UsersRepository())->getAll();

        return response()->json(['case' => $case, 'users' => $users]);
    }

    public function store(CaseWithCardsRequest $request): JsonResponse
    {
        $caseId = $request->get('id');
        $caseData = $request->only([ 'title', 'client_email', 'website', 'country', 'user_id']);
        $cardsData = $request->only('cards');
        $this->casesService->updateByIdWithCards($caseId, $caseData, $cardsData['cards'] ?? null);

        return response()->json(null, Response::HTTP_OK);
    }

    public function destroy(Cases $case): JsonResponse
    {
        $this->casesService->deleteById($case->id);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

}