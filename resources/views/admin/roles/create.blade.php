@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Create Role</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Roles</li>
            <li class="breadcrumb-item active">Create Role</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create a New Role</h5>

                    @include('admin.partials.message')

                    <!-- Role Creation Form -->
                    <form action="{{ route('admin.roles.store') }}" method="POST">
                        @csrf <!-- CSRF token for security -->

                        <!-- Role Name Input -->
                        <div class="row mb-3">
                            <label for="inputRoleName" class="col-sm-2 col-form-label">Role Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputRoleName" name="name" placeholder="Enter role name" value="{{ old('name') }}" required>
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
                                <input type="text" class="form-control @error('guard_name') is-invalid @enderror" id="inputGuardName" name="guard_name" placeholder="Enter guard name" value="{{ old('guard_name', 'web') }}" required>
                                @error('guard_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Create Role</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form><!-- End Role Creation Form -->
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
