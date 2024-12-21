@extends('front.layouts.app')

@section('css')


@endsection



@section('content')
<div class="page-title dark-background">
    <div class="container">
        <h1>Visionnaire </h1>
        <h3>A Visionary Event in Indian Eyewear</h3>
    </div>
</div>
    @include('front.sections.vission')
    {{-- @include('front.sections.vission-gallery') --}}

@endsection
