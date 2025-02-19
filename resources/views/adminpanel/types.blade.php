@extends('admin_layout')

@section('title', 'cars types')

@section('admin_active', 'active')

@section('css')
    <link rel="stylesheet" href="types_css.css">
@endsection

@section('content')
    <div class="container-box">
        <h2 class="text-lg font-bold">Tipos de Vehículos</h2>
        <div class="table-container">
            <table id="vehiculosTable" class="table table-bordered w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>SUV</td>
                        <td><button class="btn btn-secondary btn-sm">Editar</button></td>
                        <td><button class="btn btn-dark btn-sm">Eliminar</button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Pickup</td>
                        <td><button class="btn btn-secondary btn-sm">Editar</button></td>
                        <td><button class="btn btn-dark btn-sm">Eliminar</button></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Deportivos</td>
                        <td><button class="btn btn-secondary btn-sm">Editar</button></td>
                        <td><button class="btn btn-dark btn-sm">Eliminar</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection