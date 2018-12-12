<?php

namespace App\Http\Services;


use App\Models\Cases;

class CasesService extends BaseService
{

    public function getById($id)
    {
        return Cases::getById($id);
    }

    public function updateById($id, array $data)
    {
        return Cases::updateById($id, $data);
    }

    public function deleteById($id)
    {
        return Cases::deleteById($id);
    }

    public function getAll()
    {
        return Cases::with(['user', 'cards'])->paginate(self::LIMIT);
    }

}
