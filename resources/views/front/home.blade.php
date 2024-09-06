
@extends('front.layouts.app')

@section('content')
    @include('front.sections.hero')
    @include('front.sections.about')
    @include('front.sections.clients')
    @include('front.sections.why-us')
    @include('front.sections.call-to-action')
    @include('front.sections.services')
    @include('front.sections.portfolio')
    @include('front.sections.testimonials')
    @include('front.sections.team')
    {{-- @include('front.sections.pricing')
    @include('front.sections.faq') --}}
    @include('front.sections.contact')
@endsection
