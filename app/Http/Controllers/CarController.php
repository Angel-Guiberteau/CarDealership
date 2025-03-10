<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Type;
use App\Models\CarImage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\UpdateCarRequest;
use App\Http\Requests\StoreCarRequest;


class CarController extends Controller
{
    private Car $carModel;
    private Brand $brandModel;
    private Color $colorModel;
    private Type $typeModel;
    private CarImage $carImageModel;

    public function __construct()
    {
        $this->carModel = new Car();
        $this->brandModel = new Brand();
        $this->colorModel = new Color();
        $this->typeModel = new Type();
        $this->carImageModel = new CarImage();
    }

    public function index(): View
    {
        return view('Home.home', [
            'cars' => $this->carModel->allCars(),
            'brands' => $this->brandModel->allBrands(),
            'colors' => $this->colorModel->allColors(),
        ]);
    }

    public function listCars(): View
    {
        return view('adminpanel.cars', [
            'cars' => $this->carModel->listCarsAdmin(),
            'brands' => $this->brandModel->allBrands(),
            'colors' => $this->colorModel->allColors(),
            'types' => $this->typeModel->allTypes(),
        ]);
    }

    public function getTech(int $id): View
    {
        return view('tech_sheet.tech_sheet', [
            'cars' => $this->carModel->getTech($id),
        ]);
    }

    public function deleteCar(int $id): RedirectResponse
    {
        $car = $this->carModel->getCarById($id);

        if (!$car) {
            return redirect()->route('admin')->with('error', 'Coche no encontrado.');
        }

        // Delete main image
        if ($car->main_image) {
            Storage::disk('public')->delete('img/' . $car->main_image);
        }

        // Delete secondary images
        $secondaryImages = $this->carImageModel->getSecondaryImagesByCarId($id);
        foreach ($secondaryImages as $image) {
            Storage::disk('public')->delete('img/' . $image->image);
        }

        // Delete car
        if ($this->carModel->deleteCar($id)) {
            return redirect()->route('admin')->with('success', 'Coche eliminado correctamente.');
        }

        return redirect()->route('admin')->with('error', 'Error al eliminar el coche.');
    }

    public function addCar(StoreCarRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $validatedData['sale'] = $request->has('sale') ? 1 : 0;
        $validatedData['name'] = $validatedData['model'];

        // Process main image
        if ($request->hasFile('main_image')) {
            $mainImageName = 'main_' . time() . '.' . $request->file('main_image')->extension();
            $request->file('main_image')->storeAs('img/', $mainImageName, 'public');
            $validatedData['main_image'] = $mainImageName;
        }

        $car = $this->carModel->createCar($validatedData);

        if (!$car) {
            return redirect()->route('admin')->with('error', 'Error al agregar el coche.');
        }

        // Handle secondary images
        if ($request->hasFile('secondary_images')) {
            foreach ($request->file('secondary_images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->extension();
                $image->storeAs('img/', $imageName, 'public');

                $this->carImageModel->storeImage($car->id, $imageName);
            }
        }

        return redirect()->route('admin')->with('success', 'Coche agregado correctamente.');
    }

    public function getCar(int $id): JsonResponse
    {
        $car = $this->carModel->findWithImages($id);
        return response()->json($car);
    }

    public function updateCar(UpdateCarRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $id = $request->input('car_id');
        $validatedData['sale'] = $request->has('sale') ? 1 : 0;
        $validatedData['name'] = $validatedData['model'];

        // Process main image if provided
        if ($request->hasFile('main_image')) {
            $mainImageName = 'main_' . time() . '.' . $request->file('main_image')->extension();
            $request->file('main_image')->storeAs('img/', $mainImageName, 'public');
            $validatedData['main_image'] = $mainImageName;
        }

        // Update car information
        $updated = $this->carModel->updateCar($id, $validatedData);

        if (!$updated) {
            return redirect()->route('admin')->with('error', 'Coche no encontrado o error al actualizar.');
        }

        // Handle deleted images
        if ($request->has('deleted_images')) {
            $deletedImages = explode(',', $request->input('deleted_images'));
            $deletedImages = array_filter($deletedImages);

            // Get and delete images from storage
            $imagesToDelete = $this->carImageModel->getImagesByIds($deletedImages);
            $this->carImageModel->deleteSecondaryImages($deletedImages);

            foreach ($imagesToDelete as $image) {
                Storage::disk('public')->delete('img/' . $image->image);
            }
        }

        // Handle secondary images
        if ($request->hasFile('secondary_images')) {
            foreach ($request->file('secondary_images') as $imageId => $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->extension();
                $image->storeAs('img/', $imageName, 'public');

                // Update or store secondary images
                if ($this->carImageModel->imageExists($imageId)) {
                    $this->carImageModel->updateImage($imageId, $imageName);
                } else {
                    $this->carImageModel->storeImage($id, $imageName);
                }
            }
        }

        return redirect()->route('admin')->with('success', 'Coche actualizado correctamente.');
    }
}
