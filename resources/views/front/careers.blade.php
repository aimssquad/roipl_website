@extends('front.layouts.app')

@section('content')
    @include('front.partials.page-title', ['title' => 'Careers', 'current' => 'Careers'])

    @include('front.sections.career')

@endsection
