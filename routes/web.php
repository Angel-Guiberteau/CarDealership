<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home.home');
});

Route::get('/admin', function () {
    return view('adminpanel.cars');
})->name('admin');

Route::get('/adminbrand', function () {
    return view('adminpanel.brand');
})->name('brand');

Route::get('/types', function () {
    return view('adminpanel.types');
})->name('types');

Route::get('/colors', function () {
    return view('adminpanel.colors');
})->name('colors');