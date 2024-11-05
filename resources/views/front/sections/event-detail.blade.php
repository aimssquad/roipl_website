<section id="blog-posts-2" class="blog-posts-2 section">
    <div class="container">


            <div class="row gy-4">
                @foreach ($folders as $index =>$folder)
                    <div class="col-lg-4">
                        <article class="position-relative h-100">
                            <div class="post-img position-relative overflow-hidden">
                                <img src="{{ asset('storage/' . $folder->image_path) }}" class="img-fluid" alt="{{ $folder->description }}">
                            </div>
                            <div class="post-content d-flex flex-column">
                                <h3 class="post-title">{{ $folder->description }}</h3>
                                <a href="{{ route('event-image.details', [$event->id, $folder->id]) }}" class="readmore stretched-link"><span>See More</span><i class="bi bi-arrow-right"></i></a>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>


    </div>
</section>
