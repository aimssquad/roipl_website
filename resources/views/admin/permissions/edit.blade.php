@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Edit Permission</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.permissions.index') }}">Permission</a></li>
            <li class="breadcrumb-item active">Edit Role</li>
        </ol>
    </nav>
</div>

<!-- Include the message blade for success/error messages -->
@include('admin.partials.message')

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Permission</h5>

                    <!-- Edit Role Form -->
                    <form action="{{ route('admin.permissions.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Use PUT for updating -->

                        <!-- Role Name Input -->
                        <div class="row mb-3">
                            <label for="inputRoleName" class="col-sm-2 col-form-label">Permission Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputRoleName" name="name" value="{{ old('name', $data->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Guard Name Input -->
                        <div class="row mb-3">
                            <label for="inputGuardName" class="col-sm-2 col-form-label">Guard Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('guard_name') is-invalid @enderror" id="inputGuardName" name="guard_name" value="{{ old('guard_name', $data->guard_name) }}" required>
                                @error('guard_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update Permissions</button>
                            <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form><!-- End Edit Role Form -->

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
