<footer id="footer" class="footer dark-background">
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about" style="margin-top: 10px;">
                {{-- <a href="#" class="logo d-flex align-items-center">
                    <span class="sitename">ROIPL</span>
                </a> --}}
                <a href="{{ url('/') }}" class="logo d-flex align-items-center" style="margin-left: -12px;">
                    <img src="{{ asset('assets/img/ronaklogomod.png') }}" alt="">
                    {{-- <h1 class="sitename">ROIPL</h1> --}}
                </a>
                <div class="footer-contact">
                    <p>18th Floor, Biowonder</p>
                    <p>789, Anandapur Main Road</p>
                    <p>Kolkata, West Bengal: 700107</p>
                    {{-- <p class="mt-3"><strong>Phone:</strong> <span>098302 43438</span></p> --}}
                    <p><strong>Email:</strong> <span>info@ronakoptik.com</span></p>
                </div>
                <div class="social-links d-flex mt-4">
                    {{-- <a href=""><i class="bi bi-twitter-x"></i></a> --}}
                    <a href="https://www.facebook.com/profile.php?id=100094746841483&mibextid=ZbWKwL" target="_blank"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/ronakoptik?igsh=c3JreWEyMzZnMnpx" target="_blank"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.linkedin.com/company/ronak-optik-india-private-limited/" target="_blank"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="{{ route('gallery') }}" class="{{ Route::currentRouteName() == 'gallery' ? 'active' : '' }}" class="{{ Request::is('gallery') ? 'active' : '' }}">Gallery</a></li>
                    <li><a href="{{ route('careers.index') }}" class="{{ Request::is('careers') ? 'active' : '' }}">Careers</a></li>
                    {{-- <li><a href="#" class="{{ Request::is('csr') ? 'active' : '' }}">CSR</a></li> --}}
                    <li><a href="{{ route('contact') }}" class="{{ Route::currentRouteName() == 'contact' ? 'active' : '' }}">Contact Us</a></li>
                    <li><a href="{{ route('announcement') }}" class="{{ Request::is('announcement') ? 'active' : '' }}">Announcement</a></li>
                </ul>
            </div>

            {{-- <div class="col-lg-2 col-md-3 footer-links">
                <h4>Our Services</h4>
                <ul>
                    <li><a href="#">Web Design</a></li>
                    <li><a href="#">Web Development</a></li>
                    <li><a href="#">Product Management</a></li>
                    <li><a href="#">Marketing</a></li>
                    <li><a href="#">Graphic Design</a></li>
                </ul>
            </div> --}}

            <div class="col-lg-5 col-md-12 footer-newsletter">
                <h4>Our Newsletter</h4>
                <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
                <form action="forms/newsletter.php" method="post" class="php-email-form">
                    <div class="newsletter-form">
                        <input type="email" name="email">
                        <input type="submit" value="Subscribe">
                    </div>
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your subscription request has been sent. Thank you!</div>
                </form>
            </div>
        </div>
    </div>

    <div class="container copyright text-center mt-4">

        <p> &copy; <?php echo date('Y'); ?> Ronak Optik India Pvt. Ltd. All Rights Reserved</p>
        {{-- <div class="credits">
            Designed by <a href="#">Ronak Optik India Pvt. Ltd.</a>
        </div> --}}
    </div>
</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>
