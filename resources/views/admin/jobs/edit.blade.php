@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Edit Job</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Page</a></li>
            <li class="breadcrumb-item active">Edit Job</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Job</h5>

                    <form action="{{ route('admin.jobs.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="inputTitle" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                id="inputTitle" value="{{ old('title', $data->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="inputDescription" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="10" placeholder= "Description" >{{ old('description', $data->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                        </div>

                        <!-- Location -->
                        <div class="mb-3">
                            <label for="inputLocation" class="form-label">Location</label>
                            <input type="text" name="location" class="form-control"
                                id="inputLocation" value="{{ old('location', $data->location) }}">
                        </div>

                        <!-- Job Type -->
                        <div class="mb-3">
                            <label for="inputJobType" class="form-label">Job Type</label>
                            <select name="job_type" class="form-select" id="inputJobType">
                                <option value="Full-time" {{ $data->job_type == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                <option value="Part-time" {{ $data->job_type == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                <option value="Internship" {{ $data->job_type == 'Internship' ? 'selected' : '' }}>Internship</option>
                                <option value="Contract" {{ $data->job_type == 'Contract' ? 'selected' : '' }}>Contract</option>
                            </select>
                        </div>

                        <!-- Last Date to Apply -->
                        <div class="mb-3">
                            <label for="inputLastDate" class="form-label">Last Date to Apply</label>
                            <input type="date" name="last_date_to_apply" class="form-control"
                                id="inputLastDate" value="{{ old('last_date_to_apply', $data->last_date_to_apply) }}">
                        </div>

                      <div class="mb-3">
                            <label class="form-label">Status</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_active" id="active" value="1"
                                    {{ $data->is_active ? 'checked' : '' }}>
                                <label class="form-check-label" for="active">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_active" id="inactive" value="0"
                                    {{ !$data->is_active ? 'checked' : '' }}>
                                <label class="form-check-label" for="inactive">Inactive</label>
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')


<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('description');
</script>

@endsection
