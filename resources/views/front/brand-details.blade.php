@extends('front.layouts.app')

@section('content')
<div class="page-title dark-background" style="background-image: url('{{asset('assets/img/event-banner.jpg')}}'); background-size: cover; background-position: center;">
    <div class="container">
        <h1 style="color: white !important;">IDEE</h1>
    </div>
</div>
    @include('front.sections.brand-detail')
@endsection