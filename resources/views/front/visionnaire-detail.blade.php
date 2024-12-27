@extends('front.layouts.app')

@section('content')


<div class="page-title dark-background">
    <div class="container">
        <h1>{{ $data->title }}</h1>
        <h3>{{ $data->sub_title }} </h3>
    </div>
</div>
    @include('front.sections.visionnaire-detail')


@endsection
