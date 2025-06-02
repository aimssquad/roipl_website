
<section id="contact" class="contact section">
    <!-- Section Title -->


    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Display job details at the top -->
        <div class="mb-4 p-3 border rounded bg-light">
            <h5 class="mb-2"><strong>Position:</strong> {{ $job->title }}</h5>
            <p><strong>Location:</strong> {{ $job->location }}</p>
            <p><strong>Type:</strong> {{ $job->job_type }}</p>
            <p><strong>Job Description :</strong> {!! $job->description !!}</p>
        </div>

        <form action="{{ route('career.apply.submit') }}" method="POST" class="php-email-form" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="job_id" value="{{ $job->id }}">

            <div class="row gy-4">
                <!-- Name -->
                <div class="col-md-12">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" required>
                </div>

                <!-- Phone -->
                <div class="col-md-6">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" class="form-control" name="phone_number" placeholder="Phone Number"
                        pattern="[0-9\s\-\(\)]{10,15}"
                        title="Please enter a valid phone number." required>
                </div>

                <!-- Email -->
                <div class="col-md-6">
                    <label for="email">Your Email</label>
                    <input type="email" id="email" class="form-control" name="email" placeholder="Your Email" required>
                </div>

                <!-- State -->
                <div class="col-md-6">
                    <label for="state">State</label>
                    <select id="state" name="state" class="form-control" required>
                        <option value="">Select State</option>
                        @foreach($states as $state)
                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- City -->
                <div class="col-md-6">
                    <label for="city">City</label>
                    <select id="city" name="city" class="form-control" required>
                        <option value="">Select City</option>
                    </select>
                </div>

                <!-- CV Upload (only allow PDF files) -->
                <div class="col-md-6">
                    <label for="cv">Upload CV (PDF only)</label>
                    <input type="file" id="cv" class="form-control" name="cv" accept=".pdf" required>
                </div>

                <!-- Consent Checkbox -->
                <div class="col-md-12">
                    <div class="form-check">
                        <input type="checkbox" id="consent-checkbox" class="form-check-input">
                        <label class="form-check-label" for="consent-checkbox">
                            I do hereby confirm that the information provided in my resume is true and correct.
                            I give my consent to process personal data for the job application.
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary" id="upload-btn" disabled>Upload</button>
                </div>
            </div>
        </form>
    </div>
</section>

@section('script')
<script>
    // Enable submit button only if checkbox is checked
    document.addEventListener("DOMContentLoaded", function() {
        const checkbox = document.getElementById("consent-checkbox");
        const submitBtn = document.getElementById("upload-btn");

        checkbox.addEventListener("change", function() {
            submitBtn.disabled = !checkbox.checked;
        });
    });

    // Show uploading state on form submit
    const form = document.querySelector('.php-email-form');
    const uploadBtn = document.getElementById('upload-btn');

    form.addEventListener('submit', function() {
        uploadBtn.disabled = true;
        uploadBtn.textContent = 'Uploading...';
    });

    // Load cities based on selected state
    document.getElementById('state').addEventListener('change', function() {
        var stateId = this.value;

        if (stateId) {
            var url = "{{ route('get.cities') }}";
            fetch(url + '?state_id=' + stateId)
                .then(response => response.json())
                .then(data => {
                    var citySelect = document.getElementById('city');
                    citySelect.innerHTML = '<option value="">Select City</option>';

                    data.forEach(function(city) {
                        var option = document.createElement('option');
                        option.value = city.id;
                        option.textContent = city.city;
                        citySelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching cities:', error));
        } else {
            document.getElementById('city').innerHTML = '<option value="">Select City</option>';
        }
    });
</script>
@endsection
