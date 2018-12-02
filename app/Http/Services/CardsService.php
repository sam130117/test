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
        return Cards::all();
    }

    public function deleteById($id)
    {
        return Cards::where('id', $id)->delete();
    }
}
