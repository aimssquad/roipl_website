@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Manage Careers</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Careers</li>
            <li class="breadcrumb-item active">Manage Careers</li>
        </ol>
    </nav>
</div>
{{-- <div class="mb-3">
    <a href="{{ route('admin.contacts.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Create New Contacts
    </a>
</div> --}}
<div class="mb-3">
    <form action="{{ route('admin.exportTableData') }}" method="POST" id="exportForm">
        @csrf
        <input type="hidden" name="data" id="data">
        <input type="hidden" name="headings" id="headings">
        <input type="hidden" name="filename" id="filename">

        <input type="hidden" id="filenameInput" value="Careers" required>

        <button type="submit" class="btn btn-primary btn-sm">Export to Excel</button>
    </form>
</div>

@include('admin.partials.message')

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Careers List</h5>
                    <div style="overflow-x: auto; white-space: nowrap;">
                        <table class="table table-striped datatable scrolled" id="myTable" style="min-width: 1000px;">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Department</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>CV</th>
                                    <th style="width: 200px;">Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $index => $data)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $data->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->phone_number }}</td>
                                        <td>{{ $data->department->department_name }}</td>
                                        <td>{{ $data->state->name }}</td>
                                        <td>{{ $data->city->city }}</td>
                                        <td><a href="{{ asset('storage/' . $data->cv) }}" target="_blank" download><i class="bi bi-arrow-down-square" title="CV Download"></i></a></td>
                                        <td>
                                            <select class="form-select status-dropdown" data-id="{{ $data->id }}" style="width: 180px;"> <!-- Set width for dropdown -->
                                                <option value="new" {{ $data->status == 'new' ? 'selected' : '' }}>New Application</option>
                                                <option value="shortlisted" {{ $data->status == 'shortlisted' ? 'selected' : '' }}>Shortlisted</option>
                                                <option value="interview" {{ $data->status == 'interview' ? 'selected' : '' }}>Interview</option>
                                                <option value="hired" {{ $data->status == 'hired' ? 'selected' : '' }}>Hired</option>
                                                <option value="rejected" {{ $data->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                            </select>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.contacts.destroy', $data->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this data?')">
                                                    <i class="bi bi-trash" title="Delete"></i>
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
    </div>
</section>
@endsection


@section('script')

<script>
    $(document).on('change', '.status-dropdown', function () {
        var status = $(this).val(); // Get the selected status
        var careerId = $(this).data('id'); // Get the career ID

        // Send an AJAX request to update the status
        $.ajax({
            url: '{{ route("admin.careers.updateStatus") }}', // Your route to handle the status update
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}', // Include CSRF token for security
                id: careerId,
                status: status
            },
            success: function (response) {
                if (response.success) {
                    alert('Status updated successfully');
                } else {
                    alert('Failed to update status');
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred while updating status');
            }
        });
    });
</script>



@endsection
