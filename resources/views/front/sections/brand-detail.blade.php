<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <section id="blog-details" class="blog-details section">
                <div class="container">
                    <article class="article">
                        <!-- Brand Image -->
                        <div class="post-img">
                            <img src="{{ asset('storage/'.$brand->image1) }}" alt="{{ $brand->title }}" class="img-fluid">
                        </div>

                        <!-- Brand Title -->
                        <h2 class="title">{{ $brand->title }}</h2>

                        <!-- Brand Description -->
                        <div class="content">
                            <p>
                                {{ $brand->small_description }}
                            </p>

                            <!-- Long Description (if available) -->
                            @if($brand->long_description)
                                {!! $brand->long_description !!}
                            @else
                                <p>No further details available for this brand.</p>
                            @endif

                            <!-- Optional Blockquote (Example) -->
                            {{-- <blockquote>
                                <p>
                                    {{ $brand->quote ?? 'Default quote or description here if no specific quote exists.' }}
                                </p>
                            </blockquote> --}}

                            <!-- Optional Additional Image -->
                            @if($brand->image2)
                                <img src="{{ asset('storage/'.$brand->image2) }}" class="img-fluid" alt="Additional Image">
                            @endif

                            <!-- Dynamic Sections (Optional) -->
                            {{-- <h3>More Information</h3>
                            <p>
                                {{ $brand->additional_info ?? 'No additional information available.' }}
                            </p> --}}
                        </div>
                    </article>
                </div>
            </section>
        </div>
    </div>
</div>
