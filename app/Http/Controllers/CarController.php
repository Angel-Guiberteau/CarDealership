<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Type;
use App\Models\CarImage;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Js;
use Illuminate\Support\Facades\Storage;

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

    public static function getTech(int $id): View {
        return view('tech_sheet.tech_sheet')
                ->with('cars', Car::getTech($id));
    }
    

    public static function deleteCar(int $id): RedirectResponse
    {
        $car = Car::getCarById($id);

        if (!$car) {
            return redirect()->route('admin')->with('error', 'Coche no encontrado.');
        }

        if ($car->main_image) {
            Storage::disk('public')->delete('img/' . $car->main_image);
        }

        $secondaryImages = CarImage::getSecondaryImagesByCarId($id);

        foreach ($secondaryImages as $image) {
            Storage::disk('public')->delete('img/' . $image->image);
        }

        if (Car::deleteCar($id)) {
            return redirect()->route('admin')->with('success', 'Coche eliminado correctamente.');
        }

        return redirect()->route('admin')->with('error', 'Error al eliminar el coche.');
    }

    public static function addCar(): RedirectResponse
    {
        $request = request();

        $validatedData = $request->validate([
            'brand' => 'required|exists:brands,id',
            'model' => 'required|string|max:20',
            'color' => 'required|exists:colors,id',
            'type_id' => 'required|exists:types,id',
            'price' => 'required|numeric|min:0|max:1200000',
            'horse_power' => 'required|numeric|min:0|max:1000', 
            'sale' => 'nullable',
            'main_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'secondary_images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'year' => 'required|digits:4|integer|min:1900|max:2099',
            'description' => 'nullable|string|max:255', 
        ]);

        $validatedData['sale'] = $request->has('sale') ? 1 : 0;
        $validatedData['name'] = $validatedData['model'];

        $mainImageName = 'main_' . time() . '.' . $request->file('main_image')->extension();

        $request->file('main_image')->storeAs('img/', $mainImageName, 'public');

        $mainImagePath = $mainImageName;

        $validatedData['main_image'] = $mainImagePath;

        $validatedData['year'] = $request->input('year');

        $car = Car::createCar($validatedData);

        if (!$car) {
            return redirect()->route('admin')->with('error', 'Error al agregar el coche.');
        }

        if ($request->hasFile('secondary_images')) {
            foreach ($request->file('secondary_images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->extension();
                $imagePath = $imageName;
                $image->storeAs('img/', $imageName, 'public');

                CarImage::storeImage($car->id, $imagePath);
            }
        }

        return redirect()->route('admin')->with('success', 'Coche agregado correctamente.');
    }

    public static function getCar($id): JsonResponse
    {
        $car = Car::findWithImages($id);
        return response()->json($car);
    }

    public static function updateCar(Request $request): RedirectResponse
    {
        $request = request();
        $id = $request->input('car_id');
    
        $validatedData = $request->validate([
            'brand' => 'required|exists:brands,id',
            'model' => 'required|string|max:20',
            'color' => 'required|exists:colors,id',
            'type_id' => 'required|exists:types,id',
            'price' => 'required|numeric|min:0|max:120000',
            'horse_power' => 'required|numeric|min:0|max:1000',
            'sale' => 'nullable',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'secondary_images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'year' => 'required|digits:4|integer|min:1900|max:2099',
            'description' => 'nullable|string|max:255',
        ]);
    
        $validatedData['sale'] = $request->has('sale') ? 1 : 0;
        $validatedData['name'] = $validatedData['model'];
    
        if ($request->hasFile('main_image')) {
            $mainImageName = 'main_' . time() . '.' . $request->file('main_image')->extension();
            $request->file('main_image')->storeAs('img/', $mainImageName, 'public');
            $validatedData['main_image'] = $mainImageName;
        }
    
        $updated = Car::updateCar($id, $validatedData);
    
        if (!$updated) {
            return redirect()->route('admin')->with('error', 'Coche no encontrado o error al actualizar.');
        }
    
        if ($request->has('deleted_images')) {
            $deletedImages = explode(',', $request->input('deleted_images'));
            $deletedImages = array_filter($deletedImages);
    
            $imagesToDelete = CarImage::getImagesByIds($deletedImages);
    
            CarImage::deleteSecondaryImages($deletedImages);
    
            foreach ($imagesToDelete as $image) {
                Storage::disk('public')->delete('img/' . $image->image);
            }
        }
    
        if ($request->hasFile('secondary_images')) {
            foreach ($request->file('secondary_images') as $imageId => $image) {
                if (CarImage::imageExists($imageId)) { 
                    $imageName = time() . '_' . uniqid() . '.' . $image->extension();
                    $image->storeAs('img/', $imageName, 'public');
    
                    
                    CarImage::updateImage($imageId, $imageName);
                } else { 
                    $imageName = time() . '_' . uniqid() . '.' . $image->extension();
                    $image->storeAs('img/', $imageName, 'public');
                    CarImage::storeImage($id, $imageName);
                }
            }
        }
    
        return redirect()->route('admin')->with('success', 'Coche actualizado correctamente.');
    }

}
