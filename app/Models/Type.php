<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Type extends Model {
    protected $table = 'types';
    protected $fillable = ['name'];

    public static function allTypes(): Collection{
        return self::all();
    }
    public static function addType(string $data): bool{
        return (bool) self::create([
            'name' => $data
        ]);
    }

    public static function findType(int $id): Type | null{
        return self::find($id);
    }

    public static function editingType(string $name, int $id): int {
        return self::where('id', $id)->update(['name' => $name]);
    }
}