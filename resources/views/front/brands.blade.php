@extends('front.layouts.app')

@section('content')
{{-- <div class="page-title-brand page-title dark-background" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('assets/img/banner/Brand-Banner-2.webp') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 50vh;">
    <div class="container">
        <h1 style="color: white !important;">Brands</h1>
    </div>
</div> --}}

<div class="page-title-brand page-title dark-background" id="backgroundSlider">

</div>




@include('front.sections.brand')
{{-- @include('front.sections.portfolio') --}}
{{-- @include('front.sections.client-detail') --}}
@endsection

@section('script')
<script>
   document.addEventListener("DOMContentLoaded", function() {
    const images = [
        "{{ asset('assets/img/banner/BrandBanner2.webp') }}",
        "{{ asset('assets/img/banner/BrandBanner3.webp') }}",
        "{{ asset('assets/img/banner/BrandBanner4.webp') }}",
        "{{ asset('assets/img/banner/BrandBanner1.webp') }}"
    ];
    let currentIndex = 0;
    const sliderElement = document.getElementById("backgroundSlider");

    function changeBackground() {
        sliderElement.style.backgroundImage = `linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url(${images[currentIndex]})`;
        currentIndex = (currentIndex + 1) % images.length;
    }

    setInterval(changeBackground, 5000); // Change every 5 seconds
    changeBackground();
});
</script>
@endsection
