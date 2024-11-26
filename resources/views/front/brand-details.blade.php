@extends('front.layouts.app')

@section('content')
@include('front.partials.page-title', ['title' => $brand->title, 'current' => $brand->title])
@include('front.sections.brand-detail')
@endsection
