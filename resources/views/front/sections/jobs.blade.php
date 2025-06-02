<section id="jobs" class="contact section py-5">
    <div class="container" data-aos="fade-up">

        <div class="row">
            @foreach($datas as $job)
                @php
                    $lastDate = \Carbon\Carbon::parse($job->last_date_to_apply);
                    $isExpired = $lastDate->isToday() || $lastDate->isPast();
                @endphp

                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $job->title }}</h5>
                            <p class="card-text">{!! Str::limit(strip_tags($job->description), 100) !!}</p>

                            <ul class="list-unstyled mb-3">
                                <li><strong>Location:</strong> {{ $job->location }}</li>
                                <li><strong>Type:</strong> {{ $job->job_type }}</li>
                                <li><strong>Last Date:</strong> {{ $lastDate->format('d M, Y') }}</li>
                            </ul>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-end">
                            <a href="{{ route('career.apply', base64_encode($job->id)) }}"
                                class="btn btn-sm btn-primary {{ $isExpired ? 'disabled' : '' }}"
                                {{ $isExpired ? 'aria-disabled=true' : '' }}>
                                {{ $isExpired ? 'Closed' : 'Apply Now' }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($datas->isEmpty())
            <div class="alert alert-info">No job openings at the moment.</div>
        @endif
    </div>
</section>
