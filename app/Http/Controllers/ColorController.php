<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\Color;
use Illuminate\Http\RedirectResponse;

class ColorController extends Controller {

    private Color $colorModel;

    public function __construct() {
        $this->colorModel = new Color();
    }

    public function index(): View {
        return view('adminpanel.colors')
                ->with('colors', $this->colorModel->allColors());
    }
    public function addColor(StoreColorRequest $request): RedirectResponse {
        $color = $request->validated();

        if ($this->colorModel->addColor($color)) {
            return back()->with('success', 'Color creado correctamente');
        }
        return back()->with('error', 'Algo ha salido mal, no se pudo crear el color');
    }


    public function deleteColor(int $id): RedirectResponse {
        $color = $this->colorModel->findColor($id);
        if ($color) {
            $color->delete();
            return redirect()->route('colors')->with('success', 'Color eliminado con éxito.');
        }
        return redirect()->route('colors')->with('error', 'Error al eliminar el Color.');
    }

    public function updateColor(UpdateColorRequest $request): RedirectResponse {
        $color = $request->validated();

        $id = $request['color_id'];
        $name = $request['name'];
        $hex = $request['hex'];

        $color = $this->colorModel->findColor($id);

        if ($color) {
            $updated = $this->colorModel->editingColor($name, $id, $hex);
            if ($updated > 0) {
                return redirect()->route('colors')->with('success', 'Color actualizado con éxito.');
            } else {
                return redirect()->route('colors')->with('info', 'No se realizaron cambios en el color.');
            }
        } else {
            return redirect()->route('colors')->with('error', 'Color no encontrada.');
        }
    }
}
