<section class="events-section section">
    <div class="container" data-aos="fade-up">
        @foreach($datas->chunk(2) as $index => $chunk)
            <div class="row">
                <div class="col-md-1"></div>

                @foreach($chunk as $event)
                    <div class="col-md-5 d-flex align-items-stretch">
                        <div class="event-card card">
                            <div class="event-card-img">
                                <a href="{{ route('event-details', $event->id) }}">
                                    <img src="{{ asset('storage/'.$event->image) }}" alt="{{ $event->title }}" class="img-fluid">
                                </a>
                            </div>
                            <div class="event-card-body card-body">
                                <h5 class="event-card-title card-title">
                                    <a href="{{ route('event-details', $event->id) }}" class="event-link">{{ $event->title }}</a>
                                </h5>
                                <p class="event-card-text card-text">
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
                <div class="events-banner">
                    <img src="{{ asset('assets/img/lor_new.jpg') }}" alt="Banner Image" class="img-fluid">
                </div>
            @endif
        @endforeach
    </div>
</section>
