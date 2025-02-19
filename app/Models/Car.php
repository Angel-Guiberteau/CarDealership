<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model {
    protected $fillable = ['name','brand_id', 'type_car_id', 'color_id', 'year','sale','price', 'description', 'main_image'];
}
