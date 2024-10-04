<section id="portfolio" class="portfolio section" style="background-color: #000 !important;">

    <div class="container px-6">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <!-- Filter Options -->
            <div class="row align-items-center">
                <div class="col-lg-12 text-center text-lg-center">
                    <ul class="portfolio-filters isotope-filters white-text-color" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        @foreach($brands->unique('brand_type') as $brand)
                            <li data-filter=".filter-{{ strtolower($brand->brand_type) }}">
                                {{ ucfirst($brand->brand_type) }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                @foreach($brands as $brand)
                    <div class="col-lg-3 col-md-6 portfolio-item isotope-item filter-{{ strtolower($brand->brand_type) }}">
                        <div class="portfolio-content h-100">
                            @if($brand->image1)
                                <img src="{{ asset('storage/'.$brand->image1) }}" class="img-fluid" alt="Brand Image">
                            @else
                                <img src="{{ asset('assets/img/placeholder.jpg') }}" class="img-fluid" alt="No Image Available">
                            @endif
                            <div class="portfolio-info">
                                <h4>{{ $brand->title }}</h4>
                                <p>{{ $brand->small_description }}</p>
                                <div>
                                    <a href="{{ asset('storage/'.$brand->image1) }}" title="{{ $brand->title }}" data-gallery="portfolio-gallery-{{ strtolower($brand->brand_type) }}" class="glightbox preview-link">
                                        <i class="bi bi-zoom-in"></i>
                                    </a>
                                    <a href="{{ route('brand-details', $brand->id) }}" title="More Details" class="details-link">
                                        <i class="bi bi-link-45deg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</section>
