<?php


use App\Http\Controllers\CarController;

use App\Http\Controllers\BrandController;

use App\Http\Controllers\TypeController;

use App\Http\Controllers\ColorController;
use App\Models\Car;
use Illuminate\Support\Facades\Route;

Route::get('/', [CarController::class,'index'])->name('home');

Route::get('/admin', function () {
    return CarController::listCars();
})->name('admin');

Route::get('/brand', [BrandController::class,'index'])->name('brand');

Route::get('/types', [TypeController::class,'index'])->name('types');

Route::get('/colors', function () {
    return view('adminpanel.colors');
})->name('colors');

// POST

Route::post('/createBrand', [BrandController::class,'createBrand'])->name('brandCreated');

Route::get('/tech', function () {
    return CarController::getTech();
})->name('tech');

Route::get('/colors', [ColorController::class,'index'])->name('colors');

