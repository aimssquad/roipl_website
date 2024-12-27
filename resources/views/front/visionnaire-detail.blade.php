@extends('front.layouts.app')

@section('content')
@include('front.partials.page-title', ['title' => $data->title, 'current' => $data->title])

<div class="page-title dark-background">
    <div class="container">
        <h1>{{ $data->title }}</h1>
        <h3>{{ $data->title }} </h3>
    </div>
</div>
    @include('front.sections.visionnaire-detail')


@endsection
