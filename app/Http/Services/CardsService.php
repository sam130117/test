<?php

namespace App\Http\Services;

use App\Models\Cards;

class CardsService extends BaseService
{

    public function getById($id)
    {
        return Cards::where('id', $id)->first();
    }

    public function getAll()
    {
        return Cards::paginate(self::LIMIT);
    }

    public function deleteById($id)
    {
        return Cards::where('id', $id)
            ->delete();
    }

    public function updateById($id, array $data)
    {
        return Cards::where('id', $id)
            ->update($data);
    }
}
