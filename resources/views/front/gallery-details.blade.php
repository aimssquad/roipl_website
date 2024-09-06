@extends('front.layouts.app')

@section('content')
    @include('front.partials.page-title', ['title' => 'Gallery Details', 'current' => 'Gallery Details'])
    @include('front.sections.gallery-details')


@endsection
