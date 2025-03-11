@extends('layout')

@section('title', 'Ficha Técnica')

@section('content')
<div class="container mt-4">
    <div class="card p-3">
        @foreach($cars as $car)
            @php 
                $images = $car->images ? explode(';', $car->images) : [];
            @endphp
            <div class="gallery-container text-center">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide d-flex justify-content-center">
                            <img src="{{ asset('img/' . $car->main_image) }}" class="img-fluid" alt="Main Image">
                        </div>
                        @foreach($images as $image)
                            @if(!empty(trim($image)))
                                <div class="swiper-slide d-flex justify-content-center">
                                    <img src="{{ asset('img/' . trim($image)) }}" class="img-fluid" alt="Car Image">
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>        

            <div class="car-info mt-3">
                <h5 class="bg-midnightBlue text-white p-2">{{ $car->name }}</h5>
                <p><strong>Marca:</strong> {{ $car->brand_name }}</p>
                <p><strong>Color:</strong> <span style="color: {{ $car->color_hex }}">{{ $car->color_name }}</span></p>
                <h6 class="bg-midnightBlue text-white p-2">Especificaciones</h6>
                <p><strong>Potencia:</strong> {{ $car->horse_power }} CV</p>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
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
