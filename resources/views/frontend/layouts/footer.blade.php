<!-- ==============================================
    ** Footer **
    =================================================== -->
<footer class="site-footer">

    <!-- Footer Top: Logo + About + Links -->
    <div class="footer-main">
        <div class="container">
            <div class="row">

                <!-- Brand Column -->
                <div class="col-md-3 col-sm-6 footer-col">
                    <div class="footer-brand">
                        <a href="{{ url('/') }}">
                            <img src="{{ get_logo() }}" alt="{{ get_setting('site_title') }}" class="footer-logo">
                        </a>
                        <p class="footer-tagline">
                            {{ get_setting('site_description', 'Empowering students with world-class education and career support.') }}
                        </p>
                        <ul class="social-links">
                            <li><a href="{{ get_setting('facebook_url', '#') }}" target="_blank"><i
                                        class="fa fa-facebook"></i></a></li>
                            <li><a href="{{ get_setting('twitter_url', '#') }}" target="_blank"><i
                                        class="fa fa-twitter"></i></a></li>
                            <li><a href="{{ get_setting('linkedin_url', '#') }}" target="_blank"><i
                                        class="fa fa-linkedin"></i></a></li>
                            <li><a href="{{ get_setting('youtube_url', '#') }}" target="_blank"><i
                                        class="fa fa-youtube-play"></i></a></li>
                            <li><a href="{{ get_setting('instagram_url', '#') }}" target="_blank"><i
                                        class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-md-2 col-sm-6 footer-col">
                    <h4 class="footer-heading">Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Our Courses</a></li>
                        <li><a href="#">Gallery</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Courses -->
                <div class="col-md-3 col-sm-6 footer-col">
                    <h4 class="footer-heading">Popular Courses</h4>
                    <ul class="footer-links">
                        <li><a href="#">2 Year Online MBA General</a></li>
                        <li><a href="#">Certificate in HRM</a></li>
                        <li><a href="#">Certificate in Marketing</a></li>
                        <li><a href="#">Certificate in Finance</a></li>
                        <li><a href="#">Corporate Programs</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="col-md-4 col-sm-6 footer-col">
                    <h4 class="footer-heading">Contact Us</h4>
                    <ul class="footer-contact-list">
                        @if(get_setting('contact_address'))
                            <li>
                                <span class="contact-icon"><i class="fa fa-map-marker"></i></span>
                                <span>{{ get_setting('contact_address') }}</span>
                            </li>
                        @endif
                        @if(get_setting('contact_email'))
                            <li>
                                <span class="contact-icon"><i class="fa fa-envelope-o"></i></span>
                                <a href="mailto:{{ get_setting('contact_email') }}">{{ get_setting('contact_email') }}</a>
                            </li>
                        @endif
                        @if(get_setting('contact_phone'))
                            <li>
                                <span class="contact-icon"><i class="fa fa-phone"></i></span>
                                <span>{{ get_setting('contact_phone') }}</span>
                            </li>
                        @endif
                    </ul>

                    <!-- Newsletter -->
                    <div class="newsletter-box">
                        <p class="newsletter-label">Subscribe to our Newsletter</p>
                        <form class="newsletter-form">
                            <input type="email" placeholder="Enter your email address">
                            <button type="submit"><i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer Bottom Bar -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <p class="copyright">
                        &copy; {{ date('Y') }} <strong>{{ get_setting('site_title', 'Step Up Master IT') }}</strong>.
                        All rights reserved.
                    </p>
                </div>
                <div class="col-sm-6 text-right">
                    <ul class="footer-bottom-links">
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Sitemap</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Scroll to top -->
<a href="#" class="scroll-top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>

<!-- Optional JavaScript -->
<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('frontend/assets/matchHeight/js/matchHeight-min.js') }}"></script>
<script src="{{ asset('frontend/assets/bxslider/js/bxslider.min.js') }}"></script>
<script src="{{ asset('frontend/assets/waypoints/js/waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/assets/counterup/js/counterup.min.js') }}"></script>
<script src="{{ asset('frontend/assets/magnific-popup/js/magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/assets/owl-carousel/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/modernizr.custom.js') }}"></script>
<script src="{{ asset('frontend/js/custom.js') }}"></script>

<style>
    /* =============================================
   FOOTER STYLES
   ============================================= */
    .site-footer {
        background: #1b305c;
        color: rgba(255, 255, 255, 0.75);
        font-size: 14px;
    }

    .footer-main {
        padding: 70px 0 50px;
    }

    .footer-col {
        margin-bottom: 30px;
    }

    /* Brand */
    .footer-logo {
        max-height: 75px;
        width: auto;
        margin-bottom: 20px;
        filter: brightness(0) invert(1);
    }

    .footer-tagline {
        color: rgba(255, 255, 255, 0.6);
        font-size: 13px;
        line-height: 22px;
        margin-bottom: 20px;
    }

    /* Social Icons */
    .social-links {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .social-links li a {
        width: 36px;
        height: 36px;
        background: rgba(255, 255, 255, 0.08);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: rgba(255, 255, 255, 0.7);
        font-size: 14px;
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .social-links li a:hover {
        background: #ff9600;
        color: #fff;
        border-color: #ff9600;
        transform: translateY(-3px);
    }

    /* Footer Headings */
    .footer-heading {
        font-size: 14px;
        font-weight: 700;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 22px;
        padding-bottom: 12px;
        border-bottom: 2px solid #ff9600;
        display: inline-block;
        width: 100%;
    }

    /* Footer Links */
    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-links li {
        margin-bottom: 10px;
    }

    .footer-links li a {
        color: rgba(255, 255, 255, 0.6);
        font-size: 13px;
        text-decoration: none !important;
        transition: all 0.3s ease;
        padding-left: 14px;
        position: relative;
    }

    .footer-links li a::before {
        content: '\f105';
        font-family: FontAwesome;
        position: absolute;
        left: 0;
        color: #ff9600;
        font-size: 12px;
    }

    .footer-links li a:hover {
        color: #ff9600;
        padding-left: 20px;
    }

    /* Footer Contact List */
    .footer-contact-list {
        list-style: none;
        padding: 0;
        margin: 0 0 25px;
    }

    .footer-contact-list li {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 14px;
        color: rgba(255, 255, 255, 0.65);
        font-size: 13px;
        line-height: 1.5;
    }

    .footer-contact-list li .contact-icon {
        width: 30px;
        height: 30px;
        background: rgba(255, 255, 255, 0.08);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ff9600;
        font-size: 13px;
        flex-shrink: 0;
        margin-top: 2px;
    }

    .footer-contact-list li a {
        color: rgba(255, 255, 255, 0.65);
        text-decoration: none !important;
    }

    .footer-contact-list li a:hover {
        color: #ff9600;
    }

    /* Newsletter */
    .newsletter-box {
        margin-top: 5px;
    }

    .newsletter-label {
        color: rgba(255, 255, 255, 0.7);
        font-size: 12px;
        margin-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .newsletter-form {
        display: flex;
        gap: 0;
        border-radius: 50px;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.15);
    }

    .newsletter-form input {
        flex: 1;
        background: rgba(255, 255, 255, 0.08);
        border: none;
        padding: 10px 16px;
        color: #fff;
        font-size: 13px;
        outline: none;
    }

    .newsletter-form input::placeholder {
        color: rgba(255, 255, 255, 0.4);
        text-transform: none;
    }

    .newsletter-form button {
        background: #ff9600;
        border: none;
        padding: 10px 18px;
        color: #fff;
        cursor: pointer;
        font-size: 14px;
        transition: background 0.3s ease;
    }

    .newsletter-form button:hover {
        background: #e08500;
    }

    /* Footer Bottom */
    .footer-bottom {
        background: rgba(0, 0, 0, 0.25);
        padding: 18px 0;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
    }

    .footer-bottom .copyright {
        color: rgba(255, 255, 255, 0.55);
        margin: 0;
        font-size: 13px;
        line-height: 36px;
    }

    .footer-bottom .copyright strong {
        color: #fff;
    }

    .footer-bottom-links {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        justify-content: flex-end;
        gap: 5px;
        flex-wrap: wrap;
    }

    .footer-bottom-links li {
        line-height: 36px;
    }

    .footer-bottom-links li a {
        color: rgba(255, 255, 255, 0.5);
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        text-decoration: none !important;
        padding: 0 10px;
        border-right: 1px solid rgba(255, 255, 255, 0.2);
    }

    .footer-bottom-links li:last-child a {
        border-right: none;
    }

    .footer-bottom-links li a:hover {
        color: #ff9600;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .footer-main {
            padding: 50px 0 30px;
        }
    }

    @media (max-width: 767px) {
        .footer-col {
            margin-bottom: 35px;
        }

        .footer-bottom .text-right {
            text-align: left !important;
            margin-top: 5px;
        }

        .footer-bottom-links {
            justify-content: flex-start;
        }

        .footer-bottom .copyright {
            line-height: 1.5;
            margin-bottom: 8px;
        }
    }

    @media (max-width: 479px) {
        .footer-logo {
            max-height: 60px;
        }
    }
</style>