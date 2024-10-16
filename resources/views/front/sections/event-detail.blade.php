<section id="portfolio-details" class="portfolio-details section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

            <div class="col-lg-8">
                <div class="portfolio-details-slider swiper init-swiper">

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
                            }
                        }
                    </script>

                    <div class="swiper-wrapper align-items-center">
                        @foreach($event->images as $image)
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/'.$image->image) }}" alt="{{ $event->title }}" class="img-fluid">
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
                    <h3>Event information</h3>
                    <ul>
                        <li><strong>Category</strong>: {{ $event->category }}</li>
                        <li><strong>Client</strong>: {{ $event->client }}</li>
                        <li><strong>Project date</strong>: {{ \Carbon\Carbon::parse($event->event_date)->format('d M, Y') }}</li>
                        <li><strong>Project URL</strong>: <a href="#">{{ $event->project_url }}</a></li>
                    </ul>
                </div>
                <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
                    <h2>{{ $event->title }}</h2>
                    <p>{!! $event->description !!}</p>
                </div>
            </div>

        </div>

    </div>

</section>
