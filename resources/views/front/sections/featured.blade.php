<section id="featured-members" class="featured-members section">

    <div class="container">

        @foreach($datas as $index => $data)
        <div class="row gy-4 align-items-center features-item">
            @if($index % 2 == 0)
                <!-- Text first, then Image -->
                <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
                    <h3>{{ $data->title }}</h3>
                    <p class="fst-italic">{!! $data->description !!}</p>
                </div>
                <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
                    <img src="{{ asset('storage/'.$data->image) }}" class="img-fluid" alt="">
                </div>
            @else
                <!-- Image first, then Text -->
                <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
                    <img src="{{ asset('storage/'.$data->image) }}" class="img-fluid" alt="">
                </div>
                <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
                    <h3>{{ $data->title }}</h3>
                    <p class="fst-italic">{!! $data->description !!}</p>
                </div>
            @endif
        </div>
    @endforeach


    </div>

</section>
