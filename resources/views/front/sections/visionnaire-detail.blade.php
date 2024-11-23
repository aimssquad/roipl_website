<!-- Gallery Section -->
<section id="gallery" class="gallery section">

    <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

      <div class="row gy-4 justify-content-center">
        @foreach ($data->images as $image)
            <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
                <img src="{{ asset('storage/' . $image->images) }}" class="img-fluid" alt="{{ asset($image->images) }}">
                <div class="gallery-links d-flex align-items-center justify-content-center">
                <a href="{{ asset('storage/' . $image->images) }}"  class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>

                </div>
            </div>
            </div>
        @endforeach

      </div>

    </div>

  </section><!-- /Gallery Section -->
