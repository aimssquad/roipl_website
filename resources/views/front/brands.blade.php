@extends('front.layouts.app')

@section('content')
<div class="page-title dark-background" style="background: linear-gradient(to bottom, rgba(0, 0, 0.2, 0.8), transparent), url('{{ asset('assets/img/brand-banner.png') }}'); background-size: cover; background-position: center;">
</div>
{{-- @include('front.sections.brand') --}}
@include('front.sections.portfolio')
{{-- @include('front.sections.client-detail') --}}
@endsection
