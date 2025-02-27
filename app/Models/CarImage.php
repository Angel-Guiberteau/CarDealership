<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    public static function deleteSecondaryImages(array $imageIds): JsonResponse
    {
        if (is_array($imageIds)) {
            foreach ($imageIds as $imageId) {
                CarImage::where('id', $imageId)->delete();
            }
        }

        return response()->json(['success' => true]);
    }

}
