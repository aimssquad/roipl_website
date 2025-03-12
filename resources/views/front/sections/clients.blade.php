<section id="clients" class="clients section light-background" style="margin-top: -20px;">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "speed": 5000,
                    "slidesPerView": "auto",
                    "freeMode": true,
                    "autoplay": { "delay": 0, "disableOnInteraction": false },
                    "pagination": { "el": ".swiper-pagination", "type": "bullets", "clickable": true },
                    "centeredSlides": false,
                    "allowTouchMove": false,
                    "breakpoints": {
                        "320": { "slidesPerView": 2, "spaceBetween": 40, "slidesPerGroup": 1 },
                        "480": { "slidesPerView": 3, "spaceBetween": 60, "slidesPerGroup": 1 },
                        "640": { "slidesPerView": 4, "spaceBetween": 80, "slidesPerGroup": 1 },
                        "992": { "slidesPerView": 6, "spaceBetween": 120, "slidesPerGroup": 1 }
                    }
                }
            </script>
            <div class="swiper-wrapper align-items-center">
                @foreach ($logos as $logo)
                    <div class="swiper-slide"><img src="{{ asset('storage/'.$logo->image) }}" class="img-fluid" alt="{{$logo->title}}"></div>
                @endforeach
            </div>
            {{-- <div class="swiper-pagination"></div> --}}
        </div>
    </div>
</section>
