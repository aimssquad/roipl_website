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

<!-- Gallery Section -->
<section id="gallery" class="gallery section" style="padding: 35px 0 !important;margin-top: -50px !important;">

    <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

      <div class="row gy-4 justify-content-center">
        @foreach ($team as $image)
            <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
                <img src="{{ asset('storage/' . $image->image) }}" class="img-fluid" alt="{{ asset($image->image) }}">
                <div class="gallery-links d-flex align-items-center justify-content-center">
                <a href="{{ asset('storage/' . $image->image) }}"  class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>

                </div>
            </div>
            </div>
        @endforeach

      </div>

    </div>

  </section><!-- /Gallery Section -->

