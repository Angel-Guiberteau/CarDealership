@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-4">Precios de Mapas Grupales</h2>
    <table id="mapasTable" class="table table-striped">
        <thead>
            <tr>
                <th>Ciudad</th>
                <th>Precio 8.3</th>
                <th>Precio 8.4</th>
                <th>Precio x Bulk</th>
                <th>Cantidad Bulk</th>
                <th>Total Inversión</th>
                <th>Profit</th>
                <th>Profit (Ciudad más cara)</th>
                <th>Profit x Bulk</th>
                <th>Profit x Bulk (Ciudad más cara)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mapas as $mapa)
            <tr>
                <td>{{ $mapa->ciudad }}</td>
                <td>{{ number_format($mapa->precio_83, 0, ',', '.') }} </td>
                <td>{{ number_format($mapa->precio_84, 0, ',', '.') }} </td>
                <td>{{ number_format($mapa->precio_bulk, 0, ',', '.') }} </td>
                <td>{{ $mapa->cantidad_bulk }}</td>
                <td>{{ number_format($mapa->total_inversion, 0, ',', '.') }} </td>
                <td>{{ number_format($mapa->profit, 0, ',', '.') }} </td>
                <td>{{ number_format($mapa->profit_ciudad_cara, 0, ',', '.') }} </td>
                <td>{{ number_format($mapa->profit_x_bulk, 0, ',', '.') }} </td>
                <td>{{ number_format($mapa->profit_x_bulk_ciudad_cara, 0, ',', '.') }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#mapasTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true
        });
    });
</script>
<script src="{{ asset('js/mapas.js') }}"></script>
@endsection
