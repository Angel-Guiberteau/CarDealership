<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comida extends Model
{
    use HasFactory;

    protected $table = 'comidas';

    protected $fillable = [
        'nombre',
        'item_id',
        'tier',
        'receta',
        'precio',
    ];

    // Método para actualizar el precio desde la API
    public static function actualizarPrecio($item_id, $precio)
    {
        $comida = self::where('item_id', $item_id)->first();

        if ($comida) {
            $comida->precio = $precio;
            $comida->save();
        } else {
            // Si no existe, opcionalmente lo insertamos con valores mínimos
            self::create([
                'item_id' => $item_id,
                'precio' => $precio,
                'nombre' => $item_id, // Nombre provisional
                'tier' => '-',         // Si no tienes tier aún
                'receta' => null,
            ]);
        }
    }
}
