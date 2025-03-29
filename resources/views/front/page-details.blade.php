@extends('front.layouts.app')

@section('css')

<style>
    .expanded-header {
        height: 25vh !important;
        transition: height 0.3s ease-in-out;
    }
</style>

@endsection

@section('content')
<div class="page-title page-title dark-background" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),  url('{{ asset('assets/img/brand2.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 14vh;padding:0;">
</div>
@include('front.sections.page-details')
@endsection

@section('script')
<script>
  document.addEventListener("DOMContentLoaded", function () {
    let header = document.querySelector(".page-title");

    window.addEventListener("scroll", function () {
        if (window.scrollY > 20) {
            header.classList.add("expanded-header");
        } else {
            header.classList.remove("expanded-header");
        }
    });
});
</script>
@endsection
