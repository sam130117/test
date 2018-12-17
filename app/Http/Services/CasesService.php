<?php

namespace App\Http\Services;


use App\Models\Cases;

class CasesService extends BaseService
{
    const MODEL_NAME = Cases::class;

    public function getCaseWithCards($id)
    {
        return Cases::with(['cards'])
            ->where('id', $id)
            ->first();
    }
}
