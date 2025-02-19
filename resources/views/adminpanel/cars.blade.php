@extends('admin_layout')

@section('title', 'Admin Panel')

@section('admin_active', 'active')

@section('content')
<div class="container-fluid mt-4">
    <h2 class="text-white bg-dark p-3 rounded">Vehículos</h2>
    
    <div class="mb-3 d-flex justify-content-between">
        <div>
            <label for="entries">Mostrar</label>
            <select id="entries" class="form-select d-inline-block w-auto mx-2">
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
    
    <table id="vehiclesTable" class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Tipo</th>
                <th>Color</th>
                <th>Potencia</th>
                <th>Año</th>
                <th>Oferta</th>
                <th>Descripción</th>
                <th>Archivos</th>
                <th>Editor</th>
                <th>Eliminar</th>
            </tr>
            <tr>
                <th><input type="text" class="form-control form-control-sm search-column" placeholder="Buscar ID"></th>
                <th><input type="text" class="form-control form-control-sm search-column" placeholder="Buscar Nombre"></th>
                <th><input type="text" class="form-control form-control-sm search-column" placeholder="Buscar Marca"></th>
                <th><input type="text" class="form-control form-control-sm search-column" placeholder="Buscar Tipo"></th>
                <th><input type="text" class="form-control form-control-sm search-column" placeholder="Buscar Color"></th>
                <th><input type="text" class="form-control form-control-sm search-column" placeholder="Buscar Potencia"></th>
                <th><input type="text" class="form-control form-control-sm search-column" placeholder="Buscar Año"></th>
                <th><input type="text" class="form-control form-control-sm search-column" placeholder="Buscar Oferta"></th>
                <th><input type="text" class="form-control form-control-sm search-column" placeholder="Buscar Descripción"></th>
                <th><input type="text" class="form-control form-control-sm search-column" placeholder="Buscar Archivos"></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 1; $i <= 50; $i++)
                <tr>
                    <td>{{ $i }}</td>
                    <td>Citroën C3</td>
                    <td>Citroën</td>
                    <td>SUV</td>
                    <td>Gris</td>
                    <td>60</td>
                    <td>2002</td>
                    <td>Sí</td>
                    <td>Los modelos de gasolina son un 1.1L de 60 CV...</td>
                    <td>2022-12-01-C3.jpg</td>
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

<script>
$(document).ready(function() {
    var table = $('#vehiclesTable').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,  
        "autoWidth": false,
        "pageLength": 10,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros en total)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });

    $('#tablePagination').append($('.dataTables_paginate'));
    $('#tableInfo').append($('.dataTables_info'));

    // Agregar filtrado por columna
    $('#vehiclesTable thead .search-column').on('keyup change', function() {
        let colIndex = $(this).parent().index();
        table.column(colIndex).search(this.value).draw();
    });

    // Control de registros por página
    $('#entries').on('change', function() {
        var value = $(this).val();
        table.page.len(value === "todos" ? -1 : parseInt(value)).draw();
    });
});
</script>
@endsection