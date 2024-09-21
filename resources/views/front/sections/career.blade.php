
<section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <span class="description-title">Careers</span>
      <h2>Careers</h2>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <form action="{{ route('careers.store') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="300" enctype="multipart/form-data">
        @csrf
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
                    pattern="\+?[0-9\s\-\(\)]{10,15}"
                    title="Please enter a valid phone number. It can include country code, spaces, dashes, and parentheses." required>
            </div>

            <!-- Email -->
            <div class="col-md-6">
                <label for="email">Your Email</label>
                <input type="email" id="email" class="form-control" name="email" placeholder="Your Email" required>
            </div>

            <!-- Location -->
            <div class="col-md-6">
                <label for="state">State</label>
                <select id="state" name="state" class="form-control" required>
                    <option value="">Select State</option>
                    @foreach($states as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="city">City</label>
                <select id="city" name="city" class="form-control" required>
                    <option value="">Select City</option>
                </select>
            </div>


            <!-- Department -->
            <div class="col-md-6">
                <label for="department">Department</label>
                <select id="state" name="department" class="form-control" required>
                    <option value="">Select Department</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- CV Upload (only allow PDF files) -->
            <div class="col-md-6">
                <label for="cv">Upload CV (PDF only)</label>
                <input type="file" id="cv" class="form-control" name="cv" accept=".pdf" required>
            </div>

            <!-- CAPTCHA Section -->
            {{-- <div class="col-md-6">
                <label for="captcha">CAPTCHA</label>
                <input type="text" id="captcha" name="captcha" class="form-control" required>
            </div>
            <div class="col-md-6">
                <div>
                    <img src="{!! captcha_src() !!}" id="captcha-img" alt="captcha">
                </div>
                <button type="button" id="refresh-captcha" class="btn btn-sm btn-secondary">Refresh CAPTCHA</button>
            </div> --}}

            <!-- Submit Button -->
            <div class="col-md-12 text-center">
                <button type="submit">Upload</button>
            </div>
        </div>
    </form>


    </div>

  </section>

  @section('script')
<script>
//  document.getElementById('refresh-captcha').addEventListener('click', function() {
//     fetch('/refresh-captcha')
//         .then(response => response.json())
//         .then(data => {
//             // Update the captcha image src with the new one
//             document.getElementById('captcha-img').src = data.captcha + '?' + Date.now();
//         })
//         .catch(error => console.error('Error refreshing CAPTCHA:', error));
// });

document.getElementById('state').addEventListener('change', function() {
    var stateId = this.value;

    if (stateId) {
        var url = "{{ route('get.cities') }}"; // Dynamically get the correct URL
        fetch(url + '?state_id=' + stateId)
            .then(response => response.json())
            .then(data => {
                var citySelect = document.getElementById('city');
                citySelect.innerHTML = '<option value="">Select City</option>'; // Clear existing options

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
