@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Manage Brands</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Brands</li>
            <li class="breadcrumb-item active">Manage Events</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-3 d-flex justify-content-start mb-3">
        <a href="{{ route('admin.brands.create') }}" class="btn btn-success me-2">
            <i class="bi bi-plus-circle"></i> Create New Brands
        </a>
    </div>
    <div class="col-lg-3 d-flex justify-content-start mb-3">
        <form action="{{ route('admin.exportTableData') }}" method="POST" id="exportForm">
            @csrf
            <input type="hidden" name="data" id="data">
            <input type="hidden" name="headings" id="headings">
            <input type="hidden" name="filename" id="filename">
            <input type="hidden" id="filenameInput" value="Brands">

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
                    <h5 class="card-title">Brands List</h5>
                    <table class="table datatable" id="myTable">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Brand</th>
                                <th>Brand Type</th>
                                <th>Small Description</th>
                                <th>Image-1</th>
                                <th>Image-2</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ ucfirst($data->brand_type) }}</td>
                                    <td>{{ $data->small_description }}</td>
                                    <td>
                                        @if($data->image1)
                                            <img src="{{ asset('storage/'.$data->image1) }}" alt="Brand Image" style="max-width: 50px;">
                                        @else
                                            No image
                                        @endif
                                    </td>
                                    <td>
                                        @if($data->image2)
                                            <img src="{{ asset('storage/'.$data->image2) }}" alt="Brand Image" style="max-width: 50px;">
                                        @else
                                            No image
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.brands.edit', $data->id) }}" class="btn btn-primary btn-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>

                                        <!-- Delete Form -->
                                        <form action="{{ route('admin.brands.destroy', $data->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this data?')">
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
