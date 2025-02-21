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
}
