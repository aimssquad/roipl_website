@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Manage Jobs</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Events</li>
            <li class="breadcrumb-item active">Manage Jobs</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-3 d-flex justify-content-start mb-3">
        <a href="{{ route('admin.jobs.create') }}" class="btn btn-success me-2">
            <i class="bi bi-plus-circle"></i> Create New Job
        </a>
    </div>
    <div class="col-lg-3 d-flex justify-content-start mb-3">
        <form action="{{ route('admin.exportTableData') }}" method="POST" id="exportForm">
            @csrf
            <input type="hidden" name="data" id="data">
            <input type="hidden" name="headings" id="headings">
            <input type="hidden" name="filename" id="filename">
            <input type="hidden" id="filenameInput" value="jobs-list">

            <button type="submit" class="btn btn-primary btn-sm">Export to Excel</button>
        </form>
    </div>
</div>


@include('admin.partials.message')

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Events List</h5>
                    <table class="table datatable" id="myTable">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Location</th>
                                <th>Last date of Apply</th>
                                <th>Status</th>
                                <th>Applications</th>
                                <th>Copy Apply Link</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->job_type }}</td>
                                    <td>{{ $data->location }}</td>
                                    <td>{{ $data->last_date_to_apply }}</td>
                                    <td>
                                        @if($data->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $data->applications_count }}</td>
                                    <td>
                                        <button class="btn btn-secondary btn-sm" onclick="copyToClipboard('{{ url('career/apply/' . base64_encode($data->id)) }}')">
                                            <i class="bi bi-clipboard"></i> Copy Link
                                        </button>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.jobs.edit', $data->id) }}" class="btn btn-primary btn-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <a href="{{ route('admin.jobs.show', $data->id) }}" class="btn btn-primary btn-sm">
                                            <i class="bi bi-eye"></i> View
                                        </a>
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

@section('script')
<script>
    function copyToClipboard(link) {
        navigator.clipboard.writeText(link).then(() => {
            alert('Apply link copied to clipboard!');
        }).catch(err => {
            alert('Failed to copy link.');
        });
    }
</script>
@endsection
