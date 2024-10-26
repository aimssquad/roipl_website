@extends('front.layouts.app')

@section('content')
{{-- <div class="page-title-brand page-title dark-background" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('assets/img/banner/Brand-Banner-2.webp') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 50vh;">
    <div class="container">
        <h1 style="color: white !important;">Brands</h1>
    </div>
</div> --}}

<div class="page-title-brand page-title dark-background" id="backgroundSlider">
    <div class="container">
        <h1 style="color: white !important;">Brands</h1>
    </div>
</div>




@include('front.sections.brand')
{{-- @include('front.sections.portfolio') --}}
{{-- @include('front.sections.client-detail') --}}
@endsection

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const images = [
            "{{ asset('assets/img/banner/Brand-Banner-2.webp') }}",
            "{{ asset('assets/img/banner/Brand-Banner-3.webp') }}",
            "{{ asset('assets/img/banner/Brand-Banner-4.webp') }}",
            "{{ asset('assets/img/banner/Brand-Banner-1.webp') }}"
        ];
        let currentIndex = 0;
        const sliderElement = document.getElementById("backgroundSlider");

        function changeBackground() {
            sliderElement.style.backgroundImage = `linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(${images[currentIndex]})`;
            currentIndex = (currentIndex + 1) % images.length;
        }

        setInterval(changeBackground, 5000);
        changeBackground();
    });
</script>
@endsection
