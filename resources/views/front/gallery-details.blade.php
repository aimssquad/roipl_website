@extends('front.layouts.app')

@section('content')
@include('front.partials.page-title', ['title' => $folder->description, 'current' => $folder->description])
    @include('front.sections.gallery-details')


@endsection
