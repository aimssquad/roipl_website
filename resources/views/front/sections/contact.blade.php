
<section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <span class="description-title">Contact Us</span>
      <h2>Contact Us</h2>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <form action="{{route('contact-save')}}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="300">
        @csrf
        <div class="row gy-4">

          <div class="col-md-12">
            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
          </div>
          <div class="col-md-6">
            <input type="text" class="form-control" name="phone" placeholder="Phone Number"  pattern="\+?[0-9\s\-\(\)]{10,15}"
            title="Please enter a valid phone number. It can include country code, spaces, dashes, and parentheses." required>
          </div>
          <div class="col-md-6 ">
            <input type="email" class="form-control" name="email" placeholder="Your Email" required>
          </div>
          <div class="col-md-12">
            <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
          </div>

          <div class="col-md-12 text-center">
            <button type="submit">Send Message</button>
          </div>

        </div>
      </form>

    </div>

  </section>
