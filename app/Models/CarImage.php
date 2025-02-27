<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarImage extends Model {

    protected $table = 'cars_images';
    protected $fillable = ['car_id', 'image'];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

    public static function storeImage(int $carId, string $imagePath): CarImage
    {
        return self::create([
            'car_id' => $carId,  
            'image' => $imagePath, 
        ]);
    }


}
