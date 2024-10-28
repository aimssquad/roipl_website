@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Create Event</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.event-folders.index', $event->id) }}">{{ $event->title }}</a></li>
            <li class="breadcrumb-item active">Edit Event Folder</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Folder for Event: {{ $event->title }}</h5>

                    @include('admin.partials.message')

                    <!-- Event Creation Form -->
                    <form action="{{ route('admin.event-folders.update', [$event->id, $folder->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="image" class="form-label">Folder Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <!-- Display current image -->
                            <p>Current Image:</p>
                            <img src="{{ asset('storage/' . $folder->image_path) }}" width="100" alt="Folder Image" />
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required>{{ $folder->description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Folder</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
@endsection
