@extends('front.layouts.app')

@section('content')
<div class="page-title page-title dark-background" style="background:   url('{{ asset('assets/img/topBanner/Teams-top-banner.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 50vh;">
    <div class="container">
        <h1>Teams</h1>
    </div>
</div>

    @include('front.sections.team')

@endsection
