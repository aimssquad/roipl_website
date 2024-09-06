@extends('front.layouts.app')

@section('content')
    @include('front.partials.page-title', ['title' => 'Visionnaire', 'current' => 'Visionnaire'])
    @include('front.sections.featured')

@endsection
