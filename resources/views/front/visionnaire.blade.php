@extends('front.layouts.app')

@section('css')


@endsection



@section('content')
{{-- <div class="page-title dark-background">
    <div class="container">
        <h1>Visionnaire </h1>
        <h3>A Visionary Event in Indian Eyewear</h3>
    </div>
</div> --}}

<div class="page-title page-title dark-background" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),  url('{{ asset('assets/img/Visionnaire.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 50vh;">
    <div class="container">
        <h1>Visionnaire</h1>
        <h3>A Visionary Event in Indian Eyewear</h3>
    </div>
</div>
    @include('front.sections.vission')
    {{-- @include('front.sections.vission-gallery') --}}

@endsection
