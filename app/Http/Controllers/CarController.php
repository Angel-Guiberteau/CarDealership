<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Type;
use App\Models\CarImage;
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

    public static function addCar(): RedirectResponse
    {
        $request = request();

        $validatedData = $request->validate([
            'brand' => 'required|exists:brands,id',
            'model' => 'required|string|max:20',
            'color' => 'required|exists:colors,id',
            'type_id' => 'required|exists:types,id',
            'price' => 'required|numeric|min:0|max:120000',
            'horse_power' => 'required|numeric|min:0|max:1000', 
            'offer' => 'nullable',
            'main_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'secondary_images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'year' => 'required|digits:4|integer|min:1900|max:2099',
            'description' => 'nullable|string|max:255', 
        ]);

        $validatedData['sale'] = $request->has('offer') ? 1 : 0;
        $validatedData['name'] = $validatedData['model'];

        $mainImageName = 'main_' . time() . '.' . $request->file('main_image')->extension();

        $request->file('main_image')->storeAs('img/'.$validatedData['model'], $mainImageName, 'public');

        $mainImagePath = $validatedData['model'].'/'.$mainImageName;

        $validatedData['main_image'] = $mainImagePath;

        $validatedData['year'] = $request->input('year');
        $car = Car::createCar($validatedData);

        if (!$car) {
            return redirect()->route('admin')->with('error', 'Error al agregar el coche.');
        }

        if ($request->hasFile('secondary_images')) {
            foreach ($request->file('secondary_images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->extension();
                $imagePath = 'img/'.$validatedData['model'].'/'.$imageName;
                $image->storeAs('img/'.$validatedData['model'], $imageName, 'public');

                CarImage::storeImage($car->id, $imagePath);
            }
        }

        return redirect()->route('admin')->with('success', 'Coche agregado correctamente.');
    }

}
