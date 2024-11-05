<section id="services-2" class="services-2 section">

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
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 40
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
            @foreach ($images as $image)
                <div class="swiper-slide">
                <div class="service-item">
                    <div class="service-item-contents">
                    </div>
                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Image" class="img-fluid">
                </div>
                </div>
            @endforeach

          </div>
          {{-- <div class="swiper-pagination"></div> --}}
        </div>
      </div>
    </div>
  </section><!-- /Services 2 Section -->
