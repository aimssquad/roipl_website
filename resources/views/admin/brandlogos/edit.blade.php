@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Edit Brand</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Brand</li>
            <li class="breadcrumb-item active">Edit Brand</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Brand</h5>

                    @include('admin.partials.message')

                    <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Use PUT for the update request -->

                        <!-- Title -->
                        <div class="row mb-3">
                            <label for="inputBrandTitle" class="col-sm-2 col-form-label">Brand</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="inputBrandTitle" name="title" placeholder="Enter brand title" value="{{ old('title', $brand->title) }}" required>
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
                                    <option value="" disabled>Select Brand Type</option>
                                    <option value="premium" {{ (old('brand_type', $brand->brand_type) == 'premium') ? 'selected' : '' }}>Premium</option>
                                    <option value="luxury" {{ (old('brand_type', $brand->brand_type) == 'luxury') ? 'selected' : '' }}>luxury</option>
                                    <option value="house" {{ (old('brand_type', $brand->brand_type) == 'house') ? 'selected' : '' }}>House</option>
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
                                <textarea name="small_description" class="form-control @error('small_description') is-invalid @enderror" id="inputSmallDescription" cols="30" rows="3" placeholder="Enter small description">{{ old('small_description', $brand->small_description) }}</textarea>
                                @error('small_description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Long Description with CKEditor -->
                        <div class="row mb-3">
                            <label for="inputLongDescription" class="col-sm-2 col-form-label">Long Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('long_description') is-invalid @enderror" id="long_description" name="long_description" rows="10" placeholder="Enter long description">{{ old('long_description', $brand->long_description) }}</textarea>
                                @error('long_description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Image -->
                        <div class="row mb-3">
                            <label for="inputImage1" class="col-sm-2 col-form-label">Image 1</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control @error('image1') is-invalid @enderror" id="inputImage1" name="image1" accept="image/*">
                                @if($brand->image1)
                                    <img src="{{ asset('storage/' . $brand->image1) }}" alt="Image 1" width="100">
                                @endif
                                @error('image1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>



                        <!-- Submit and Reset Buttons -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update Logo</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
</section>

@endsection

