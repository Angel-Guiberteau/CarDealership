<?php

namespace App\Models;

use App\Http\Controllers\CarController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarImage extends Model {

    protected $table = 'cars_images';
    protected $fillable = ['car_id', 'image'];

    public function car(): BelongsTo {
        return $this->belongsTo(Car::class, 'car_id');
    }

    public static function updateImage(CarImage $request): bool {
        return self::where('id', $request->id)->update(['image' => $request->image]);
    }

    public static function storeImage(CarImage $request): CarImage {
        return self::create([
            'car_id' => $request->car_id,  
            'image' => $request->image, 
        ]);
    }

    public static function deleteSecondaryImages(CarController $request): void {
        if (is_array($request->secondaryImageDeleted)) {
            CarImage::whereIn('id', $request->secondaryImageDeleted)->delete();
        }
    }

    public static function getImagesByIds(CarController $request) {
        return self::whereIn('id', $request->secondaryImageDeleted)->get();
    }

    public static function getSecondaryImagesByCarId(CarController $request) {
        return self::where('car_id', $request->id)->get();
    }

    public static function imageExists(CarImage $request): bool {
        return self::where('id', $request->car_id)->exists();
    }

}
