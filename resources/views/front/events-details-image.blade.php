@extends('front.layouts.app')

@section('content')
    @include('front.partials.page-title', ['title' => $event->title, 'current' => $event->title])
    @include('front.sections.event-image-details')


@endsection
