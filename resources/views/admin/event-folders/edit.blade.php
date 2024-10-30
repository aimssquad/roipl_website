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

                        <!-- Main Image -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Main Folder Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <p>Current Image:</p>
                            <img src="{{ asset('storage/' . $folder->image_path) }}" width="100" alt="Folder Image" />
                        </div>

                        <!-- Multiple Images -->
                        <div class="mb-3">
                            <label class="form-label">Additional Images</label>
                            <div class="mb-2">
                                @foreach ($images as $image)
                                    <div class="d-inline-block text-center image-container" style="margin-right: 15px;" data-id="{{ $image->id }}">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" width="100" alt="Folder Image" />
                                        <br>
                                        <button type="button" class="btn btn-sm btn-danger mt-1 delete-image-btn" data-event="{{ $event->id }}" data-folder="{{ $folder->id }}" data-image="{{ $image->id }}">Delete</button>
                                    </div>
                                @endforeach
                            </div>
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                            <small class="text-muted">Upload additional images if needed.</small>
                        </div>

                        <!-- Description -->
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

<script>
  $(document).ready(function() {
        $('.delete-image-btn').click(function() {
            var eventId = $(this).data('event');
            var folderId = $(this).data('folder');
            var imageId = $(this).data('image');
            var button = $(this); // Reference to the button clicked

            // Construct the URL
            var url = `/admin/events/${eventId}/folders/${folderId}/images/${imageId}`;
            console.log('AJAX URL:', url);  // Print URL to console for debugging

            $.ajax({
                url: url,  // Use the constructed URL here
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Remove the image from the DOM
                    button.closest('.image-container').remove();
                    alert(response.message);
                },
                error: function(xhr) {
                    alert('An error occurred while deleting the image.');
                }
            });
        });
    });

</script>
@endsection
