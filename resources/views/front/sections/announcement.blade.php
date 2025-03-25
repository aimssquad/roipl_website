<!-- Blog Posts Section -->
<section id="blog-posts-3" class="blog-posts-3 section">

    <div class="container">
      <div class="row gy-4">
  @foreach ($announcements as $announcement)
  <div class="col-lg-4">
    <article class="position-relative h-100">

      <div class="post-img position-relative overflow-hidden">
        <img src="{{ asset('storage/'.$announcement->image1) }}" class="img-fluid" alt="">
        <span class="post-date">{{ date("F d", strtotime($announcement->created_at)) }}</span>
      </div>

      <div class="post-content d-flex flex-column">

        <h3 class="post-title">{{ $announcement->title }}</h3>

        <p>
            {{ Str::limit($announcement->small_description, 100) }}
        </p>

        <hr>

        <a href="{{ route('announcement-details', ['id' => $announcement->id]) }}" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

      </div>

    </article>
  </div>
  @endforeach


      </div>
    </div>

  </section>
