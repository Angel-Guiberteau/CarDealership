<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mapa extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'ciudad', 'precio_83', 'precio_84', 'precio_bulk',
        'cantidad_bulk', 'total_inversion', 'profit',
        'profit_ciudad_cara', 'profit_x_bulk', 'profit_x_bulk_ciudad_cara'
    ];
}
