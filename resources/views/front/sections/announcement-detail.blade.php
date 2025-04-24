<section id="blog-details" class="blog-details section">
    <div class="container">

      <article class="article">

        <div class="post-img d-flex justify-content-center">
            <img src="{{ asset('storage/'.$announcement->image1) }}" alt="" class="img-fluid">
        </div>

        <h2 class="title">{{ $announcement->title }}</h2>

        <div class="content">
          <p>
            {{ $announcement->small_description }}
          </p>

          {!! $announcement->long_description !!}

          <img src="{{ asset('storage/'.$announcement->image2)  }}" class="img-fluid" alt="">


        </div><!-- End post content -->



      </article>

    </div>
  </section><!-- /Blog Details Section -->
