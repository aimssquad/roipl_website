@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Edit Our Story</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Our Story</li>
            <li class="breadcrumb-item active">Edit Our Story</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Our Story</h5>

                    <form action="{{ route('admin.abouts.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Event Title Input -->
                        <div class="row mb-3">
                            <label for="inputEventTitle" class="col-sm-2 col-form-label"> Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="inputEventTitle" name="title" value="{{ old('title', $data->title) }}" >
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>



                    <!-- Event Image Upload (Single) -->
                    <div class="row mb-3">
                        <label for="inputEventImage" class="col-sm-2 col-form-label"> Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="inputEventImage" name="image" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Display existing single image -->
                        @if(isset($data) && $data->image)
                            <div class="mt-3">
                                <h5>Current Image:</h5>
                                <img src="{{ asset('storage/' . $data->image) }}" alt=" Image" style="max-width: 50px; height: auto;">
                            </div>
                        @endif
                    </div>


                        <!-- Event Description Input -->
                        <div class="row mb-3">
                            <label for="inputEventDescription" class="col-sm-2 col-form-label">Event Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="10" placeholder="Enter description">{{ old('description', $data->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update </button>
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

<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('description');
</script>

@endsection
