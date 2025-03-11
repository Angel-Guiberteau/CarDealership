<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Color;
use Illuminate\Contracts\View\View;

class CarsController extends Controller
{
    public function index(): View
    {

        $carController = new CarController();

        $brands = $carController->brandModel->allBrands();
        $colors = $carController->colorModel->allColors();
        
        $cars = $carController->carModel->allCars()->map(function ($car): CarController {
            $carController = new CarController();
            
            $carController->setId($car->id);
            $carController->setBrand($car->brand);
            $carController->setType($car->type);
            $carController->setColor($car->color);
            $carController->setName($car->name);
            $carController->setYear($car->year);
            $carController->setHorsepower($car->horsepower);
            $carController->setPrice($car->price);
            $carController->setMainImg($car->main_img);
            $carController->setSale($car->sale);
            return $carController;
        });


        return view('home.home')
                    ->with('cars', $cars)
                    ->with('brands', $brands)
                    ->with('colors', $colors);
    }

    public function listCars(): View
    {
        $carController = new CarController();

        return view('adminpanel.cars', [
            'cars' => $carController->carModel->listCarsAdmin(),
            'brands' => $carController->brandModel->allBrands(),
            'colors' => $carController->colorModel->allColors(),
            'types' => $carController->typeModel->allTypes(),
        ]);
    }
}
