<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\Color;
use Illuminate\Http\RedirectResponse;

class ColorController extends Controller
{
    public static function index(): View {
        return view('adminpanel.colors')
                ->with('colors', Color::allColors());
    }
    public static function addColor(): RedirectResponse {
        $request = request();
        $color = $request->all();

        if (self::validateRequestAdd($request)) {
            if (Color::addColor($color)) {
                return back()->with('success', 'Tipo creado correctamente');
            }
            return back()->with('error', 'Algo ha salido mal, no se pudo crear el tipo');
        }
        return back()->with('error', 'Validación fallida, no se pudo crear el tipo');
    }

    private static function validateRequestAdd(Request $request): bool {
        $validated = $request->validate([
            'name' => 'required|string',
            'hex' => 'required|string',
        ]);

        return !empty($validated);
    }

    public static function deleteColor($id): RedirectResponse {
        $color = Color::findColor($id);
        if ($color) {
            $color->delete();
            return redirect()->route('colors')->with('success', 'Tipo eliminado con éxito.');
        }
        return redirect()->route('colors')->with('error', 'Error al eliminar el tipo.');
    }

    public static function updateColor(): RedirectResponse {
        $request = request();

        $request->validate([
            'name' => 'required|string|max:20',
        ]);

        $id = $request->input('color_id');

        $color = Color::findColor($id);

        if ($color) {
            $updated = Color::editingColor($request->input('name'), $id);
            if ($updated > 0) {
                return redirect()->route('colors')->with('success', 'Tipo actualizado con éxito.');
            } else {
                return redirect()->route('colors')->with('info', 'No se realizaron cambios en el tipo.');
            }
        } else {
            return redirect()->route('colors')->with('error', 'Tipo no encontrada.');
        }
    }
}
