<?php

use App\Http\Controllers\CarController;

use App\Http\Controllers\BrandController;

use App\Http\Controllers\TypeController;

use App\Http\Controllers\ColorController;

use Illuminate\Support\Facades\Route;

Route::get('/', [CarController::class,'index'])->name('home');

Route::get('/admin', function () {
    return view('adminpanel.cars');
})->name('admin');

Route::get('/brand', [BrandController::class,'index'])->name('brand');

Route::get('/types', [TypeController::class,'index'])->name('types');

Route::get('/colors', [ColorController::class,'index'])->name('colors');

Route::get('/deleteBrand/{id}', [BrandController::class, 'deleteBrand'])->name('brandDeleted');

// POST

Route::post('/createBrand', [BrandController::class,'createBrand'])->name('brandCreated');

Route::get('/tech', function () {
    return view('tech_sheet.tech_sheet');
})->name('tech');

// PUT

Route::put('/updateBrand/', [BrandController::class, 'updateBrand'])->name('brandUpdated');

