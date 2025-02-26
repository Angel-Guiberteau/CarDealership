<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model {
    
    protected $table = 'cars';
    protected $fillable = ['name', 'brand_id', 'type_id', 'color_id', 'price', 'horse_power', 'sale','year','description', 'main_image'];

    public function brand(): BelongsTo{
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function color(): BelongsTo{
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(CarImage::class, 'car_id');
    }

    public static function allCars(): Collection{
        return self::with(['brand', 'color'])->get();
    }

    public static function listCarsAdmin(): Collection{
        return self::join('brands', 'cars.brand_id', '=', 'brands.id')
            ->join('types', 'cars.type_id', '=', 'types.id')
            ->join('colors', 'cars.color_id', '=', 'colors.id')
            ->select('cars.*', 
                'brands.name as brand_name', 
                'types.name as type_name', 
                'colors.name as color_name', 
                'colors.hex as color_hex')
            ->get();
    }

    public static function getTech(): Collection{
        return self::join('brands', 'cars.brand_id', '=', 'brands.id')
                ->join('types', 'cars.type_id', '=', 'types.id')
                ->join('colors', 'cars.color_id', '=', 'colors.id')
                ->select(
                    'cars.*', 
                    'brands.name as brand_name', 
                    'types.name as type_name', 
                    'colors.name as color_name', 
                    'colors.hex as color_hex'
                )
                ->where('cars.id', 17)
                ->get();

    }

    public static function deleteCar(int $id): bool{
        return self::where('id', $id)->delete();
    }
    // Modelo Car
    public static function createCar(array $data)
    {
        return self::create([
            'brand_id' => $data['brand'],
            'name' => $data['model'],
            'color_id' => $data['color'],
            'type_id' => $data['type_id'], 
            'price' => $data['price'],
            'horse_power' => $data['horse_power'],
            'sale' => $data['sale'],
            'main_image' => $data['main_image'],
            'year' => $data['year'], 
            'description' => $data['description'], 
        ]);
    }



}
