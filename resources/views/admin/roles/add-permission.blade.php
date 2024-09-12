@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Permissions Role :: {{ $role->name }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Role: {{ $role->name }}</li>
            <li class="breadcrumb-item active">Role Permissions :: {{ $role->name }}</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Role Permissions :: {{ $role->name }}</h5>

                    @include('admin.partials.message')
                    <form action="{{ route('admin.roles.save-permission', $role->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <button type="button" id="selectAllBtn" class="btn btn-info">Select All</button>
                        </div>

                        @error('permission')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <!-- Permissions Section -->
                        <div class="row mb-3">
                            <label class="col-form-label">Assign Permissions to Role</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    @foreach ($permission as $permissions)
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input permission-checkbox" type="checkbox" name="permission[]" value="{{ $permissions->name }}"
                                             {{ in_array($permissions->id,$rolePermission) ? 'checked':'' }}>
                                            <label class="form-check-label" for="permission{{ $permissions->id }}">
                                                {{ $permissions->name }}
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Save</button>
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
    document.getElementById('selectAllBtn').addEventListener('click', function() {
        let checkboxes = document.querySelectorAll('.permission-checkbox');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = true;
        });
    });

</script>
@endsection
