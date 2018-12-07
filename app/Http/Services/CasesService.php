<?php

namespace App\Http\Services;


use App\Models\Cases;

class CasesService extends BaseService
{

    public function getById($id)
    {
        return Cases::where('id', $id)
            ->first();
    }

    public function getAll()
    {
        return Cases::paginate(self::LIMIT);
    }

    public function deleteById($id)
    {
        return Cases::where('id', $id)
            ->delete();
    }

    public function updateById($id, array $data)
    {
        return Cases::where('id', $id)
            ->update($data);
    }
}
