<section id="clients" class="clients section light-background" style="margin-top: -20px;">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "speed": 600,
                    "autoplay": { "delay": 5500 },
                    "slidesPerView": "auto",
                    "pagination": { "el": ".swiper-pagination", "type": "bullets", "clickable": true },
                    "breakpoints": {
                        "320": { "slidesPerView": 2, "spaceBetween": 40, "slidesPerGroup": 2 },
                        "480": { "slidesPerView": 3, "spaceBetween": 60, "slidesPerGroup": 3 },
                        "640": { "slidesPerView": 4, "spaceBetween": 80, "slidesPerGroup": 4 },
                        "992": { "slidesPerView": 6, "spaceBetween": 120, "slidesPerGroup": 4 }
                    }
                }
            </script>
            <div class="swiper-wrapper align-items-center">
                @foreach ($logos as $logo)
                    <div class="swiper-slide"><img src="{{ asset('storage/'.$logo->image) }}" class="img-fluid" alt="{{$logo->title}}"></div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
