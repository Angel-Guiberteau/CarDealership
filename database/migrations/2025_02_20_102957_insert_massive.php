<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // Insert brands of cars.
        DB::table('brands')->insert([
            ['name' => 'Toyota'],
            ['name' => 'Ford'],
            ['name' => 'Honda'],
            ['name' => 'Chevrolet'],
            ['name' => 'Nissan'],
            ['name' => 'BMW'],
            ['name' => 'Mercedes-Benz'],
            ['name' => 'Volkswagen'],
            ['name' => 'Audi'],
            ['name' => 'Hyundai'],
            ['name' => 'Kia'],
            ['name' => 'Peugeot'],
            ['name' => 'Renault'],
            ['name' => 'Fiat'],
            ['name' => 'Mazda'],
        ]);

        // Insert colors of cars.
        DB::table('colors')->insert([
            ['name' => 'Rojo', 'hex' => '#FF0000'],
            ['name' => 'Azul', 'hex' => '#0000FF'],
            ['name' => 'Verde', 'hex' => '#008000'],
            ['name' => 'Negro', 'hex' => '#000000'],
            ['name' => 'Blanco', 'hex' => '#FFFFFF'],
            ['name' => 'Gris', 'hex' => '#808080'],
            ['name' => 'Plateado', 'hex' => '#C0C0C0'],
            ['name' => 'Amarillo', 'hex' => '#FFFF00'],
            ['name' => 'Naranja', 'hex' => '#FFA500'],
            ['name' => 'Marrón', 'hex' => '#A52A2A'],
            ['name' => 'Morado', 'hex' => '#800080'],
            ['name' => 'Rosa', 'hex' => '#FFC0CB'],
            ['name' => 'Dorado', 'hex' => '#FFD700'],
            ['name' => 'Beige', 'hex' => '#F5F5DC'],
            ['name' => 'Turquesa', 'hex' => '#40E0D0'],
        ]);

        // Insert types of cars.
        DB::table('types')->insert([
            ['name' => 'Sedán'],
            ['name' => 'Hatchback'],
            ['name' => 'SUV'],
            ['name' => 'Camioneta'],
            ['name' => 'Coupé'],
            ['name' => 'Convertible'],
            ['name' => 'Roadster'],
            ['name' => 'Minivan'],
            ['name' => 'Pickup'],
            ['name' => 'Deportivo'],
            ['name' => 'Furgoneta'],
            ['name' => 'Limusina'],
            ['name' => 'Monovolumen'],
            ['name' => 'Todoterreno'],
            ['name' => 'Wagon'],
        ]);

        // Insert cars.
        DB::table('cars')->insert([
            [
                'name' => 'Corolla',
                'brand_id' => 1, 
                'type_id' => 1, 
                'color_id' => 1,
                'horse_power' => 132.00,
                'year' => 2022,
                'sale' => true,
                'price' => 25000.00, // Added price
                'description' => 'Coche sedán con gran eficiencia de combustible.',
                'main_image' => 'toyota_corolla.jpg',
            ],
            [
                'name' => 'Focus',
                'brand_id' => 2,
                'type_id' => 1,
                'color_id' => 2,
                'horse_power' => 160.00,
                'year' => 2021,
                'sale' => true,
                'price' => 22000.00, // Added price
                'description' => 'Sedán con un manejo excelente.',
                'main_image' => 'ford_focus.jpg',
            ],
            [
                'name' => 'CR-V',
                'brand_id' => 3,
                'type_id' => 3,
                'color_id' => 3,
                'horse_power' => 190.00,
                'year' => 2023,
                'sale' => false,
                'price' => 35000.00, // Added price
                'description' => 'SUV con gran capacidad y tecnología avanzada.',
                'main_image' => 'honda_crv.jpg',
            ],
            [
                'name' => 'Silverado',
                'brand_id' => 4,
                'type_id' => 5, 
                'color_id' => 4,
                'horse_power' => 355.00,
                'year' => 2020,
                'sale' => true,
                'price' => 40000.00, // Added price
                'description' => 'Camioneta de carga con un motor potente.',
                'main_image' => 'chevrolet_silverado.jpg',
            ],
            [
                'name' => 'X5',
                'brand_id' => 6,
                'type_id' => 3,
                'color_id' => 5,
                'horse_power' => 335.00,
                'year' => 2022,
                'sale' => false,
                'price' => 60000.00, // Added price
                'description' => 'SUV de lujo con características premium.',
                'main_image' => 'bmw_x5.jpg',
            ],
            [
                'name' => 'A-Class',
                'brand_id' => 7,
                'type_id' => 1,
                'color_id' => 6,
                'horse_power' => 221.00,
                'year' => 2021,
                'sale' => true,
                'price' => 45000.00, // Added price
                'description' => 'Coche compacto de lujo con tecnología avanzada.',
                'main_image' => 'mercedes_benz_a_class.jpg',
            ],
        ]);
        
    }

    public function down(): void
    {
        // Delete data from table cars
        DB::table('cars')->whereIn('name', [
            'Corolla', 'Focus', 'CR-V', 'Silverado', 'X5', 'A-Class'
        ])->delete();

        // Delete data from table brands.
        DB::table('brands')->whereIn('name', [
            'Toyota', 'Ford', 'Honda', 'Chevrolet', 'Nissan', 'BMW', 
            'Mercedes-Benz', 'Volkswagen', 'Audi', 'Hyundai', 'Kia', 
            'Peugeot', 'Renault', 'Fiat', 'Mazda'
        ])->delete();

        // Delete data from table colors.
        DB::table('colors')->whereIn('name', [
            'Rojo', 'Azul', 'Verde', 'Negro', 'Blanco', 'Gris', 'Plateado',
            'Amarillo', 'Naranja', 'Marrón', 'Morado', 'Rosa', 'Dorado', 
            'Beige', 'Turquesa'
        ])->delete();

        // Delete data from table types.
        DB::table('types')->whereIn('name', [
            'Sedán', 'Hatchback', 'SUV', 'Camioneta', 'Coupé', 'Convertible', 
            'Roadster', 'Minivan', 'Pickup', 'Deportivo', 'Furgoneta', 
            'Limusina', 'Monovolumen', 'Todoterreno', 'Wagon'
        ])->delete();
        
    }
};
