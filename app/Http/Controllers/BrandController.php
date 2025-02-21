<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BrandController extends Controller {
    
    public static function index(): View {
        return view('adminpanel.brand')
                ->with('brands', Brand::allBrands());
    }
    

    public static function createBrand(): RedirectResponse {
        $request = request();
        
        $validationResponse = self::validateBrand($request['brand']);
        if ($validationResponse) {
            return $validationResponse;
        }
        
        if (Brand::createBrand($request['brand'])) {
            return back()->with('success', 'Marca creada con éxito');
        }
        
        return back()->with('error', 'Error al crear la marca');
    }
    
    public static function validateBrand($brand): ?RedirectResponse {
        if ($brand == null) {
            return back()->with('error', 'La marca no puede estar vacía');
        }
    
        if (!is_string($brand)) {
            return back()->with('error', 'La marca debe ser un string');
        }
    
        if (Brand::brandExists($brand)) {
            return back()->with('error', 'La marca ya existe');
        }
    
        return null;
    }
}
