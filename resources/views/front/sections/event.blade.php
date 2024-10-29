<section id="events" class="events section">
    <div class="container" data-aos="fade-up">
        @foreach($datas->chunk(2) as $index => $chunk)
            <div class="row mb-5">
                <div class="col-md-1"></div>

                @foreach($chunk as $event)
                    <div class="col-md-5 d-flex align-items-stretch">
                        <div class="card">
                            <div class="card-img">
                                <a href="{{ route('event-details', $event->id) }}">
                                    <img src="{{ asset('storage/'.$event->image) }}" alt="{{ $event->title }}" class="img-fluid">
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ route('event-details', $event->id) }}">{{ $event->title }}</a>
                                </h5>
                                <p class="card-text">
                                    {!! $event->description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-md-1"></div>
            </div>

            <!-- Insert the banner after the first row of events -->
            @if($index == 0)
                <section id="call-to-action" class="call-to-action section dark-background mb-5" style="margin-top:-50px !important;">
                    <img src="{{ asset('assets/img/cta-bg.jpg') }}" alt="" class="img-fluid">
                    <div class="container">
                        <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                            <div class="col-xl-10">
                                <div class="text-center">
                                    <h3>Life at ROIPL</h3>
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        @endforeach
    </div>
</section>

