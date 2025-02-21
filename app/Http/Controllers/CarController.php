<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Color;
use Illuminate\Contracts\View\View;

class CarController extends Controller
{
    public static function index(): View{
        return view('Home.home')
                ->with('cars', Car::allCars())
                ->with('brands', Brand::allBrands())
                ->with('colors', Color::allColors());
    }

    public static function listCars(): View{
        return view('adminpanel.cars')
                ->with('cars', Car::listCarsAdmin());
    }

    public static function getTech(): View{
        return view('tech_sheet.tech_sheet')
                ->with('cars', Car::getTech());
    }
}
