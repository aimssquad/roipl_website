<section id="featured-members" class="featured-members section">
    <div class="container">

        <div class="row gy-4 align-items-center features-item">

            <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">
                {{-- <h3>{{ $data->title }}</h3> --}}
                <p class="text-justify">
                     Ronak Optik’s team of over 600 dedicated professionals forms the backbone of our success. Each individual, from seasoned experts to enthusiastic newcomers, contributes with unwavering dedication, honesty, and a shared commitment to excellence. It is this collective effort that drives our organization to set higher benchmarks in the eyewear industry.
                </p>
                <p class="text-justify">
                    Our work culture is grounded in strong ethics and collaboration, where every challenge is approached with a spirit of determination and every milestone celebrated as a team victory. Together, we embody the values of trust, respect, and a relentless pursuit of perfection, ensuring that we not only meet but exceed expectations.
                </p>
                <p class="text-justify">
                    The management at Ronak Optik believes in empowering employees, fostering a nurturing environment where growth and innovation thrive. Whether it’s providing resources, offering guidance, or simply listening, the unwavering support of leadership helps our team unlock their full potential.
                </p>
                <p class="text-justify">
                    This unity of vision and purpose is what makes us more than just colleagues; we’re a family, working together to bring clarity and style to countless lives while building a legacy of excellence.
                </p>
            </div>
        </div>
      </div>
    </div>
</section>

<section id="services-2" class="services-2 section" style="margin-top: -90px !important;">

    <div class="services-carousel-wrap">
      <div class="container">
        {{-- <h2 style=" text-align: center;" class="mb-5">Glimpses of Our Yearly Visionnaire</h2> --}}
        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 4000
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
                  "slidesPerView": 3,
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
            @foreach ($team as $key => $vision)
                <div class="swiper-slide">
                    <a href="{{ asset('storage/' . $vision->image) }}"  class="glightbox preview-link">
                        <div class="service-item">
                        <div class="service-item-contents">
                            {{-- <span class="service-item-category">{{$vision->title}}</span> --}}
                            {{-- <h2 class="service-item-title">{{$vision->title}}</h2> --}}

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
