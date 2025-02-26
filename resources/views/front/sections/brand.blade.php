<section id="portfolio" class="portfolio section " style="background: url('{{ asset('assets/img/brand2.jpg') }}') no-repeat center center/cover;">
    <div class="container section-title" data-aos="fade-up">
        <h1 style="color: white !important;margin-top: 130px;">Our Brands</h1>
    </div>
    <div class="container px-6">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
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
                                <a href="{{ route('brand-details', $brand->id) }}" title="More Details" class="details-link">
                                    <img src="{{ asset('storage/'.$brand->image1) }}" class="img-fluid" alt="{{ $brand->title }}">
                                </a>
                            @else
                                <img src="{{ asset('assets/img/placeholder.jpg') }}" class="img-fluid" alt="No Image Available">
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
