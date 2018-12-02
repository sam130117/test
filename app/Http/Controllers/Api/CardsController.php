<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CardResource;
use App\Http\Resources\CardsResource;
use App\Http\Services\CardsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return new CardResource($this->cardsService->getById($id));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $this->cardsService->deleteById($id);
    }
}
