<?php


use App\Http\Controllers\CarController;

use App\Http\Controllers\BrandController;

use Illuminate\Support\Facades\Route;

Route::get('/', [CarController::class,'index'])->name('home');

Route::get('/admin', function () {
    return view('adminpanel.cars');
})->name('admin');

Route::get('/brand', [BrandController::class,'index'])->name('brand');

Route::get('/types', function () {
    return view('adminpanel.types');
})->name('types');

Route::get('/colors', function () {
    return view('adminpanel.colors');
})->name('colors');

Route::get('/tech', function () {
    return view('tech_sheet.tech_sheet');
})->name('tech');