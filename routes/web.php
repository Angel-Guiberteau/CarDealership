<?php

use App\Http\Controllers\CarController;

use App\Http\Controllers\BrandController;

use App\Http\Controllers\TypeController;

use App\Http\Controllers\ColorController;
use App\Models\Car;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Response;

Route::get('/', [CarController::class,'index'])->name('home');

Route::get('/admin', function () {
    return CarController::listCars();
})->name('admin');

Route::get('/brand', [BrandController::class,'index'])->name('brand');

Route::get('/types', [TypeController::class,'index'])->name('types');

Route::get('/colors', [ColorController::class,'index'])->name('colors');

Route::get('/deleteBrand/{id}', [BrandController::class, 'deleteBrand'])->name('brandDeleted');

Route::get('/deleteType/{id}', [TypeController::class, 'deleteType'])->name('typeDeleted');

Route::get('/deleteCar/{id}', function (int $id): RedirectResponse {
    return CarController::deleteCar($id);
})->name('deleteCar');

Route::get('/tech', function () {
    return CarController::getTech();
})->name('tech');

// POST

Route::post('/addColor', [ColorController::class, 'addColor'])->name('addColor');

Route::post('/createBrand', [BrandController::class,'createBrand'])->name('brandCreated');

Route::post('/addType', [TypeController::class, 'addType'])->name('addType');

Route::post('/addCar', function (): RedirectResponse {
    return CarController::addCar();
})->name('addCar');

// PUT

Route::put('/updateBrand/', [BrandController::class, 'updateBrand'])->name('brandUpdated');

Route::put('/updateType/', [TypeController::class, 'updateType'])->name('typeUpdated');

Route::get('/img/{main_image}', function ($main_image) {
    $path = storage_path('app/public/img/' . $main_image);

    if (!file_exists($path)) {
        abort(404);
    }

    $file = file_get_contents($path);
    $type = mime_content_type($path);

    return Response::make($file, 200)->header('Content-Type', $type);
})->name('image');


