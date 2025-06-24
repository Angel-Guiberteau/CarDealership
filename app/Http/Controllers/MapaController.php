<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapa;
use Illuminate\Support\Facades\Http;

class MapaController extends Controller
{
    public function index() {
        $mapas = Mapa::all();
        return view('mapas.index', compact('mapas'));
    }

    public function actualizarDatos() {
        $ciudades = ['Bridgewatch', 'Lymhurst', 'Martlock', 'Thetford', 'Fort Sterling'];
        $items = ['T8_MAP_G', 'T8_MAP_G_LEVEL4'];

        foreach ($ciudades as $ciudad) {
            $response = Http::withoutVerifying()->get("https://www.albion-online-data.com/api/v2/stats/prices/T8_MAP_G,T8_MAP_G_LEVEL4.json?locations={$ciudad}");

            $data = $response->json();

            if (!empty($data)) {
                $precio_83 = $data[0]['sell_price_min'] ?? null;
                $precio_84 = $data[1]['sell_price_min'] ?? null;

                $mapa = Mapa::updateOrCreate(
                    ['ciudad' => $ciudad],
                    [
                        'precio_83' => $precio_83,
                        'precio_84' => $precio_84,
                        'precio_bulk' => $precio_83 * 10,
                        'cantidad_bulk' => 2,
                        'total_inversion' => $precio_83 * 10,
                        'profit' => $precio_84 - $precio_83,
                        'profit_ciudad_cara' => max([$precio_83, $precio_84]) - min([$precio_83, $precio_84]),
                        'profit_x_bulk' => ($precio_84 - $precio_83) * 10,
                        'profit_x_bulk_ciudad_cara' => (max([$precio_83, $precio_84]) - min([$precio_83, $precio_84])) * 10
                    ]
                );
            }
        }

        return redirect()->route('mapas.index')->with('success', 'Datos actualizados correctamente.');
}
}
