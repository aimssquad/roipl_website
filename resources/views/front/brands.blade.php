@extends('front.layouts.app')

@section('content')
    @include('front.partials.page-title', ['title' => 'Brands', 'current' => 'Brands'])
    @include('front.sections.brand')
    @include('front.sections.client-detail')






@endsection
