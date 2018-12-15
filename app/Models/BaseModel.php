<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    const LIMIT = 20;

    public static function getTableName()
    {
        return (new static())->getTable();
    }

}
