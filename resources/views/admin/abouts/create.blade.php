@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Create Our Story</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Our Story</li>
            <li class="breadcrumb-item active">Create Our Story</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create a New Our Story</h5>

                    @include('admin.partials.message')

                    <!-- Event Creation Form -->
                    <form action="{{ route('admin.abouts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Event Title Input -->
                        <div class="row mb-3">
                            <label for="inputEventTitle" class="col-sm-2 col-form-label"> Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="inputEventTitle" name="title" placeholder="Enter title" value="{{ old('title') }}" >
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Event Date Input -->


                        <!-- Event Time Input -->


                        <!-- Event Place Input -->


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
                            <div id="mainImagePreviewContainer" class="mt-3" style="position: relative; display: none;">
                                <img id="mainImagePreview" src="" alt="Main Image Preview" style="max-width: 200px; height: auto;">
                                <span id="removeMainImageIcon" style="position: absolute; top: 5px; right: 5px; background-color: rgba(255, 255, 255, 0.7); padding: 2px; border-radius: 50%; cursor: pointer;">
                                    <i class="bi bi-backspace-reverse-fill"></i>
                                </span>
                            </div>
                        </div>


                        <!-- Event Description Input -->
                        <div class="row mb-3">
                            <label for="inputEventDescription" class="col-sm-2 col-form-label">Event Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="10" placeholder= "Description" >{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Create </button>
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

        // Helper function to create a FileList object from an array of files
        function createFileList(filesArray) {
            const dataTransfer = new DataTransfer();
            filesArray.forEach(file => dataTransfer.items.add(file));
            return dataTransfer.files;
        }
    });
</script>


<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('description');
</script>



@endsection
