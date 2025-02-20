<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Car extends Model {

    protected $table = 'cars';
    protected $fillable = ['name','brand_id', 'type_car_id', 'color_id', 'year','sale','price', 'description', 'main_image'];

    public static function allCars(): Collection{
        return Car::all();
    }
}
