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
    public Car $carModel;
    public Brand $brandModel;
    public Color $colorModel;
    public Type $typeModel;
    public CarImage $carImageModel;

    //Properties 

    public ?int $id = NULL;
    public ?Brand $brand = NULL;
    public ?Type $type = NULL;
    public ?Color $color = NULL;
    public ?string $name = NULL;
    public ?int $year = NULL;
    public ?float $horsepower = NULL;
    public ?float $price = NULL;
    public ?string $main_img = NULL;
    public ?string $sale = NULL;

    public function __construct()
    {
        $this->carModel = new Car();
        $this->brandModel = new Brand();
        $this->colorModel = new Color();
        $this->typeModel = new Type();
        $this->carImageModel = new CarImage();
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

    // Getters and Setters

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getBrand(): ?Brand {
        return $this->brand;
    }

    public function setBrand(Brand $brand): void {
        $this->brand = $brand;
    }

    public function getType(): ?Type {
        return $this->type;
    }

    public function setType(?Type $type): void {
        $this->type = $type;
    }

    public function getColor(): ?Color {
        return $this->color;
    }

    public function setColor(Color $color): void {
        $this->color = $color;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function setName(?string $name): void {
        $this->name = $name;
    }

    public function getYear(): ?int {
        return $this->year;
    }

    public function setYear(?int $year): void {
        $this->year = $year;
    }

    public function getHorsepower(): ?float {
        return $this->horsepower;
    }

    public function setHorsepower(?float $horsepower): void {
        $this->horsepower = $horsepower;
    }

    public function getPrice(): ?float {
        return $this->price;
    }

    public function setPrice(?float $price): void {
        $this->price = $price;
    }

    public function getMainImg(): ?string {
        return $this->main_img;
    }

    public function setMainImg(?string $main_img): void {
        $this->main_img = $main_img;
    }

    public function getSale(): ?string {
        return $this->sale;
    }

    public function setSale(?string $sale): void {
        $this->sale = $sale;
    }

    
}
