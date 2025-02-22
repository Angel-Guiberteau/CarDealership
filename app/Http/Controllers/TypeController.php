<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\Type;
use Illuminate\Http\RedirectResponse;

class TypeController extends Controller
{
    public static function index():View {
        return view('adminpanel.types')
                ->with('types', Type::allTypes());
    }

    public static function addType(): RedirectResponse {
        $request = request();

        $type = $request->input('type');

        if (self::validateRequestAdd($request)) {
            if (Type::addType($type)) {
                return back()->with('success', 'Tipo creado correctamente');
            }
            return back()->with('error', 'Algo ha salido mal, no se pudo crear el tipo');
        }
        return back()->with('error', 'Validación fallida, no se pudo crear el tipo');
    }

    private static function validateRequestAdd(Request $request): bool {
        $validated = $request->validate([
            'type' => 'required|string|max:20',
        ]);

        return !empty($validated);
    }

    public static function deleteType($id): RedirectResponse {
        $type = Type::findType($id);
        if ($type) {
            $type->delete();
            return redirect()->route('types')->with('success', 'Tipo eliminado con éxito.');
        }
        return redirect()->route('types')->with('error', 'Error al eliminar el tipo.');
    }
}
