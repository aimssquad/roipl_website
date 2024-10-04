@extends('front.layouts.app')

@section('content')
<div class="page-title-brand page-title dark-background" style="background: black  url('{{ asset('assets/img/brand/Banner-1.jpg') }}'); background-size: 100% auto; background-position: center; background-repeat: no-repeat; height: 500px;">
  </div>



@include('front.sections.brand')
{{-- @include('front.sections.portfolio') --}}
{{-- @include('front.sections.client-detail') --}}
@endsection
