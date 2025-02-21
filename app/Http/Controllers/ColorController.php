<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    public static function index():View {
        return view('adminpanel.colors')
                ->with('colors', Color::allColors());
    }
}
