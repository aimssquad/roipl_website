@extends('front.layouts.app')

@section('content')
    @include('front.partials.page-title', ['title' => 'Our Story', 'current' => 'Our Story'])
    @include('front.sections.featured')
    @include('front.sections.clients')

@endsection
