@extends('layouts.app')
@section('หน้าแรกของเว็๋บ')
@section('content')

    <style>
        /* Custom CSS to make carousel images smaller */
        #carouselExampleIndicators .carousel-item img {
            max-height: 500px;
            /* ปรับสูงสุดสูงสุดของภาพเป็น 300px */
            object-fit: cover;
            /* ใช้ object-fit เพื่อให้ภาพตรงกับขนาด container */
        }
    </style>
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://dynamicmedia.livenationinternational.com/e/p/l/930bdfee-de51-4aa8-a9da-9e5b2679419e.jpg"
                    class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://s.isanook.com/jo/0/ud/488/2444461/keshi.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://i1.sndcdn.com/artworks-ePIatPa0TijNBzoZ-ZEq9lg-t500x500.jpg" class="d-block w-100"
                    alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


        <h1>hello</h1>
    @endsection
