<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Type;
use App\Models\CarImage;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Symfony\Component\Routing\Loader\Configurator\CollectionConfigurator;

class CarsController extends Controller {
    
    public ?string $type = NULL; 
    
    public function __construct(?string $type = NULL) {
        
        $this->type = $type;

    }

    public function checkType(): Collection{

        if ($this->type == 'listCars') {
            return $this->listCars();
        }

        return $this->index();


    }

    public function index(): Collection
    {
        
        $cars = Car::allCars()->map(function ($car): CarController {

            $carController = new CarController();
            
            $carController->setId($car->id);
            $carController->setBrand($car->brand);
            $carController->setType($car->type);
            $carController->setColor($car->color);
            $carController->setName($car->name);
            $carController->setYear($car->year);
            $carController->setHorsepower($car->horse_power);
            $carController->setPrice($car->price);
            $carController->setMainImg($car->main_image);
            $carController->setSale($car->sale);
            $carController->setDescription($car->description);

            return $carController;

        });
    
        return $cars;
    }

    public function listCars(): Collection
    {
        
        $cars = Car::allCars()->map(function ($car): CarController {

            $carController = new CarController();
            
            $carController->setId($car->id);
            $carController->setBrand($car->brand);
            $carController->setType($car->type);
            $carController->setColor($car->color);
            $carController->setName($car->name);
            $carController->setYear($car->year);
            $carController->setHorsepower($car->horse_power);
            $carController->setPrice($car->price);
            $carController->setMainImg($car->main_image);
            $carController->setSale($car->sale);
            $carController->setDescription($car->description);

            return $carController;

        });

        return $cars;
    }
}
