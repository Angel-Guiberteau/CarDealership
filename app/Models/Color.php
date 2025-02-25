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
    public static function addColor($data): bool{
        return (bool) self::create([
            'name' => $data['name'],
            'hex' => $data['hex']
        ]);
    }
    public static function findColor($id){
        return self::find($id);
    }

    public static function editingColor(string $name, int $id): int {
        return self::where('id', $id)->update(['name' => $name]);
    }
}
