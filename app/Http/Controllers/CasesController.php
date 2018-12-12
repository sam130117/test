<?php

namespace App\Http\Controllers;

use App\Http\Services\CasesService;

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

}
