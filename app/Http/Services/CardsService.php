<?php

namespace App\Http\Services;

use App\Models\Cards;

class CardsService extends BaseService
{

    public function getById($id)
    {
        return Cards::getById($id);
    }

    public function getAll()
    {
        return Cards::paginate(self::LIMIT);
    }

    public function deleteById($id)
    {
        return Cards::deleteById($id);
    }

    public function updateById($id, array $data)
    {
        return Cards::updateById($id, $data);
    }
}
