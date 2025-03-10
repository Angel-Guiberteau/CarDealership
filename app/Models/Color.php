<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Color extends Model {

    protected $table = 'colors';
    protected $fillable = ['name', 'hex'];

    public function allColors(): Collection{
        return self::all();
    }
    public function addColor(array $data): bool{
        return (bool) $this->create([
            'name' => $data['name'],
            'hex' => $data['hex']
        ]);
    }
    public function findColor(int $id){
        return self::find($id);
    }

    public function editingColor(string $name, int $id, string $hex): int {
        $color = self::find($id);

        if($color->name != $name)
            $color->name = $name;

        if($color->hex != $hex)
            $color->hex = $hex;

        return $color->update();
    }
}
