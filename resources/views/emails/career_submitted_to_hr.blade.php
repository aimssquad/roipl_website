<p>A new career submission has been made:</p>
<p><strong>Name:</strong> {{ $name }}</p>
<p><strong>Email:</strong> {{ $email }}</p>
<p><strong>Phone Number:</strong> {{ $phone_number }}</p>
@if (!empty($department))
    <p><strong>Department:</strong> {{ $department }}</p>
@elseif (!empty($job))
    <p><strong>Job Title:</strong> {{ $job }}</p>
@endif
<p><strong>CV:</strong> <a href="{{ $cv_link }}">Download CV</a></p>
