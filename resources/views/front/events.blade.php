@extends('front.layouts.app')

@section('content')
<div class="page-title page-title dark-background" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),  url('{{ asset('storage/topBanner/Life At ROIPL-2.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 50vh;">
    <div class="container">
        <h1>Life at ROIPL</h1>
    </div>
</div>
    @include('front.sections.event')
@endsection
