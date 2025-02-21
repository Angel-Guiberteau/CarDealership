<?php

namespace App\Http\Controllers;

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

        $request->validate([
            'brand' => 'required|string|max:255',
        ]);

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

    public static function deleteBrand($id): RedirectResponse {
        $brand = Brand::find($id);
        if ($brand) {
            $brand->delete();
            return redirect()->route('brand')->with('success', 'Marca eliminada con éxito.');
        }
        return redirect()->route('brand')->with('error', 'Marca no encontrada.');
    }

    public function updateBrand(): RedirectResponse
    {
        $request = request();

        $request->validate([
            'brand' => 'required|string|max:20',
        ]);

        $id = $request->input('brand_id');

        $brand = Brand::find($id);

        if ($brand) {
            $updated = Brand::editingBrand($request->input('brand'), $id);
            if ($updated > 0) {
                return redirect()->route('brand')->with('success', 'Marca actualizada con éxito.');
            } else {
                return redirect()->route('brand')->with('info', 'No se realizaron cambios en la marca.');
            }
        } else {
            return redirect()->route('brand')->with('error', 'Marca no encontrada.');
        }
    }
}
