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
    public static function addColor(Request $request) {
        $data = self::validateRequestAdd($request);

        if(Color::addColor($data)){
            return view('adminpanel.colors');
        }
        return view('adminpanel.colors')->with('error', 'Algo ha salido mal');
    }

    private static function validateRequestAdd($request){
        return $request->validate([
            'name' => 'required|string',
            'color' => 'required|string',
        ]);
    }
}
