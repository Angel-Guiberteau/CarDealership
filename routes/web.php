<?php

use App\Http\Controllers\CarController;

use App\Http\Controllers\BrandController;

use App\Http\Controllers\TypeController;

use App\Http\Controllers\ColorController;
use App\Models\Car;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;

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

// POST

Route::post('/createBrand', [BrandController::class,'createBrand'])->name('brandCreated');

Route::post('/addType', [TypeController::class, 'addType'])->name('addType');

Route::get('/tech', function () {
    return CarController::getTech();
})->name('tech');

// PUT

Route::put('/updateBrand/', [BrandController::class, 'updateBrand'])->name('brandUpdated');

Route::put('/updateType/', [TypeController::class, 'updateType'])->name('typeUpdated');

