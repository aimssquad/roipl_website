@extends('front.layouts.app')

@section('content')
    @include('front.partials.page-title', ['title' => 'About us', 'current' => 'About us'])
    @include('front.sections.featured')
    @include('front.sections.member')

@endsection
