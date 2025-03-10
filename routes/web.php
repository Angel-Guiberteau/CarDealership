<?php

use App\Http\Controllers\CarController;

use App\Http\Controllers\BrandController;

use App\Http\Controllers\TypeController;

use App\Http\Controllers\ColorController;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Response;

Route::get('/', [CarController::class,'index'])->name('home');

Route::get('/admin', [CarController::listCars()])->name('admin');

Route::get('/brand', [BrandController::class,'index'])->name('brand');

Route::get('/types', [TypeController::class,'index'])->name('types');

Route::get('/colors', [ColorController::class,'index'])->name('colors');

Route::get('/deleteBrand/{id}', [BrandController::class, 'deleteBrand'])->name('brandDeleted');

Route::get('/deleteType/{id}', [TypeController::class, 'deleteType'])->name('typeDeleted');

Route::get('/deleteColor/{id}', [ColorController::class, 'deleteColor'])->name('ColorDeleted');

Route::get('/deleteCar/{id}', [CarController::deleteCar($id)])->name('deleteCar');

Route::get('/tech-sheet/{id}', [CarController::class, 'getTech'])->name('tech_sheet');

Route::get('/adminpanel/cars/{id}', [CarController::class, 'getCar'])->name('getCar');

// POST

Route::post('/addColor', [ColorController::class, 'addColor'])->name('addColor');

Route::post('/createBrand', [BrandController::class,'createBrand'])->name('brandCreated');

Route::post('/addType', [TypeController::class, 'addType'])->name('addType');

Route::post('/addCar', [CarController::addCar()])->name('addCar');

// PUT

Route::put('/updateCar', [CarController::class, 'updateCar'])->name('updateCar');

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

Route::put('/updateColor/', [ColorController::class, 'updateColor'])->name('colorUpdated');

