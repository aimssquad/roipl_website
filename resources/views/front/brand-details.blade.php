@extends('front.layouts.app')

@section('content')
<div class="page-title page-title dark-background" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),  url('{{ asset('assets/img/brand2.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 14vh;padding:0;">
    {{-- <div class="container">
        <h1 style="margin-top: -56px !important;">{{$brand->title}}</h1>
    </div> --}}
</div>
@include('front.sections.brand-detail')
@endsection

@section('script')
<script>
   document.addEventListener("DOMContentLoaded", function () {
    let header = document.querySelector(".page-title");

    window.addEventListener("scroll", function () {
        if (window.scrollY > 50) {
            header.style.height = "25vh"; // Change height when scrolled
        } else {
            header.style.height = "14vh"; // Reset to default height
        }
    });
});
</script>
@endsection
