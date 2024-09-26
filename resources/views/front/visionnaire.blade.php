@extends('front.layouts.app')

@section('content')
    @include('front.partials.page-title', ['title' => 'Visionnaire', 'current' => 'Visionnaire'])
    @include('front.sections.vission')
    @include('front.sections.vission-gallery')

@endsection
