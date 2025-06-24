@extends('layout')

@section('content')
<div class="container">
    <h1 class="mb-4">Comidas - Precios Actualizados</h1>
    <button onclick="actualizarPreciosComidas()" class="btn btn-primary mb-3">Actualizar Precios</button>



    <table class="table table-striped" id="comidas-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tier</th>
                <th>Nivel</th>
                <th>Precio Actual</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comidas as $comida)
                <tr>
                    <td>{{ $comida->nombre }}</td>
                    <td>{{ $comida->tier }}</td>
                    <td>{{ $comida->nivel }}</td>
                    <td>{{ $comida->precio ?? 'Sin datos' }} silver</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#comidas-table').DataTable();
    });
</script>
<script src="{{ asset('js/comida.js') }}"></script>
@endpush
