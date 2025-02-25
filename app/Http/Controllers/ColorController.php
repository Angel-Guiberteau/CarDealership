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
                return back()->with('success', 'Color creado correctamente');
            }
            return back()->with('error', 'Algo ha salido mal, no se pudo crear el color');
        }
        return back()->with('error', 'Validación fallida, no se pudo crear el color');
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
            return redirect()->route('colors')->with('success', 'Color eliminado con éxito.');
        }
        return redirect()->route('colors')->with('error', 'Error al eliminar el Color.');
    }

    public static function updateColor(): RedirectResponse {
        $request = request();

        $request->validate([
            'name' => 'required|string|max:20',
            'hex' => 'required|string',
        ]);

        $id = $request->input('color_id');
        $name = $request->input('name');
        $hex = $request->input('hex');
        $color = Color::findColor($id);

        if ($color) {
            $updated = Color::editingColor($name, $id, $hex);
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
