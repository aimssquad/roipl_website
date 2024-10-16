<section id="events" class="events section">
    <div class="container" data-aos="fade-up">
        <div class="row">
            @foreach($datas as $event)
                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="card">
                        <div class="card-img">
                            <img src="{{ asset('storage/'.$event->image) }}" alt="{{ $event->title }}" class="img-fluid">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('event-details', $event->id) }}">{{ $event->title }}</a></h5>
                            <p class="card-text">
                                {!! $event->description !!}
                            </p>
                            <p class="fst-italic text-center">{{ \Carbon\Carbon::parse($event->event_date)->format('l, F jS \a\t g:i A') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
