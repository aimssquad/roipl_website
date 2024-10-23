@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Create Brand Logo</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Brand Logo</li>
            <li class="breadcrumb-item active">Add Brand Logo</li>
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

                    <form action="{{ route('admin.brandlogos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Title -->
                        <div class="row mb-3">
                            <label for="inputBrandTitle" class="col-sm-2 col-form-label">Brand</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="inputBrandTitle" name="title" placeholder="Enter brand title" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Image 1 -->
                        <div class="row mb-3">
                            <label for="inputImage1" class="col-sm-2 col-form-label">Logo</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="inputImage1" name="image" accept="image/*">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <!-- Submit and Reset Buttons -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Create Brand</button>
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
    CKEDITOR.replace('long_description');
</script>
@endsection
