<section id="featured-members" class="featured-members section">
    <div class="container">
        @foreach ($datas as $key => $data)
        <div class="row gy-4 align-items-center features-item">
            @if ($key % 2 == 0)
            <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
                <img src="{{ asset('storage/'.$data->image) }}" class="img-fluid" alt="">
            </div>
            <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
                <h3>{{ $data->title }}</h3>
                <p class="fst-italic">{!! $data->description !!}</p>
            </div>
            @else
            <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
                <h3>{{ $data->title }}</h3>
                <p class="fst-italic">{!! $data->description !!}</p>
            </div>
            <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
                <img src="{{ asset('storage/'.$data->image) }}" class="img-fluid" alt="">
            </div>
            @endif
        </div>
        @endforeach
      </div>
    </div>
</section>

<section id="services-2" class="services-2 section" style="margin-top: -110px !important;">

    <div class="services-carousel-wrap">
      <div class="container">
        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "navigation": {
                "nextEl": ".js-custom-next",
                "prevEl": ".js-custom-prev"
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 20
                },
                "1200": {
                  "slidesPerView": 4,
                  "spaceBetween": 20
                }
              }
            }
          </script>
          <button class="navigation-prev js-custom-prev">
            <i class="bi bi-arrow-left-short"></i>
          </button>
          <button class="navigation-next js-custom-next">
            <i class="bi bi-arrow-right-short"></i>
          </button>
          <div class="swiper-wrapper">
            @foreach ($visions as $key => $vision)
                <div class="swiper-slide">
                    <a href="{{ route('visionnaire-details', $vision->id) }}">
                        <div class="service-item">
                        <div class="service-item-contents">
                            {{-- <span class="service-item-category">{{$vision->title}}</span> --}}
                            <h2 class="service-item-title">{{$vision->title}}</h2>

                        </div>
                        <img src="{{ asset('storage/'.$vision->image) }}" alt="Image" class="img-fluid">
                        </div>
                    </a>
                </div>
            @endforeach

            </div>




          </div>

        </div>
      </div>
    </div>
  </section><!-- /Services 2 Section -->
