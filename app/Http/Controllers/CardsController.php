<?php

namespace App\Http\Controllers;

use App\Http\Services\CardsService;

class CardsController extends Controller
{
    protected $cardsService;
    public function __construct(CardsService $cardsService)
    {
        $this->cardsService = $cardsService;
    }
}
