<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller {
    
    public static function index() {
        // dd(Brand::allBrands());
        return view('adminpanel.brand')
                ->with('brands', Brand::allBrands());
    }
}
