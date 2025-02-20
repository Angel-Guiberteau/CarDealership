@extends('admin_layout')

@section('title', 'Colors')

@section('admin_active', 'active')

@section('content')
<div class="container-fluid mt-4">
    <h2 class="text-white bg-dark p-4">Vehículos</h2>
    
    <div class="mb-3 d-flex justify-content-between">
        <div>
            <label for="entries">Mostrar</label>
            <select id="entries" class="form-select d-inline-block w-auto mx-2 custom-select">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="todos">Todos</option>
            </select>
            registros
        </div>
        <div>
            <button class="btn btn-dark">Agregar</button>
        </div>
    </div>
    
    <table id="infoTable" class="table text-center table-bordered custom-table">
        <thead class="text-center">
            <tr class="text-center">
                <th>ID</th>
                <th>Nombre</th>
                <th>Hexadecimal</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            <tr>
                <th><input type="text" class="form-control form-control-sm search-column" placeholder="Buscar ID"></th>
                <th><input type="text" class="form-control form-control-sm search-column" placeholder="Buscar Nombre"></th>
                <th><input type="text" class="form-control form-control-sm search-column" placeholder="Buscar Nombre"></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 1; $i <= 50; $i++)
                <tr>
                    <td>{{ $i }}</td>
                    <td>color</td>
                    <td>7f7f7f</td>
                    <td><button class="btn btn-dark btn-sm">Editar</button></td>
                    <td><button class="btn btn-danger btn-sm">Eliminar</button></td>
                </tr>
            @endfor
        </tbody>
    </table>
    
    <div class="d-flex justify-content-between mt-3">
        <div id="tableInfo"></div>
        <div id="tablePagination" class="d-flex"></div>
    </div>
</div>

@endsection

@section('js')
    <script src="{{ asset('js/cars_view.js') }}"></script>
@endsection