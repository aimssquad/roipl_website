@extends('front.layouts.app')

@section('content')
    @include('front.partials.page-title', ['title' => 'Carrers', 'current' => 'Carrers'])

    @include('front.sections.career')

@endsection
