<?php

namespace App\Http\Repositories;


use App\Models\Cases;

class CasesRepository extends BaseRepository
{
    function model(): string
    {
        return Cases::class;
    }
    
    public function getAll()
    {
        $search = request()->get('search', null);
        $query = $this->model::select('id', 'title');
        if ($search)
            $query->where('title', 'LIKE', "%$search%");
        return $query->paginate();
    }

    public function getCaseWithCards($id)
    {
        return $this->model::with(['cards', 'user'])
            ->where('id', $id)
            ->first();
    }

    public function updateByIdWithCards($id, array $caseData, ?array $cardsData)
    {
        $case = $this->model::with('cards')->find($id);
        $case->fill($caseData);
        $case->save();

        if ($cardsData)
            foreach ($case->cards as $index => $card)
                $card->fill($cardsData[$index])->save($cardsData[$index]);

        return $case;
    }
}
