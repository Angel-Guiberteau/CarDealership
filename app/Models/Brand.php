<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model {

    protected $table = 'brands';
    protected $fillable = ['name'];

    public static function allBrands(): Collection{
        return self::all();
    }

    public static function brandExists(string $name): bool {
        return self::where('name', $name)->exists();
    }

    public static function createBrand(string $name): bool {
        return (bool) self::create(['name' => $name]);
    }

    public static function findBrand(int $id)
    {
        return self::find($id);
    }

    public static function editingBrand(string $name, int $id): int
    {
        return self::where('id', $id)->update(['name' => $name]);
    }
}
