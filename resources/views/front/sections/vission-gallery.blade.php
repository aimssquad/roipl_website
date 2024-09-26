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
            <div class="swiper-slide">
              <div class="service-item">
                <div class="service-item-contents">
                  {{-- <a href="#">
                    <span class="service-item-category">We do</span>
                    <h2 class="service-item-title">Planting</h2>
                  </a> --}}
                </div>
                <img src="assets/img/service/3350-web-banner-31-05_1024x1024.webp" alt="Image" class="img-fluid">
              </div>
            </div>
            <div class="swiper-slide">
              <div class="service-item">
                <div class="service-item-contents">
                  {{-- <a href="#">
                    <span class="service-item-category">We do</span>
                    <h2 class="service-item-title">Mulching</h2>
                  </a> --}}
                </div>
                <img src="assets/img/service/2023_050_IDEE_Web_Banners_Dippers-02_2048x.webp" alt="Image" class="img-fluid">
              </div>
            </div>
            <div class="swiper-slide">
              <div class="service-item">
                <div class="service-item-contents">
                  {{-- <a href="#">
                    <span class="service-item-category">We do</span>
                    <h2 class="service-item-title">Watering</h2>
                  </a> --}}
                </div>
                <img src="assets/img/service/18x18irus10_742bc1b8-52ef-4dcf-a839-8929400866db_2048x.webp" alt="Image" class="img-fluid">
              </div>
            </div>
            <div class="swiper-slide">
                <div class="service-item">
                  <div class="service-item-contents">
                    {{-- <a href="#">
                      <span class="service-item-category">We do</span>
                      <h2 class="service-item-title">Watering</h2>
                    </a> --}}
                  </div>
                  <img src="assets/img/service/SHARKSUNGLASSES_2_1200x1200.webp" alt="Image" class="img-fluid">
                </div>
              </div>

          </div>
          {{-- <div class="swiper-pagination"></div> --}}
        </div>
      </div>
    </div>
  </section><!-- /Services 2 Section -->
