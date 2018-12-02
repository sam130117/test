<?php

namespace App\Http\Controllers;

use App\Http\Services\BaseService;

class CasesController extends Controller
{
    protected $casesService;
    public function __construct(BaseService $casesService)
    {
        $this->casesService = $casesService;
    }
}
