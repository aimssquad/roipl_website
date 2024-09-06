@extends('front.layouts.app')

@section('content')
    @include('front.partials.page-title', ['title' => 'Event Details', 'current' => 'Event Details'])
    @include('front.sections.event-detail')

@endsection
