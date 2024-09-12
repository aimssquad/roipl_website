@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Manage Role</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Roles</li>
            <li class="breadcrumb-item active">Manage Role</li>
        </ol>
    </nav>
</div>
<div class="mb-3">
    <a href="{{ route('admin.roles.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Create New Role
    </a>
</div>

@include('admin.partials.message')

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Roles List</h5>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.roles.edit', $data->id) }}" class="btn btn-primary btn-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <a href="{{ route('admin.roles.give-permission', $data->id) }}" class="btn btn-info btn-sm text-white">
                                            <i class="bi bi-file-earmark-lock"></i> Permission
                                        </a>

                                        <!-- Delete Form -->
                                        <form action="{{ route('admin.roles.destroy', $data->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this role?')">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
