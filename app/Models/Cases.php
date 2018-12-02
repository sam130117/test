<?php

namespace App\Models;


class Cases extends BaseModel
{
   protected $fillable = [
       'title',
       'client_email',
       'website',
       'country',
       'user_id',
       'created_at',
       'updated_at',
   ];

    /* Relations */

    public function cards()
    {
        return $this->belongsToMany(Cards::getTableName(), 'case_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('user', 'id', 'user_id');
    }
}
