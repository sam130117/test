<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CardsApiRequest;
use App\Http\Resources\CardResource;
use App\Http\Resources\CardsResource;
use App\Http\Services\CardsService;
use App\Models\Cards;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

class CardsController extends Controller
{
    protected $cardsService;
    public function __construct(CardsService $cardsService)
    {
        $this->cardsService = $cardsService;
    }

    public function index()
    {
        return new CardsResource($this->cardsService->getAll());
    }

    public function store(CardsApiRequest $request)
    {
        $data = $request->only(['name', 'last_number', 'total_value', 'card_type', 'close_date', 'case_id']);
        Cards::create($data);

        return response()->json(null, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return new CardResource($this->cardsService->getById($id));
    }

    public function update(CardsApiRequest $request, $id)
    {
        $data = $request->only(['name', 'last_number', 'total_value', 'card_type', 'close_date', 'case_id']);
        $this->cardsService->updateById($id, $data);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function destroy($id)
    {
        $this->cardsService->deleteById($id);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
