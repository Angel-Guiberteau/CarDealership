@extends('layout')

@section('title', 'Home')

@section('content')
<div class="container mt-4">
    <div class="card p-3" style="max-width: 1000px; margin: auto;">
        <div class="gallery-container text-center">
            <div class="swiper mySwiper" style="width: 100%; height: 500px;">
                <div class="swiper-wrapper">
                    <div class="swiper-slide d-flex justify-content-center">
                        <img src="{{ asset('carstest/cordoba.jpeg') }}" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;" alt="Car 1">
                    </div>
                    <div class="swiper-slide d-flex justify-content-center">
                        <img src="{{ asset('carstest/cordoba.jpeg') }}" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;" alt="Car 2">
                    </div>
                    <div class="swiper-slide d-flex justify-content-center">
                        <img src="{{ asset('carstest/cordoba.jpeg') }}" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;" alt="Car 3">
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>        
        <div class="car-info mt-3">
            <h5 class="bg-secondary text-white p-2">Nombre del Modelo</h5>
            <p><strong>Marca:</strong> Toyota</p>
            <p><strong>Color:</strong> Rojo</p>
            <h6 class="bg-secondary text-white p-2">Especificaciones</h6>
            <p><strong>Potencia:</strong> 150 CV</p>
            <p><strong>Nº de puertas:</strong> 4</p>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <span class="price font-weight-bold">0€</span>
            <button class="btn btn-secondary">Reservar</button>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('js/tech_sheet.js') }}"></script>
@endsection