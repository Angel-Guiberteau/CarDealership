<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreBrandRequest;

class BrandController extends Controller {

    private Brand $brandModel;

    public function __construct() {
        $this->brandModel = new Brand();
    }
    
    public  function index(): View {
        return view('adminpanel.brand')
                ->with('brands', $this->brandModel->allBrands());
    }    

    public function createBrand(StoreBrandRequest $request): RedirectResponse {

        if ($this->brandModel->createBrand($request['brand'])) {
            return back()->with('success', 'Marca creada con éxito');
        }
        
        return back()->with('error', 'Error al crear la marca');
    }

    public function deleteBrand(int $id): RedirectResponse {
        $brand = $this->brandModel->findBrand($id);
        if ($brand) {
            if($this->brandModel->deleteBrand($id))
                return redirect()->route('brand')->with('success', 'Marca eliminada con éxito.');
            else
                return redirect()->route('brand')->with('error', 'Error al eliminar la marca.');
        }
        return redirect()->route('brand')->with('error', 'Marca no encontrada.');
    }

    public function updateBrand(UpdateBrandRequest $request): RedirectResponse {
        $brand = $this->brandModel->findBrand($request->input('brand_id'));

        if ($brand) {
            $updated = $this->brandModel->editingBrand($request->input('brand'), $brand->id);
            return redirect()->route('brand')->with(
                $updated ? 'success' : 'info', 
                $updated ? 'Marca actualizada con éxito.' : 'No se realizaron cambios en la marca.'
            );
        }

        return redirect()->route('brand')->with('error', 'Marca no encontrada.');
    }
}
