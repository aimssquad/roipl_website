@section('css')
<style>
   #blog-details a {  /* Only apply styles inside #blog-details */
      color: #1e066e !important;
   }
</style>
@endsection

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <section id="blog-details" >
                <div class="container" style="margin-top:-20px !important;">
                   <h3 class="text-center mt-0" >{{ $page->title }}</h3>
                   {!! $page->content !!}
                </div>
            </section>
        </div>
    </div>
</div>
