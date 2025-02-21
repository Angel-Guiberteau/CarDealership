<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\Type;

class TypeController extends Controller
{
    public static function index():View {
        return view('adminpanel.types')
                ->with('types', Type::allTypes());
    }

    public static function addType(Request $request):view{

        $data = self::validateRequestAdd($request);

        if(Type::addType($data)){
            return view('adminpanel.types');
        }
        return view('adminpanel.types')->with('error', 'Algo ha salido mal');
    }

    private static function validateRequestAdd($request){
        return $request->validate([
            'name' => 'required|string',
        ]);
    }
}
