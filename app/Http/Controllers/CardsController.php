<?php

namespace App\Http\Controllers;

use App\Http\Services\CardsService;
use App\Models\Cards;

class CardsController extends Controller
{
    protected $cardsService;

    public function __construct(CardsService $cardsService)
    {
        $this->cardsService = $cardsService;
    }

    public function index()
    {
        return view('index');
    }

    public function getCard(Cards $card)
    {
        return response()->json(['card' => $card]);
    }

    public function getCards()
    {
        $cards = $this->cardsService->getAll();
        return response()->json(['cards' => $cards]);
    }
}
