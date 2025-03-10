<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\Type;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;

class TypeController extends Controller
{

    private Type $type;
    public int $id;
    public 
    public function __construct(){
        $this->type = new Type;
    }

    public function index():View {
        return view('adminpanel.types')
                ->with('types', $this->type->allTypes());
    }

    public function addType(StoreTypeRequest $request): RedirectResponse {
        $request = $request->validated();

        $type = $request['type'];

        if ($this->type->addType($type)) {
            return back()->with('success', 'Tipo creado correctamente');
        }
        return back()->with('error', 'Algo ha salido mal, no se pudo crear el tipo');
    }

    public function deleteType(int $id): RedirectResponse {
        $type = $this->type->findType($id);
        if ($type) {
            $type->delete();
            return redirect()->route('types')->with('success', 'Tipo eliminado con éxito.');
        }
        return redirect()->route('types')->with('error', 'Error al eliminar el tipo.');
    }

    public function updateType(UpdateTypeRequest $request): RedirectResponse {
        $request = $request->validated();

        $id = $request['type_id'];

        $type = $this->type->findType($id);

        if ($type) {
            $updated = $this->type->editingType($request['type'], $id);
            if ($updated > 0) {
                return redirect()->route('types')->with('success', 'Tipo actualizado con éxito.');
            } else {
                return redirect()->route('types')->with('info', 'No se realizaron cambios en el tipo.');
            }
        } else {
            return redirect()->route('types')->with('error', 'Tipo no encontrada.');
        }
    }
}
