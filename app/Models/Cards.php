<?php

namespace App\Models;

class Cards extends BaseModel
{
    const TYPE_CREDIT = 'credit';
    const TYPE_DEBIT = 'debit';

    protected $table = 'cards';

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

    protected $dates = [
        'created_at',
        'updated_at',
        'close_date',
    ];


    /* Relations */

    public function case()
    {
        return $this->belongsTo(Cases::class, 'case_id');
    }
}
