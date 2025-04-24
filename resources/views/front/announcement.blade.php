@php use Illuminate\Support\Str; @endphp
@extends('front.layouts.app')
@section('css')
<style>
.blog-posts-3 article {
    background-color: var(--surface-color);
    box-shadow: 0px 2px 20px rgba(0, 0, 0, 0.1);
    transition: 0.3s;
  }

  .blog-posts-3 .post-img img {
    transition: 0.5s;
  }

  .blog-posts-3 .post-date {
    background-color: var(--accent-color);
    color: var(--contrast-color);
    position: absolute;
    right: 0;
    bottom: 0;
    text-transform: uppercase;
    font-size: 13px;
    padding: 6px 12px;
    font-weight: 500;
  }

  .blog-posts-3 .post-content {
    padding: 30px;
  }

  .blog-posts-3 .post-title {
    font-size: 20px;
    color: var(--heading-color);
    font-weight: 700;
    transition: 0.3s;
    margin-bottom: 15px;
  }

  .blog-posts-3 .meta i {
    font-size: 16px;
    color: var(--accent-color);
  }

  .blog-posts-3 .meta span {
    font-size: 15px;
    color: color-mix(in srgb, var(--default-color), transparent 40%);
  }

  .blog-posts-3 p {
    margin-top: 20px;
  }

  .blog-posts-3 hr {
    color: color-mix(in srgb, var(--default-color), transparent 60%);
    margin-bottom: 15px;
  }

  .blog-posts-3 .readmore {
    display: flex;
    align-items: center;
    font-weight: 600;
    line-height: 1;
    transition: 0.3s;
    color: color-mix(in srgb, var(--heading-color), transparent 20%);
  }

  .blog-posts-3 .readmore i {
    line-height: 0;
    margin-left: 6px;
    font-size: 16px;
  }

  .blog-posts-3 article:hover .post-title,
  .blog-posts-3 article:hover .readmore {
    color: var(--accent-color);
  }

  .blog-posts-3 article:hover .post-img img {
    transform: scale(1.1);
  }

</style>
@endsection
@section('content')
    <div class="page-title page-title dark-background" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), background-size: cover; background-position: center; background-repeat: no-repeat; height: 50vh;">
        <div class="container">
            <h1>Announcements</h1>
        </div>
    </div>

    @include('front.sections.announcement')

@endsection
