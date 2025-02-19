@extends('layout')

@section('title', 'Home')

@section('filter')
    <div class="container-fluid p-3 d-flex justify-content-around filter">
        <div class="d-flex p-2">
            <!-- Marca -->
            <div class="d-flex align-items-center me-5">
                <label for="marca" class="form-label mt-2 me-4">Marca</label>
                <select id="marca" class="form-select">
                    <option selected>Seleccione</option>
                    <option>Toyota</option>
                    <option>Ford</option>
                    <option>Chevrolet</option>
                </select>
            </div>

            <!-- Modelo -->
            <div class="d-flex align-items-center me-5">
                <label for="modelo" class="form-label mt-2 me-4">Modelo</label>
                <input type="text" id="modelo" class="form-control" placeholder="Ej. Corolla">
            </div>

            <!-- Color -->
            <div class="d-flex align-items-center me-5">
                <label for="color" class="form-label mt-2 me-4">Color</label>
                <select id="color" class="form-select">
                    <option selected>Seleccione</option>
                    <option>Negro</option>
                    <option>Blanco</option>
                    <option>Rojo</option>
                </select>
            </div>

            <!-- Precio -->
            <div class="d-flex align-items-center me-5">
                <label class="form-label mt-2 me-4">Precio</label>
                <div class="range-container">
                    <!-- Contenedor de valores para alinearlos arriba y a la derecha -->
                    <div class="range-values">
                        <span id="precio_min_val">5000</span> - 
                        <span id="precio_max_val">100000</span>
                    </div>
                    <div class="slider-track"></div>
                    <input type="range" id="precio_min" min="5000" max="100000" step="1000" value="5000">
                    <input type="range" id="precio_max" min="5000" max="100000" step="1000" value="100000">
                </div>
            </div>

            <!-- Potencia -->
            <div class="d-flex align-items-center me-5">
                <label class="form-label mt-2 me-4">Potencia</label>
                <div class="range-container">
                    <!-- Contenedor de valores para alinearlos arriba y a la derecha -->
                    <div class="range-values">
                        <span id="potencia_min_val">50</span> - 
                        <span id="potencia_max_val">1000</span>
                    </div>
                    <div class="slider-track"></div>
                    <input type="range" id="potencia_min" min="50" max="1000" step="10" value="50">
                    <input type="range" id="potencia_max" min="50" max="1000" step="10" value="1000">
                </div>
            </div>
        </div>

        <!-- Botón Restablecer -->
        <div class="d-flex">
            <button id="reset" class="btn resetFilter mt-2">Restablecer</button>
        </div>
    </div>
@endsection



@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ asset("carstest/cordoba.jpeg") }}" class="mt-3 ms-3 me-3">
                    <div class="card-body mt-3">
                        <h5 class="card-title">Nombre del Modelo 1</h5>
                        <p class="card-text">50€</p>
                        <p class="card-text">Marca: [Marca]</p>
                        <p class="card-text">Color: [Color]</p>
                        <div class="d-flex justify-content-between">
                            <p class="card-text">CV: [CV]</p>
                            <a href="#" class="btn ofer">Oferta</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ asset("carstest/cordoba.jpeg") }}" class="mt-3 ms-3 me-3">
                    <div class="card-body mt-3">
                        <h5 class="card-title">Nombre del Modelo 2</h5>
                        <p class="card-text">50€</p>
                        <p class="card-text">Marca: [Marca]</p>
                        <p class="card-text">Color: [Color]</p>
                        <div class="d-flex justify-content-between">
                            <p class="card-text">CV: [CV]</p>
                            <a href="#" class="btn ofer">Oferta</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ asset("carstest/cordoba.jpeg") }}" class="mt-3 ms-3 me-3">
                    <div class="card-body mt-3">
                        <h5 class="card-title">Nombre del Modelo 3</h5>
                        <p class="card-text">50€</p>
                        <p class="card-text">Marca: [Marca]</p>
                        <p class="card-text">Color: [Color]</p>
                        <div class="d-flex justify-content-between">
                            <p class="card-text">CV: [CV]</p>
                            <a href="#" class="btn ofer">Oferta</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ asset("carstest/cordoba.jpeg") }}" class="mt-3 ms-3 me-3">
                    <div class="card-body mt-3">
                        <h5 class="card-title">Nombre del Modelo 4</h5>
                        <p class="card-text">50€</p>
                        <p class="card-text">Marca: [Marca]</p>
                        <p class="card-text">Color: [Color]</p>
                        <div class="d-flex justify-content-between">
                            <p class="card-text">CV: [CV]</p>
                            <a href="#" class="btn ofer">Oferta</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-4">
        <div class="row mt-5">
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ asset("carstest/cordoba.jpeg") }}" class="mt-3 ms-3 me-3">
                    <div class="card-body mt-3">
                        <h5 class="card-title">Nombre del Modelo 5</h5>
                        <p class="card-text">50€</p>
                        <p class="card-text">Marca: [Marca]</p>
                        <p class="card-text">Color: [Color]</p>
                        <div class="d-flex justify-content-between">
                            <p class="card-text">CV: [CV]</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ asset("carstest/cordoba.jpeg") }}" class="mt-3 ms-3 me-3">
                    <div class="card-body mt-3">
                        <h5 class="card-title">Nombre del Modelo 6</h5>
                        <p class="card-text">50€</p>
                        <p class="card-text">Marca: [Marca]</p>
                        <p class="card-text">Color: [Color]</p>
                        <div class="d-flex justify-content-between">
                            <p class="card-text">CV: [CV]</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ asset("carstest/cordoba.jpeg") }}" class="mt-3 ms-3 me-3">
                    <div class="card-body mt-3">
                        <h5 class="card-title">Nombre del Modelo 7</h5>
                        <p class="card-text">50€</p>
                        <p class="card-text">Marca: [Marca]</p>
                        <p class="card-text">Color: [Color]</p>
                        <div class="d-flex justify-content-between">
                            <p class="card-text">CV: [CV]</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ asset("carstest/cordoba.jpeg") }}" class="mt-3 ms-3 me-3">
                    <div class="card-body mt-3">
                        <h5 class="card-title">Nombre del Modelo 8</h5>
                        <p class="card-text">50€</p>
                        <p class="card-text">Marca: [Marca]</p>
                        <p class="card-text">Color: [Color]</p>
                        <div class="d-flex justify-content-between">
                            <p class="card-text">CV: [CV]</p>
                            <a href="#" class="btn ofer">Oferta</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
