<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home.home');
});

Route::get('/admin', function () {
    return view('adminpanel.cars');
})->name('admin');
