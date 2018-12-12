<?php

namespace App;

use App\Models\Cases;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /* Relations */

    public function cases()
    {
        return $this->hasMany(Cases::getTableName(), 'user_id');
    }

    /* Attributes */

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public static function getById($id)
    {
        $instance = self::where('id', $id)->first();
        if(!$instance)
            throw new ModelNotFoundException();
        return $instance;
    }

    public static function updateById($id, array $data)
    {
        return self::where('id', $id)->update($data);
    }

    public static function deleteById($id)
    {
        return self::where('id', $id)->delete();
    }

}
