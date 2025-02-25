<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Type;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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
                ->with('cars', Car::listCarsAdmin())
                ->with('brands', Brand::allBrands())
                ->with('colors', Color::allColors())
                ->with('types', Type::allTypes());
    }

    public static function getTech(): View{
        return view('tech_sheet.tech_sheet')
                ->with('cars', Car::getTech());
    }

    public static function deleteCar(int $id): RedirectResponse{
        $car = Car::deleteCar($id);

        if ($car) {
            return redirect()->route('admin')->with('success', 'Car deleted successfully');
        }

        return redirect()->route('admin')->with('error', 'Error deleting car');
    }

}
