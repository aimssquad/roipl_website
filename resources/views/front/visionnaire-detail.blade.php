@extends('front.layouts.app')

@section('content')
@include('front.partials.page-title', ['title' => $data->title, 'current' => $data->title])
    @include('front.sections.visionnaire-detail')


@endsection
