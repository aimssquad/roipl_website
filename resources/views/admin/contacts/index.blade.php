@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Manage Contacts</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Contacts</li>
            <li class="breadcrumb-item active">Manage Contacts</li>
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
    <button type="submit" class="btn btn-primary btn-sm">Export to Excel</button>
</form>
</div>

@include('admin.partials.message')

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Contacts List</h5>
                    <table class="table datatable" id="myTable">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Status</th>
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
                                    <td>{{ $data->phone }}</td>
                                    <td>{{ $data->message }}</td>
                                    <td>
                                        <span class="badge {{ $data->status == 1 ? 'bg-danger' : 'bg-success' }} toggle-status"
                                              data-id="{{ $data->id }}"
                                              style="cursor: pointer;">
                                            {{ $data->status == 1 ? 'Unchecked' : 'Checked' }}
                                        </span>
                                    </td>
                                    <td>
                                        <!-- Edit Button -->
                                        {{-- <a href="{{ route('admin.contacts.edit', $data->id) }}" class="btn btn-primary btn-sm" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a> --}}

                                        <!-- Delete Form -->
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
</section>
@endsection


@section('script')

<script>
    $(document).ready(function() {
        $('#exportForm').on('submit', function(e) {
            // Prevent form submission until data is collected
            e.preventDefault();

            let tableData = [];
            let tableHeadings = [];

            // Collect table headings
            $('#myTable thead th').each(function() {
                tableHeadings.push($(this).text());
            });

            // Collect table data
            $('#myTable tbody tr').each(function() {
                let row = [];
                $(this).find('td').each(function() {
                    row.push($(this).text());
                });
                tableData.push(row);
            });

            // Set the form inputs with collected data
            $('#data').val(JSON.stringify(tableData));
            $('#headings').val(JSON.stringify(tableHeadings));

            // Submit the form after data is set
            $(this).off('submit').submit();
        });
    });
</script>

@endsection
