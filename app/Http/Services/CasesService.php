<?php
namespace App\Http\Services;


use App\Models\Cases;

class CasesService extends BaseService
{

    public function getById($id)
    {
        return Cases::where('id', $id)->first();
    }

    public function getAll()
    {
        dd(Cases::with('cards')->get()->toArray());
        return Cases::select('*')->get();
    }

    public function deleteById($id)
    {
        return Cases::where('id', $id)->delete();
    }
}
