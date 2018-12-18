<?php

namespace App\Http\Services;


use App\Models\Cases;

class CasesService extends BaseService
{
    const MODEL_NAME = Cases::class;

    public function getCaseWithCards($id)
    {
        return Cases::with(['cards', 'user'])
            ->where('id', $id)
            ->first();
    }
}
