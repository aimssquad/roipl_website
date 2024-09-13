@extends('front.layouts.app')



@section('title')
   Contact Us
@endsection

@section('content')
    @include('front.partials.page-title', ['title' => 'Contact Us', 'current' => 'Contact Us'])

    @include('front.sections.contact')
@endsection
