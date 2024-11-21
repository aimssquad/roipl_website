@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Edit Visionnaire</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.visionnairedetails.index') }}">{{ $data->title }}</a></li>
            <li class="breadcrumb-item active">Edit Visionnaire Folder</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Folder for Visionnaire: {{ $data->title }}</h5>

                    @include('admin.partials.message')

                    <!-- Event Creation Form -->
                    <form action="{{ route('admin.visionnairedetails.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="inputEventTitle" class="col-sm-2 col-form-label"> Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="inputEventTitle" name="title" value="{{ $data->title }}" placeholder="Enter event title" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Main Image -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Main Folder Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <p>Current Image:</p>
                            <img src="{{ asset('storage/' . $data->image) }}" width="100" id="inputEventImage" alt="Folder Image" />


                            <div id="mainImagePreviewContainer" class="mt-3" style="position: relative; display: none;">
                                <img id="mainImagePreview" src="" alt="Main Image Preview" style="max-width: 200px; height: auto;">
                                <span id="removeMainImageIcon" style="position: absolute; top: 5px; right: 5px; background-color: rgba(255, 255, 255, 0.7); padding: 2px; border-radius: 50%; cursor: pointer;">
                                    <i class="bi bi-backspace-reverse-fill"></i>
                                </span>
                            </div>
                        </div>

                        <!-- Multiple Images -->
                        <div class="mb-3">
                            <label class="form-label">Additional Images</label>
                            <div class="mb-2">
                                @foreach ($data->images as $image)
                                    <div class="d-inline-block text-center image-container" style="margin-right: 15px;" data-id="{{ $image->id }}">

                                        <img src="{{ asset('storage/' . $image->images) }}" width="100" alt="Folder Image" />
                                        <br>
                                        <button type="button" class="btn btn-danger btn-sm delete-image-btn mt-1" data-id="{{ $image->id }}">
                                            Delete
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                            <input type="file" class="form-control"  id="inputAdditionalEventImages" name="images[]" multiple>
                            <small class="text-muted">Upload additional images if needed.</small>

                            <div id="additionalImagesPreviewContainer" class="mt-3" style="display: flex; gap: 10px; flex-wrap: wrap;">
                            </div>
                        </div>



                        <button type="submit" class="btn btn-primary">Update </button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')



<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-image-btn').forEach(button => {
        button?.addEventListener('click', function () { // Optional chaining to avoid null errors
            const imageId = this.getAttribute('data-id');
            const container = this.closest('.image-container');

            if (!imageId) {
                alert('Image ID is missing.');
                return;
            }

            if (confirm('Are you sure you want to delete this image?')) {
                const url = `{{ url('/admin/image/delete') }}/${imageId}`;

                $.ajax({
                    url: url, // Use the constructed URL here
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token for Laravel
                    },
                    success: function (response) {
                        if (response.success) {
                            container.remove(); // Remove the image container from the DOM
                            alert(response.message || 'Image deleted successfully.');
                        } else {
                            alert(response.message || 'Failed to delete image. Please try again.');
                        }
                    },
                    error: function (xhr) {
                        console.error('Error response:', xhr);
                        alert('An error occurred while deleting the image.');
                    }
                });
            }
        });
    });
});


</script>


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
