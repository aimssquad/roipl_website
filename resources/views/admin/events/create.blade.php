@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Create Event</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Event</li>
            <li class="breadcrumb-item active">Create Event</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create a New Event</h5>

                    @include('admin.partials.message')

                    <!-- Event Creation Form -->
                    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf <!-- CSRF token for security -->

                        <!-- Event Title Input -->
                        <div class="row mb-3">
                            <label for="inputEventTitle" class="col-sm-2 col-form-label">Event Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="inputEventTitle" name="title" placeholder="Enter event title" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Event Description Input -->
                        <div class="row mb-3">
                            <label for="inputEventDescription" class="col-sm-2 col-form-label">Event Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control quill-editor-full @error('description') is-invalid @enderror" id="inputEventDescription" name="description" rows="4" placeholder="Enter event description" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Event Date Input -->
                        <div class="row mb-3">
                            <label for="inputEventDate" class="col-sm-2 col-form-label">Event Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control @error('event_date') is-invalid @enderror" id="inputEventDate" name="event_date" value="{{ old('event_date') }}" required>
                                @error('event_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Event Time Input -->
                        <div class="row mb-3">
                            <label for="inputEventTime" class="col-sm-2 col-form-label">Event Time</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control @error('event_time') is-invalid @enderror" id="inputEventTime" name="event_time" value="{{ old('event_time') }}" required>
                                @error('event_time')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Event Place Input -->
                        <div class="row mb-3">
                            <label for="inputEventPlace" class="col-sm-2 col-form-label">Event Place</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('place') is-invalid @enderror" id="inputEventPlace" name="place" placeholder="Enter event place" value="{{ old('place') }}" required>
                                @error('place')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Event Image Upload -->
                        <div class="row mb-3">
                            <label for="inputEventImage" class="col-sm-2 col-form-label">Event Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="inputEventImage" name="image" accept="image/*">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Create Event</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form><!-- End Event Creation Form -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
