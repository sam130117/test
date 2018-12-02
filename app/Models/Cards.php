<?php

namespace App\Models;

class Cards extends BaseModel
{
    protected $fillable = [
        'name',
        'last_number',
        'total_value',
        'card_type',
        'close_date',
        'case_id',
        'created_at',
        'updated_at',
    ];

    const TYPE_CREDIT = 'credit';
    const TYPE_DEBIT = 'debit';

    protected $table = 'cards';

    /* Relations */

    public function case()
    {
        return $this->belongsTo(Cases::getTableName(), 'case_id');
    }
}
