<?php

namespace App\Http\Controllers;

use App\Models\Comida;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ComidasController extends Controller
{
    public function index()
    {
        $comidas = Comida::all();
        return view('comidas.index', compact('comidas'));
    }

    public function actualizarPreciosAjax()
    {
        $comidas = Comida::all();
        $resultados = [];

        foreach ($comidas as $comida) {
            $url = "https://www.albion-online-data.com/api/v2/stats/prices/{$comida->item_id}.json?locations=Bridgewatch,Lymhurst,Martlock,Thetford,Fort Sterling,Caerleon";
            $response = Http::withoutVerifying()->get($url);

            if ($response->successful()) {
                $data = collect($response->json())
                        ->where('sell_price_min', '>', 0)
                        ->sortByDesc('sell_price_min')
                        ->first();

                if ($data) {
                    // Aquí pasamos el control al modelo:
                    Comida::actualizarPrecio($comida->item_id, $data['sell_price_min']);

                    $resultados[] = [
                        'item_id' => $comida->item_id,
                        'precio' => $data['sell_price_min']
                    ];
                }
            }
        }

        return response()->json([
            'success' => true,
            'data' => $resultados,
            'message' => 'Precios de las comidas actualizados correctamente'
        ]);
    }
}
