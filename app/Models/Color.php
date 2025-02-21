<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Color extends Model {

    protected $table = 'colors';
    protected $fillable = ['name', 'hex'];

    public static function allColors():Collection{
        return self::all();
    }
    public static function addColor($data){
        return self::create([
            'name' => $data['name'],
            'hex' => $data['color']
        ]);
    }
}
