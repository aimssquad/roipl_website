@extends('front.layouts.app')

@section('content')
@include('front.partials.page-title', ['title' => $event_id_sql->description, 'current' => $event_id_sql->description])
    @include('front.sections.gallery-details')


@endsection
