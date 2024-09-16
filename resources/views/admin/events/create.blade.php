@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Create Event</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Event</li>
            <li class="breadcrumb-item active">Create Event</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create a New Event</h5>

                    @include('admin.partials.message')

                    <!-- Event Creation Form -->
                    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Event Title Input -->
                        <div class="row mb-3">
                            <label for="inputEventTitle" class="col-sm-2 col-form-label">Event Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="inputEventTitle" name="title" placeholder="Enter event title" value="{{ old('title') }}" required>
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
                                <input type="date" class="form-control @error('event_date') is-invalid @enderror" id="inputEventDate" name="event_date" value="{{ old('event_date') }}" required>
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
                                <input type="time" class="form-control @error('event_time') is-invalid @enderror" id="inputEventTime" name="event_time" value="{{ old('event_time') }}" required>
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
                                <input type="text" class="form-control @error('place') is-invalid @enderror" id="inputEventPlace" name="place" placeholder="Enter event place" value="{{ old('place') }}" required>
                                @error('place')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

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
                            <div id="mainImagePreviewContainer" class="mt-3" style="position: relative; display: none;">
                                <img id="mainImagePreview" src="" alt="Main Image Preview" style="max-width: 200px; height: auto;">
                                <span id="removeMainImageIcon" style="position: absolute; top: 5px; right: 5px; background-color: rgba(255, 255, 255, 0.7); padding: 2px; border-radius: 50%; cursor: pointer;">
                                    <i class="bi bi-backspace-reverse-fill"></i>
                                </span>
                            </div>
                        </div>

                        <!-- Additional Event Images (Multiple Images) -->
                        <div class="row mb-3">
                            <label for="inputAdditionalEventImages" class="col-sm-2 col-form-label">Additional Event Images</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control @error('images') is-invalid @enderror" id="inputAdditionalEventImages" name="images[]" accept="image/*" multiple>
                                @error('images')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Multiple Image Previews -->
                            <div id="additionalImagesPreviewContainer" class="mt-3" style="display: flex; gap: 10px; flex-wrap: wrap;">
                                <!-- Additional images preview will be rendered here -->
                            </div>
                        </div>

                        <!-- Event Description Input -->
                        <div class="row mb-3">
                            <label for="inputEventDescription" class="col-sm-2 col-form-label">Event Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('description') is-invalid @enderror" id="inputEventDescription" name="description" rows="10" placeholder="Enter event description" >{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Create Event</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
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
    document.addEventListener('DOMContentLoaded', function() {
        const mainImageInput = document.getElementById('inputEventImage');
        const mainImagePreviewContainer = document.getElementById('mainImagePreviewContainer');
        const mainImagePreview = document.getElementById('mainImagePreview');
        const removeMainImageIcon = document.getElementById('removeMainImageIcon');

        const additionalImagesInput = document.getElementById('inputAdditionalEventImages');
        const additionalImagesPreviewContainer = document.getElementById('additionalImagesPreviewContainer');

        // Handle Single Main Image Preview
        mainImageInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    mainImagePreview.src = e.target.result;
                    mainImagePreviewContainer.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });

        // Remove Main Image Preview
        removeMainImageIcon.addEventListener('click', function() {
            mainImageInput.value = ''; // Clear the file input
            mainImagePreview.src = ''; // Clear the preview
            mainImagePreviewContainer.style.display = 'none';
        });

        // Handle Additional Images Preview
        additionalImagesInput.addEventListener('change', function() {
            additionalImagesPreviewContainer.innerHTML = ''; // Clear existing previews
            const files = Array.from(this.files);

            files.forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imageWrapper = document.createElement('div');
                    imageWrapper.style.position = 'relative';
                    imageWrapper.style.display = 'inline-block';

                    const imagePreview = document.createElement('img');
                    imagePreview.src = e.target.result;
                    imagePreview.style.maxWidth = '150px';
                    imagePreview.style.height = 'auto';
                    imagePreview.style.marginRight = '10px';
                    imagePreview.style.border = '1px solid #ddd';

                    const removeIcon = document.createElement('span');
                    removeIcon.innerHTML = '<i class="bi bi-backspace-reverse-fill"></i>';
                    removeIcon.style.position = 'absolute';
                    removeIcon.style.top = '5px';
                    removeIcon.style.right = '5px';
                    removeIcon.style.cursor = 'pointer';
                    removeIcon.style.backgroundColor = 'rgba(255, 255, 255, 0.7)';
                    removeIcon.style.padding = '2px';
                    removeIcon.style.borderRadius = '50%';

                    // Remove additional image from preview and input
                    removeIcon.addEventListener('click', function() {
                        files.splice(index, 1); // Remove from the files array
                        additionalImagesInput.files = createFileList(files); // Update the input with the remaining files
                        imageWrapper.remove(); // Remove the preview
                    });

                    imageWrapper.appendChild(imagePreview);
                    imageWrapper.appendChild(removeIcon);
                    additionalImagesPreviewContainer.appendChild(imageWrapper);
                };
                reader.readAsDataURL(file);
            });
        });

        // Helper function to create a FileList object from an array of files
        function createFileList(filesArray) {
            const dataTransfer = new DataTransfer();
            filesArray.forEach(file => dataTransfer.items.add(file));
            return dataTransfer.files;
        }
    });
</script>




@endsection
