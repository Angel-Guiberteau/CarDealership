<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Type extends Model {
    protected $table = 'types';
    protected $fillable = ['name'];

    public static function allTypes():Collection{
        return self::all();
    }
}