@extends('layout')

@section('title', 'Ficha Técnica')

@section('content')
<div class="container mt-4" style="max-width: 1200px; margin: 0 auto;">
    <div class="card p-4">
        @foreach($cars as $car)
            @php 
                $images = $car->images ? explode(';', $car->images) : [];
            @endphp
            <div class="gallery-container text-center mb-4">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide d-flex justify-content-center">
                            <img src="{{ asset('img/' . $car->main_image) }}" class="img-fluid rounded" alt="Main Image">
                        </div>
                        @foreach($images as $image)
                            @if(!empty(trim($image)))
                                <div class="swiper-slide d-flex justify-content-center">
                                    <img src="{{ asset('img/' . trim($image)) }}" class="img-fluid rounded" alt="Car Image">
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>        

            <div class="car-info mt-4">
                <h5 class="bg-dark text-white p-3 rounded">{{ $car->name }}</h5>
                <p><strong>Marca:</strong> {{ $car->brand_name }}</p>
                <p><strong>Color:</strong> 
                    <span>{{ $car->color_name }}</span>
                    <input type="color" class="inputColor" value="{{ $car->color_hex }}" disabled>
                </p>
                <h6 class="bg-dark text-white p-3 mt-3 rounded">Especificaciones</h6>
                <p><strong>Potencia:</strong> {{ $car->horse_power }} CV</p>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <span class="price font-weight-bold">
                    <strong>Precio:</strong>
                    {{ number_format($car->price, 2, ',', '.') }}€
                </span>
                <div>
                    <button class="btn btn-secondary">Reservar</button>
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@push('js')
    <script src="{{ asset('js/tech_sheet.js') }}"></script>
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('css/tech_sheet.css') }}">
@endpush
