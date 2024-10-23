@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Create Brand</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Brand</li>
            <li class="breadcrumb-item active">Create Brand</li>
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

                    <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
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

                        <div class="row mb-3">
                            <label for="inputBrandType" class="col-sm-2 col-form-label">Brand Type</label>
                            <div class="col-sm-10">
                                <select class="form-control @error('brand_type') is-invalid @enderror" id="inputBrandType" name="brand_type" required>
                                    <option value="" disabled selected>Select Brand Type</option>
                                    <option value="house" {{ old('brand_type') == 'house' ? 'selected' : '' }}>In House Brands</option>
                                    <option value="luxury" {{ old('brand_type') == 'luxury' ? 'selected' : '' }}>International & Semi Luxury Brands</option>
                                    <option value="premium" {{ old('brand_type') == 'premium' ? 'selected' : '' }}>Luxury Brands</option>
                                </select>
                                @error('brand_type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Small Description -->
                        <div class="row mb-3">
                            <label for="inputSmallDescription" class="col-sm-2 col-form-label">Small Description</label>
                            <div class="col-sm-10">
                                <textarea name="small_description" class="form-control @error('small_description') is-invalid @enderror" id="inputSmallDescription" cols="30" rows="3" placeholder="Enter small description">{{ old('small_description') }}</textarea>
                                @error('small_description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Long Description -->
                        <div class="row mb-3">
                            <label for="inputLongDescription" class="col-sm-2 col-form-label">Long Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('long_description') is-invalid @enderror" id="long_description" name="long_description" rows="10" placeholder="Enter long description">{{ old('long_description') }}</textarea>
                                @error('long_description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Image 1 -->
                        <div class="row mb-3">
                            <label for="inputImage1" class="col-sm-2 col-form-label">Image 1</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control @error('image1') is-invalid @enderror" id="inputImage1" name="image1" accept="image/*">
                                @error('image1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Image 2 -->
                        <div class="row mb-3">
                            <label for="inputImage2" class="col-sm-2 col-form-label">Image 2</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control @error('image2') is-invalid @enderror" id="inputImage2" name="image2" accept="image/*">
                                @error('image2')
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
