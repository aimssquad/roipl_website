@extends('front.layouts.app')

@section('content')
<div class="page-title page-title dark-background" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),  url('{{ asset('assets/img/Our-Story-top-banner-2.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 50vh;">
    <div class="container">
        <h1>Our Story</h1>
    </div>
</div>
    @include('front.sections.featured')
    @include('front.sections.clients')

@endsection
