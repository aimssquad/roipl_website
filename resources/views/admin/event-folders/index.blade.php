
@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Manage Events</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Events Folder</li>
            <li class="breadcrumb-item active">Manage Events Folder</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-3 d-flex justify-content-start mb-3">
        <a href="{{ route('admin.event-folders.create', $event->id) }}" class="btn btn-success me-2">
            <i class="bi bi-plus-circle"></i> Create New Events Folder
        </a>
    </div>
    <div class="col-lg-3 d-flex justify-content-start mb-3">
        <form action="{{ route('admin.exportTableData') }}" method="POST" id="exportForm">
            @csrf
            <input type="hidden" name="data" id="data">
            <input type="hidden" name="headings" id="headings">
            <input type="hidden" name="filename" id="filename">
            <input type="hidden" id="filenameInput" value="Events">

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
                    <h5 class="card-title">Folders for Event: {{ $event->title }}</h5>
                    <table class="table datatable" id="myTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($folders as $index =>$folder)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><img src="{{ asset('storage/' . $folder->image_path) }}" width="50" alt="Folder Image" /></td>
                                    <td>{{ $folder->description }}</td>
                                    <td>
                                        <a href="{{ route('admin.event-folders.edit', [$event->id, $folder->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('admin.event-folders.destroy', [$event->id, $folder->id]) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
