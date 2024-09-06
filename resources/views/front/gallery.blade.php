@extends('front.layouts.app')

@section('content')
    @include('front.partials.page-title', ['title' => 'Gallery', 'current' => 'Gallery'])

    @include('front.sections.gallery')

@endsection
