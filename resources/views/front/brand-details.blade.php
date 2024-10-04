@extends('front.layouts.app')

@section('content')
<div class="page-title dark-background" style="background-image: url('{{asset('assets/img/brand/Banner-1.jpg')}}'); background-size: cover; background-position: center;">
    <div class="container">
        <h1 style="color: white !important;">{{ $brand->title }}</h1>
    </div>
</div>
    @include('front.sections.brand-detail')
@endsection
