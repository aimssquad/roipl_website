@extends('front.layouts.app')

@section('content')
<div class="page-title-brand page-title dark-background" style="background: linear-gradient(to bottom, rgba(0, 0, 0.2, 0.8), transparent), url('{{ asset('assets/img/cta-bg.jpg') }}'); background-size: 100% auto; background-position: center; background-repeat: no-repeat; height: 500px;">
    <div class="container section-title" data-aos="fade-up">
      <h2>Brands</h2>
      <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div>
  </div>



@include('front.sections.brand')
{{-- @include('front.sections.portfolio') --}}
{{-- @include('front.sections.client-detail') --}}
@endsection
