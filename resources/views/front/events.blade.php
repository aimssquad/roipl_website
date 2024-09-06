@extends('front.layouts.app')

@section('content')
    @include('front.partials.page-title', ['title' => 'Events', 'current' => 'Events'])
    @include('front.sections.event')
@endsection
