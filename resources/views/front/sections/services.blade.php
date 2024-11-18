<section id="services" class="services section">
    <div class="container">

      <div class="row gy-4">

        @foreach ($events as $event)

            <div class="col-xl-6 col-lg-6 " data-aos="fade-up" data-aos-delay="100">
                <div class="service-item d-flex">
                <div class="icon flex-shrink-0"><i class="{{ $event->icon }}"></i></div>
                <div>
                    <h4 class="title"><a href="{{ route('event-details', $event->id) }}" class="stretched-link">{{ $event->title }}</a></h4>
                    <p class="description">{{ $event->short_description }} </p>
                </div>
                </div>
            </div>

        @endforeach



    </div>

  </section>
