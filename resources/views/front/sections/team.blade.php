@section('css')
<style>
.award-section {
  padding: 40px 20px;

  text-align: center;
}

.award-section h2 {
  font-size: 28px;
  margin-bottom: 10px;
}

.award-section p {
  margin-bottom: 30px;
  font-size: 16px;
  color: #555;
}

.award-scroll {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 24px; /* Slightly more gap between cards */
  padding-bottom: 10px;
}

.award-scroll::-webkit-scrollbar {
  height: 8px;
}

.award-scroll::-webkit-scrollbar-thumb {
  background-color: #ccc;
  border-radius: 4px;
}

.award-card {
  background: #f8f9fa;
  border: 2px solid var(--month-color, #007bff);
  border-radius: 12px;
  padding: 16px;
  min-width: 280px;   /* Increased width */
  max-width: 320px;   /* Optional: cap it to prevent too wide */
  flex: 1 1 300px;    /* Allow wrapping with a base size */
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  transition: transform 0.3s ease;
}

.award-card:hover {
  transform: translateY(-5px);
}

.award-card h3 {
  font-size: 20px;
  margin-bottom: 15px;
  color: var(--month-color, #007bff);
}

.award-card ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.award-card li {
  margin-bottom: 15px;
  font-size: 15px;
  color: #333;
}

.award-card li strong {
  display: block;
  font-weight: 600;
  margin-bottom: 4px;
}

.award-card li small {
  color: #777;
}

@media (min-width: 1200px) {
  .award-card {
    min-width: 320px;
    max-width: 360px;
  }
}


</style>

@endsection

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

<section id="featured-members" class="featured-members section">
    <div class="container">

<div class="award-section">
  <h2>🏆 Employee Awards</h2>
  <p>Recognizing excellence across teams each month</p>

  <div class="award-scroll">
    <div class="award-card" style="--month-color:#007bff;">
      <h3>April 2025</h3>
      <ul>
        <li><strong>Rahul Mehta – Sr. Executive</strong><small>Sales</small></li>
        <li><strong>Sneha Patel – Strategist</strong><small>Marketing</small></li>
        <li><strong>Neha Desai – Designer</strong><small>Design</small></li>
      </ul>
    </div>

    <div class="award-card" style="--month-color:#1e7e34;">
      <h3>May 2025</h3>
      <ul>
         <li><strong>Rahul Mehta – Sr. Executive</strong><small>Sales</small></li>
        <li><strong>Sneha Patel – Strategist</strong><small>Marketing</small></li>
        <li><strong>Neha Desai – Designer</strong><small>Design</small></li>
      </ul>
    </div>

    <div class="award-card" style="--month-color:#007bff;">
      <h3>April 2025</h3>
      <ul>
         <li><strong>Rahul Mehta – Sr. Executive</strong><small>Sales</small></li>
        <li><strong>Sneha Patel – Strategist</strong><small>Marketing</small></li>
        <li><strong>Neha Desai – Designer</strong><small>Design</small></li>
      </ul>
    </div>




    <!-- You can add more award-card divs here -->
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
                        <div class="">
                        <div class="service-item-contents">
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
  </section>
