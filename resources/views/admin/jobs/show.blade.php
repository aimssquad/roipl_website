@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>View Job</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Job</li>
            <li class="breadcrumb-item active">View Job</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">View Job</h5>

                    @include('admin.partials.message')


                <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td>{{ $data->title }}</td>
                        </tr>
                        <tr>
                            <th>Job Type</th>
                            <td>{{ $data->job_type }}</td>
                        </tr>
                        <tr>
                            <th>Location</th>
                            <td>{{ $data->location }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{!! $data->description !!}</td>
                        </tr>
                        <tr>
                            <th>Last Date to Apply</th>
                            <td>{{ $data->last_date_to_apply }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if($data->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                        </tr>
                    </table>

                    <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary">Back to List</a>


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
