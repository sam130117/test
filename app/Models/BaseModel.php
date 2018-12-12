<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BaseModel extends Model
{
    public static function getTableName()
    {
        return (new static())->getTable();
    }

    public static function getById($id)
    {
        $instance = static::where('id', $id)->first();
        if (!$instance)
            throw new ModelNotFoundException();
        return $instance;
    }

    public static function updateById($id, array $data)
    {
        return static::where('id', $id)->update($data);;
    }

    public static function deleteById($id)
    {
        return static::where('id', $id)->delete();
    }
}
