@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Edit Event</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Event</li>
            <li class="breadcrumb-item active">Edit Event</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Event</h5>

                    <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Event Title Input -->
                        <div class="row mb-3">
                            <label for="inputEventTitle" class="col-sm-2 col-form-label">Event Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="inputEventTitle" name="title" value="{{ old('title', $event->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Event Date Input -->
                        <div class="row mb-3">
                            <label for="inputEventDate" class="col-sm-2 col-form-label">Event Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control @error('event_date') is-invalid @enderror" id="inputEventDate" name="event_date" value="{{ old('event_date', $event->event_date) }}" required>
                                @error('event_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Event Time Input -->
                        <div class="row mb-3">
                            <label for="inputEventTime" class="col-sm-2 col-form-label">Event Time</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control @error('event_time') is-invalid @enderror" id="inputEventTime" name="event_time" value="{{ old('event_time', $event->event_time) }}" required>
                                @error('event_time')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Event Place Input -->
                        <div class="row mb-3">
                            <label for="inputEventPlace" class="col-sm-2 col-form-label">Event Place</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('place') is-invalid @enderror" id="inputEventPlace" name="place" placeholder="Enter event place" value="{{ old('place', $event->place) }}" required>
                                @error('place')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


     <!-- Event Image Upload (Single) -->
     <div class="row mb-3">
        <label for="inputEventImage" class="col-sm-2 col-form-label">Event Image</label>
        <div class="col-sm-10">
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="inputEventImage" name="image" accept="image/*">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Display existing single image -->
        @if(isset($event) && $event->image)
            <div class="mt-3">
                <h5>Current Image:</h5>
                <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" style="max-width: 50px; height: auto;">
            </div>
        @endif
    </div>

    <!-- Event Multiple Image Upload -->
    <div class="row mb-3">
        <label for="inputEventImages" class="col-sm-2 col-form-label">Additional Event Images</label>
        <div class="col-sm-10">
            <input type="file" class="form-control @error('images.*') is-invalid @enderror" id="inputEventImages" name="images[]" multiple accept="image/*">
            @error('images.*')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Display existing additional images -->
        @if(isset($event) && $event->images->count())
            <div class="mt-3">
                <h5>Current Additional Images:</h5>
                <div class="row">
                    @foreach($event->images as $image)
                        <div class="col-md-3 mb-3">
                            <div style="position: relative;">
                                <img src="{{ asset('storage/' . $image->image) }}" alt="Event Image" style="width: 50px; height: auto;  object-fit: cover;">

                                <!-- Delete button -->
                                <form action="{{ route('admin.events.images.destroy', $image->id) }}" method="POST" style="position: absolute; top: 5px; right: 5px;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?');">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
                        <!-- Event Description Input -->
                        <div class="row mb-3">
                            <label for="inputEventDescription" class="col-sm-2 col-form-label">Event Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('description') is-invalid @enderror" id="inputEventDescription" name="description" rows="10" placeholder="Enter event description">{{ old('description', $event->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update Event</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')


<script>
    document.getElementById('inputEventImage').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        const preview = document.getElementById('imagePreview');
        preview.src = e.target.result;
        document.getElementById('imagePreviewContainer').style.display = 'block';
    };

    if (file) {
        reader.readAsDataURL(file);
    }
});

</script>

@endsection
