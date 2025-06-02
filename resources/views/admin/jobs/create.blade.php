@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Create Job</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Job</li>
            <li class="breadcrumb-item active">Create Job</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create a New Job</h5>

                    @include('admin.partials.message')

                   <form action="{{ route('admin.jobs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Title -->
                        <div class="row mb-3">
                            <label for="inputEventTitle" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="inputEventTitle" name="title" placeholder="Enter title" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="row mb-3">
                            <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="10" placeholder= "Description" >{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="row mb-3">
                            <label for="inputLocation" class="col-sm-2 col-form-label">Location</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('location') is-invalid @enderror" id="inputLocation" name="location" placeholder="Enter job location" value="{{ old('location') }}">
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Job Type -->
                        <div class="row mb-3">
                            <label for="inputJobType" class="col-sm-2 col-form-label">Job Type</label>
                            <div class="col-sm-10">
                                <select class="form-control @error('job_type') is-invalid @enderror" id="inputJobType" name="job_type">
                                    <option value="">Select job type</option>
                                    <option value="Full-time" {{ old('job_type') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                    <option value="Part-time" {{ old('job_type') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                    <option value="Internship" {{ old('job_type') == 'Internship' ? 'selected' : '' }}>Internship</option>
                                    <option value="Contract" {{ old('job_type') == 'Contract' ? 'selected' : '' }}>Contract</option>
                                </select>
                                @error('job_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Last Date to Apply -->
                        <div class="row mb-3">
                            <label for="inputLastDate" class="col-sm-2 col-form-label">Last Date to Apply</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control @error('last_date_to_apply') is-invalid @enderror" id="inputLastDate" name="last_date_to_apply" value="{{ old('last_date_to_apply') }}">
                                @error('last_date_to_apply')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Is Active -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('is_active') is-invalid @enderror" type="radio" name="is_active" id="activeYes" value="1" {{ old('is_active', '1') == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="activeYes">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('is_active') is-invalid @enderror" type="radio" name="is_active" id="activeNo" value="0" {{ old('is_active') == '0' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="activeNo">Inactive</label>
                                </div>
                                @error('is_active')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Create</button>
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

<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('description');
</script>

@endsection
