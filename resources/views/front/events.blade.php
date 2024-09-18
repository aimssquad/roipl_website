@extends('front.layouts.app')

@section('content')
    @include('front.partials.page-title', ['title' => 'Life at ROIPL', 'current' => 'Life at ROIPL'])
    @include('front.sections.event')
@endsection
