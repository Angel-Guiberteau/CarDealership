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
            'brand' => 'required|string|max:20',
        ]);

        if (Brand::createBrand($request['brand'])) {
            return back()->with('success', 'Marca creada con éxito');
        }
        
        return back()->with('error', 'Error al crear la marca');
    }

    public static function deleteBrand(int $id): RedirectResponse {
        $brand = Brand::findBrand($id);
        if ($brand) {
            if(Brand::deleteBrand($id))
                return redirect()->route('brand')->with('success', 'Marca eliminada con éxito.');
            else
                return redirect()->route('brand')->with('error', 'Error al eliminar la marca.');
        }
        return redirect()->route('brand')->with('error', 'Marca no encontrada.');
    }

    public function updateBrand(): RedirectResponse {
        $request = request();

        $request->validate([
            'brand' => 'required|string|max:20',
        ]);

        $id = $request->input('brand_id');

        $brand = Brand::findBrand($id);

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
