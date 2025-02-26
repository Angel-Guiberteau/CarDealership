@extends('layout')

@section('title', 'Home')

@section('filter')
    <div class="container-fluid p-3 d-flex justify-content-around filter">
        <div class="d-flex p-2">
            <!-- Brand -->
            <div class="d-flex align-items-center me-5">
                <label for="brand" class="form-label mt-2 me-4">Marca</label>
                <select id="brand" class="form-select">
                    <option selected hidden disabled>Seleccione</option>
                    @foreach ($brands as $brand)
                        <option>{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Model -->
            <div class="d-flex align-items-center me-5">
                <label for="model" class="form-label mt-2 me-4">Modelo</label>
                <input type="text" id="model" class="form-control" placeholder="Ej. Corolla">
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
                        <span id="price_min_val">20000</span> - 
                        <span id="price_max_val">1000000</span>
                    </div>
                    <div class="slider-track"></div>
                    <input type="range" id="price_min" min="20000" max="1000000" step="1000" value="20000">
                    <input type="range" id="price_max" min="20000" max="1000000" step="1000" value="1000000">

                </div>
            </div>

            <!-- HorsePower -->
            <div class="d-flex align-items-center me-5">
                <label class="form-label mt-2 me-4">Potencia</label>
                <div class="range-container">
                    <div class="range-values">
                        <span id="power_min_val">50</span> - 
                        <span id="power_max_val">1000</span>
                    </div>
                    <div class="slider-track"></div>
                    <input type="range" id="power_min" min="50" max="1000" step="10" value="50">
                    <input type="range" id="power_max" min="50" max="1000" step="10" value="1000">
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
        <h4 class="text-center mt-5 bg-softGold text-white p-3">Oferta</h4>
    </div>
    <div class="container">
        <div class="row mt-5">
            @foreach ($cars as $car)
                @if ($car->sale)
                <div class="col-md-3 mb-4 cars-offer">
                    <a href="{{ route('tech_sheet', $car->id) }}" style="display: block; text-decoration: none; color: inherit;">
                        <div class="card"
                            data-card-id="{{ $car->id }}"
                            data-card-brand="{{ $car->brand->name }}"
                            data-card-color="{{ $car->color->name }}"
                            data-card-price="{{ $car->price }}"
                            data-card-horsepower="{{ $car->horse_power }}">
                            <img src="{{ asset('img/'.$car->main_image) }}" class="mt-3 ms-3 me-3" style="max-width: 90%; min-height: 200px;">
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
                    </a>
                </div>
                
                @endif
            @endforeach
        </div>
        <div class="container-fluid p-0">
            <h4 class="text-center mt-5 bg-black text-white p-3">Todos los vehículos</h4>
        </div>
        <div class="row mt-5">
            @foreach ($cars as $car)
            <div class="col-md-3 mb-4 cars-all">
                <a href="{{ route('tech_sheet', $car->id) }}" style="display: block; text-decoration: none; color: inherit;">
                    <div class="card"
                        data-card-id="{{ $car->id }}"
                        data-card-brand="{{ $car->brand->name }}"
                        data-card-color="{{ $car->color->name }}"
                        data-card-price="{{ $car->price }}"
                        data-card-horsepower="{{ $car->horse_power }}">
                        <img src="{{ asset('img/'.$car->main_image) }}" class="mt-3 ms-3 me-3" style="max-width: 90%; min-height: 200px;">
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
                </a>
            </div>
            
            @endforeach
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/sliderFilter.js') }}"></script>
    <script src="{{ asset('js/filter.js') }}"></script>
@endpush