@extends('layout')

@section('title', 'Home')

@section('filter')
    <div class="container-fluid p-3 d-flex justify-content-around filter">
        <div class="d-flex p-2">
            <!-- Brand -->
            <div class="d-flex align-items-center me-5">
                <label for="marca" class="form-label mt-2 me-4">Marca</label>
                <select id="marca" class="form-select">
                    <option selected hidden disabled>Seleccione</option>
                    @foreach ($brands as $brand)
                        <option>{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Model -->
            <div class="d-flex align-items-center me-5">
                <label for="modelo" class="form-label mt-2 me-4">Modelo</label>
                <input type="text" id="modelo" class="form-control" placeholder="Ej. Corolla">
            </div>

            <!-- Color -->
            <div class="d-flex align-items-center me-5">
                <label for="color" class="form-label mt-2 me-4">Color</label>
                <select id="color" class="form-select">
                    <option selected hidden disabled>Seleccione</option>
                    @foreach ($colors as $color)
                        <option>{{ $color->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Price -->
            <div class="d-flex align-items-center me-5">
                <label class="form-label mt-2 me-4">Precio</label>
                <div class="range-container">
                    <div class="range-values">
                        <span id="precio_min_val">5000</span> - 
                        <span id="precio_max_val">100000</span>
                    </div>
                    <div class="slider-track"></div>
                    <input type="range" id="precio_min" min="5000" max="100000" step="1000" value="5000">
                    <input type="range" id="precio_max" min="5000" max="100000" step="1000" value="100000">
                </div>
            </div>

            <!-- HorsePower -->
            <div class="d-flex align-items-center me-5">
                <label class="form-label mt-2 me-4">Potencia</label>
                <div class="range-container">
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

        <!-- Reset Button -->
        <div class="d-flex">
            <button id="reset" class="btn resetFilter mt-2">Restablecer</button>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid p-0">
        <h4 class="text-center mt-5 bg-champagne text-white p-3">Oferta</h4>
    </div>
    <div class="container">
        <div class="row mt-5">
            @foreach ($cars as $car)
                @if ($car->sale)
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="{{ asset("carstest/cordoba.jpeg") }}" class="mt-3 ms-3 me-3">
                            <div class="card-body mt-3">
                                <h5 class="card-title">{{ $car->name }}</h5>
                                <p class="card-text">Precio: {{ round($car->price) }}</p>
                                <p class="card-text">Marca: {{ $car->brand->name }}</p>
                                <p class="card-text">Color: {{ $car->color->name }}</p>
                                <div class="d-flex justify-content-between">
                                    <p class="card-text">CV: {{ round($car->horse_power) }}</p>
                                    <a href="#" class="btn ofer">Oferta</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="container-fluid p-0">
            <h4 class="text-center mt-5 bg-black text-white p-3">Todos los vehículos</h4>
        </div>
        <div class="row mt-5">
            @foreach ($cars as $car)
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="{{ asset("carstest/cordoba.jpeg") }}" class="mt-3 ms-3 me-3">
                            <div class="card-body mt-3">
                                <h5 class="card-title">{{ $car->name }}</h5>
                                <p class="card-text">Precio: {{ round($car->price) }}</p>
                                <p class="card-text">Marca: {{ $car->brand->name }}</p>
                                <p class="card-text">Color: {{ $car->color->name }}</p>
                                <div class="d-flex justify-content-between">
                                    <p class="card-text">CV: {{ round($car->horse_power) }}</p>
                                    @if ($car->sale)
                                        <a href="#" class="btn ofer">Oferta</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/sliderFilter.js') }}"></script>
@endpush