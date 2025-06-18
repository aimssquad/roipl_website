@extends('admin.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Create Award</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Award</li>
            <li class="breadcrumb-item active">Create Award</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create a New Award</h5>

                    @include('admin.partials.message')

                   <form action="{{ route('admin.awards.store') }}" method="POST">
                        @csrf

                        <!-- Month -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Month Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('month') is-invalid @enderror" name="month" value="{{ old('month') }}" required placeholder="e.g. April-2025">
                                @error('month')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><br>

                        <!-- Award Entries -->
                        <div id="award-entries">
                            <div class="award-entry row g-3 mb-3 border rounded p-3 position-relative">
                                <div class="col-md-3">
                                    <input type="text" name="awards[0][name]" class="form-control" placeholder="Employee Name" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="awards[0][designation]" class="form-control" placeholder="Designation" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="awards[0][team]" class="form-control" placeholder="Team" required>
                                </div>
                                <div class="col-md-2">
                                    <input type="color" name="awards[0][card_color]" class="form-control form-control-color" value="#000000">
                                </div>
                                <div class="col-md-1 text-end">
                                    <button type="button" class="btn btn-danger btn-sm remove-award" title="Remove">
                                        &times;
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Add More Button -->
                        <div class="mb-3">
                            <button type="button" class="btn btn-secondary" id="add-award">+ Add Another Employee</button>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Create</button>
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
    let awardIndex = 1;

    document.getElementById('add-award').addEventListener('click', function () {
        const wrapper = document.getElementById('award-entries');
        const entry = document.querySelector('.award-entry');
        const clone = entry.cloneNode(true);

        // Update field names with new index
        clone.querySelectorAll('input').forEach(input => {
            const name = input.name.replace(/\[\d+\]/, `[${awardIndex}]`);
            input.name = name;
            if (input.type !== 'color') {
                input.value = '';
            }
        });

        wrapper.appendChild(clone);
        awardIndex++;
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-award')) {
            const entries = document.querySelectorAll('.award-entry');
            if (entries.length > 1) {
                e.target.closest('.award-entry').remove();
            }
        }
    });
</script>
@endsection
