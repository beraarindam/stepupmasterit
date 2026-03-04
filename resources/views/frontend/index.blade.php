@extends('frontend.layouts.master')
@section('title', 'Home')
@section('content')
    <!-- ==============================================
                                ** Banner Carousel **
                                =================================================== -->
    <div class="banner-outer">
        <div class="banner-slider">
            @forelse($banners as $banner)
                <div class="dynamic-slide"
                    style="background: url('{{ asset($banner->image) }}') no-repeat center center / cover;">
                    <div class="container">
                        <div class="content">
                            <h1 class="animated fadeInUp">{{ $banner->title }}</h1>
                            @if($banner->subtitle)
                                <p class="animated fadeInUp">{{ $banner->subtitle }}</p>
                            @endif
                            @if($banner->button_text)
                                <a href="{{ $banner->link ?? '#' }}" class="btn animated fadeInUp">{{ $banner->button_text }} <span
                                        class="icon-more-icon"></span></a>
                            @else
                                <a href="#" class="btn animated fadeInUp">Know More <span class="icon-more-icon"></span></a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="slide2">
                    <div class="container">
                        <div class="content">
                            <h1 class="animated fadeInUp">Welcome to <span>Our Institution</span></h1>
                            <p class="animated fadeInUp">Elevating education through innovation and excellence for a brighter
                                future.</p>
                            <a href="#" class="btn animated fadeInUp">Know More <span class="icon-more-icon"></span></a>
                        </div>
                    </div>
                </div>
                <div class="slide3">
                    <div class="container">
                        <div class="content animated fadeInLeft">
                            <h1 class="animated fadeInLeft">Online MBA</h1>
                            <p class="animated fadeInLeft">Flexible programs designed for working professionals.</p>
                            <a href="#" class="btn animated fadeInLeft">Know More <span class="icon-more-icon"></span></a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    <style>
        /* Dynamic Banner Slide Styles */
        .banner-outer .dynamic-slide {
            display: block;
            height: 588px;
            background-size: cover !important;
            background-position: center center !important;
        }

        .banner-outer .dynamic-slide .container {
            display: table;
            height: 100%;
        }

        .banner-outer .dynamic-slide .content {
            display: table-cell;
            vertical-align: middle;
            text-align: center;
        }

        .banner-outer .dynamic-slide .content h1 {
            font-size: 54px;
            color: #fff;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
            padding-bottom: 20px;
        }

        .banner-outer .dynamic-slide .content p {
            color: #fff;
            font-size: 18px;
            padding-bottom: 25px;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.5);
            max-width: 600px;
            margin: 0 auto 15px;
        }

        @media (max-width: 767px) {
            .banner-outer .dynamic-slide {
                height: 350px;
            }

            .banner-outer .dynamic-slide .content h1 {
                font-size: 28px;
            }
        }
    </style>

    <!-- ==============================================
                                ** Who We Are (About Us) **
                                =================================================== -->
    <section class="about padding-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-content">
                        <h2><span>Who We Are</span> About Our Institution</h2>
                        <p>{{ get_setting('site_description') }}</p>
                        <p>We are dedicated to providing the highest quality education and training to empower the next
                            generation of professionals. Our commitment to excellence is reflected in our diverse range of
                            courses and world-class facilities.</p>
                        <ul class="check-list">
                            <li><i class="fa fa-check-circle"></i> Certified Professional Instructors</li>
                            <li><i class="fa fa-check-circle"></i> Comprehensive Learning Materials</li>
                            <li><i class="fa fa-check-circle"></i> Industry-Recognized Certifications</li>
                            <li><i class="fa fa-check-circle"></i> Career Placement Support</li>
                        </ul>
                        <a href="#" class="btn btn-primary-custom">Learn More About Us</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-img mt-mobile-40">
                        <img src="{{ asset('frontend/images/about-img.jpg') }}" class="img-responsive rounded-xl shadow-lg"
                            alt="About Us" onerror="this.src='https://placehold.co/600x400?text=About+Us'">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==============================================
                                ** Our Services List **
                                =================================================== -->
    <section class="services-section padding-lg bg-gray-light">
        <div class="container text-center">
            <div class="section-header mb-50">
                <h2>Our Specialized Services</h2>
                <p>We offer a wide range of academic and support services to ensure every student succeeds.</p>
            </div>
            <div class="row">
                @foreach($services as $service)
                    <div class="col-sm-4 mb-30">
                        <div class="service-card transition-all">
                            <div class="icon-wrapper">
                                @if($service->icon_image)
                                    <img src="{{ asset($service->icon_image) }}" alt="{{ $service->title }}">
                                @else
                                    <i class="fa fa-graduation-cap"></i>
                                @endif
                            </div>
                            <h3>{{ $service->title }}</h3>
                            <p>{{ Str::limit($service->short_description, 100) }}</p>
                            <a href="#" class="read-more">Read More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ==============================================
                                ** Global Statistics **
                                =================================================== -->
    <section class="why-choose padding-lg bg-dark text-white">
        <div class="container">
            <h2 class="text-white text-center mb-50">Empowering Students Worldwide</h2>
            <ul class="our-strength">
                <li>
                    <div class="icon"><span class="icon-certification-icon"> </span></div>
                    <span class="counter">36</span>
                    <div class="title">Certified Courses</div>
                </li>
                <li>
                    <div class="icon"><span class="icon-student-icon"></span></div>
                    <span class="counter">258,658</span>
                    <div class="title">Students Enrolled </div>
                </li>
                <li>
                    <div class="icon"><span class="icon-book-icon"></span></div>
                    <div class="couter-outer"><span class="counter">95</span><span>%</span></div>
                    <div class="title">Success Rate</div>
                </li>
                <li>
                    <div class="icon"><span class="icon-parents-icon"></span></div>
                    <div class="couter-outer"><span class="counter">100</span><span>%</span></div>
                    <div class="title">Satisfied Students</div>
                </li>
            </ul>
        </div>
    </section>

    <!-- ==============================================
                                ** Course List **
                                =================================================== -->
    <section class="course-list padding-lg">
        <div class="container">
            <div class="section-header text-center mb-50">
                <h2>Popular Courses</h2>
                <p>Explore our most sought-after programs designed for your career growth.</p>
            </div>
            <div class="row">
                @foreach($courses as $course)
                    <div class="col-sm-4 mb-40">
                        <div class="course-item shadow-sm transition-all hover-translate-y">
                            <div class="course-thumb">
                                <img src="{{ asset($course->image) }}" class="img-responsive" alt="{{ $course->title }}"
                                    onerror="this.src='https://placehold.co/600x400?text=Course+Image'">
                                <div class="course-overlay">
                                    <a href="#" class="btn btn-white-outline">View Details</a>
                                </div>
                            </div>
                            <div class="course-info p-25">
                                <div class="meta mb-15">
                                    <span class="duration"><i class="fa fa-clock-o"></i> {{ $course->duration }}</span>
                                    <span class="fee pull-right text-primary font-bold">{{ $course->fee }}</span>
                                </div>
                                <h3 class="mb-15"><a href="#">{{ $course->title }}</a></h3>
                                <p class="text-gray">{{ Str::limit($course->short_description, 120) }}</p>
                                <div class="footer-meta mt-20 pt-15 border-top">
                                    <a href="#" class="enroll-btn text-primary font-bold">Enroll Now <i
                                            class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-30">
                <a href="#" class="btn btn-dark-outline btn-lg">View All Courses</a>
            </div>
        </div>
    </section>

    <!-- ==============================================
                                ** Custom Styles **
                                =================================================== -->
    <style>
        .bg-gray-light {
            background-color: #f9fafb;
        }

        .bg-dark {
            background-color: #1b305c;
        }

        .text-white {
            color: #fff !important;
        }

        .text-primary {
            color: #1b305c !important;
        }

        .mb-30 {
            margin-bottom: 30px;
        }

        .mb-40 {
            margin-bottom: 40px;
        }

        .mb-50 {
            margin-bottom: 50px;
        }

        .p-25 {
            padding: 25px;
        }

        .p-20 {
            padding: 20px;
        }

        .mt-20 {
            margin-top: 20px;
        }

        .mt-mobile-40 {
            margin-top: 40px;
        }

        .pt-15 {
            padding-top: 15px;
        }

        .pb-15 {
            padding-bottom: 15px;
        }

        .border-top {
            border-top: 1px solid #edf2f7;
        }

        .rounded-xl {
            border-radius: 12px;
        }

        .shadow-lg {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
        }

        .shadow-sm {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        }

        .transition-all {
            transition: all 0.3s ease;
        }

        .hover-translate-y:hover {
            transform: translateY(-10px);
        }

        /* About Section */
        .check-list {
            list-style: none;
            padding: 0;
            margin: 25px 0;
        }

        .check-list li {
            font-size: 16px;
            margin-bottom: 12px;
            color: #4a5568;
        }

        .check-list li i {
            color: #5cb85c;
            margin-right: 10px;
            font-size: 18px;
        }

        /* Service Cards */
        .service-card {
            background: #fff;
            padding: 40px 30px;
            border-radius: 15px;
            border: 1px solid #edf2f7;
            text-align: center;
        }

        .service-card:hover {
            border-color: #1b305c;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
        }

        .service-card .icon-wrapper {
            width: 70px;
            height: 70px;
            background: #f0f7ff;
            color: #1b305c;
            line-height: 70px;
            font-size: 30px;
            border-radius: 50%;
            margin: 0 auto 25px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .service-card .icon-wrapper img {
            max-width: 40px;
        }

        .service-card h3 {
            font-size: 20px;
            margin-bottom: 15px;
        }

        .service-card p {
            color: #718096;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .service-card .read-more {
            font-weight: 700;
            color: #1b305c;
            text-decoration: none;
        }

        /* Course Items */
        .course-item {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .course-thumb {
            position: relative;
            overflow: hidden;
        }

        .course-thumb img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .course-item:hover .course-thumb img {
            transform: scale(1.1);
        }

        .course-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(27, 48, 92, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .course-item:hover .course-overlay {
            opacity: 1;
        }

        .course-info h3 {
            font-size: 18px;
            font-weight: 700;
        }

        .course-info h3 a {
            color: #2d3748;
            text-decoration: none;
        }

        .course-info h3 a:hover {
            color: #1b305c;
        }

        .course-info .meta span {
            font-size: 13px;
            color: #718096;
        }

        .btn-primary-custom {
            background-color: #1b305c;
            color: #fff;
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: 700;
        }

        .btn-white-outline {
            border: 2px solid #fff;
            color: #fff;
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 700;
        }

        .btn-dark-outline {
            border: 2px solid #1b305c;
            color: #1b305c;
            padding: 12px 35px;
            border-radius: 50px;
            font-weight: 700;
        }

        @media (max-width: 767px) {
            .mt-mobile-40 {
                margin-top: 40px;
            }

            .section-header h2 {
                font-size: 28px;
            }

            .banner-outer .content h1 {
                font-size: 32px;
            }
        }

        /* =============================================
                                   Testimonials Section
                                   ============================================= */
        .testimonials-section {
            background: linear-gradient(135deg, #1b305c 0%, #152447 100%);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .testimonials-section::before {
            content: '';
            position: absolute;
            top: -80px;
            right: -80px;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.03);
        }

        .testimonials-section::after {
            content: '';
            position: absolute;
            bottom: -100px;
            left: -50px;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.03);
        }

        .testimonials-section .section-header h2 {
            color: #fff;
        }

        .testimonials-section .section-header p {
            color: rgba(255, 255, 255, 0.65);
        }

        .testimonial-card {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 35px 30px 30px;
            margin: 10px 15px 30px;
            transition: all 0.3s ease;
        }

        .testimonial-card:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .testimonial-card .quote-icon {
            font-size: 50px;
            color: #ff9600;
            line-height: 1;
            margin-bottom: 10px;
            font-family: Georgia, serif;
        }

        .testimonial-card .stars {
            color: #ff9600;
            font-size: 13px;
            margin-bottom: 15px;
            letter-spacing: 2px;
        }

        .testimonial-card .message {
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            line-height: 1.8;
            margin-bottom: 25px;
            font-style: italic;
            min-height: 80px;
        }

        .testimonial-card .author {
            display: flex;
            align-items: center;
            gap: 15px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
        }

        .testimonial-card .author-img {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ff9600;
            flex-shrink: 0;
        }

        .testimonial-card .author-initials {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: #ff9600;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 20px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .testimonial-card .author-info .name {
            color: #fff;
            font-weight: 700;
            font-size: 15px;
            display: block;
        }

        .testimonial-card .author-info .designation {
            color: #ff9600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Owl Carousel custom dots */
        .testimonial-slider .owl-dots {
            text-align: center;
            margin-top: 10px;
        }

        .testimonial-slider .owl-dots .owl-dot span {
            width: 10px;
            height: 10px;
            background: rgba(255, 255, 255, 0.25);
            border-radius: 50%;
            display: inline-block;
            margin: 0 5px;
            transition: all 0.3s ease;
        }

        .testimonial-slider .owl-dots .owl-dot.active span,
        .testimonial-slider .owl-dots .owl-dot:hover span {
            background: #ff9600;
            transform: scale(1.3);
        }

        /* Owl nav arrows */
        .testimonial-slider {
            position: relative;
            padding: 0 55px;
        }

        .testimonial-slider .owl-nav {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 55px;
            /* above the dots */
            pointer-events: none;
        }

        .testimonial-slider .owl-nav button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 42px;
            height: 42px;
            background: rgba(255, 255, 255, 0.12) !important;
            border-radius: 50% !important;
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
            color: #fff !important;
            font-size: 16px !important;
            line-height: 1 !important;
            text-align: center;
            transition: all 0.3s ease;
            z-index: 10;
            pointer-events: all;
            display: flex !important;
            align-items: center;
            justify-content: center;
        }

        .testimonial-slider .owl-nav button:hover {
            background: #ff9600 !important;
            border-color: #ff9600 !important;
        }

        .testimonial-slider .owl-nav .owl-prev {
            left: 0;
        }

        .testimonial-slider .owl-nav .owl-next {
            right: 0;
        }

        @media (max-width: 767px) {
            .testimonials-section {
                padding: 60px 0;
            }

            .testimonial-slider .owl-nav {
                display: none;
            }
        }
    </style>

    <!-- ==============================================
                                ** Testimonials Slider **
                                =================================================== -->
    @if($testimonials->count() > 0)
        <section class="testimonials-section">
            <div class="container">
                <div class="section-header text-center mb-50">
                    <h2>Alumni Testimonials</h2>
                    <p>Hear what our students and graduates have to say about their experience.</p>
                </div>
                <div class="testimonial-slider owl-carousel">
                    @foreach($testimonials as $testimonial)
                        <div class="testimonial-card">
                            <div class="quote-icon">&ldquo;</div>
                            <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                            <p class="message">{{ Str::limit($testimonial->message, 200) }}</p>
                            <div class="author">
                                @if($testimonial->image)
                                    <img src="{{ asset($testimonial->image) }}" alt="{{ $testimonial->name }}" class="author-img"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="author-initials" style="display:none;">
                                        {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                                    </div>
                                @else
                                    <div class="author-initials">
                                        {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                                    </div>
                                @endif
                                <div class="author-info">
                                    <span class="name">{{ $testimonial->name }}</span>
                                    <span class="designation">{{ $testimonial->designation }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- ==============================================
                        ** Contact / Enquiry Form **
                        =================================================== -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <!-- Left: Info -->
                <div class="col-md-5 col-sm-12">
                    <div class="contact-info-block">
                        <h2>Get In <span>Touch</span></h2>
                        <p>Have a question or want to enrol? Send us a message and our team will get back to you within 24
                            hours.</p>
                        <ul class="contact-info-list">
                            @if(get_setting('contact_address'))
                                <li>
                                    <div class="ci-icon"><i class="fa fa-map-marker"></i></div>
                                    <div class="ci-text">
                                        <strong>Our Address</strong>
                                        <span>{{ get_setting('contact_address') }}</span>
                                    </div>
                                </li>
                            @endif
                            @if(get_setting('contact_email'))
                                <li>
                                    <div class="ci-icon"><i class="fa fa-envelope-o"></i></div>
                                    <div class="ci-text">
                                        <strong>Email Us</strong>
                                        <span>{{ get_setting('contact_email') }}</span>
                                    </div>
                                </li>
                            @endif
                            @if(get_setting('contact_phone'))
                                <li>
                                    <div class="ci-icon"><i class="fa fa-phone"></i></div>
                                    <div class="ci-text">
                                        <strong>Call Us</strong>
                                        <span>{{ get_setting('contact_phone') }}</span>
                                    </div>
                                </li>
                            @endif
                        </ul>
                        <!-- Social links -->
                        <div class="contact-social">
                            <a href="{{ get_setting('facebook_url', '#') }}" target="_blank"><i
                                    class="fa fa-facebook"></i></a>
                            <a href="{{ get_setting('twitter_url', '#') }}" target="_blank"><i
                                    class="fa fa-twitter"></i></a>
                            <a href="{{ get_setting('linkedin_url', '#') }}" target="_blank"><i
                                    class="fa fa-linkedin"></i></a>
                            <a href="{{ get_setting('youtube_url', '#') }}" target="_blank"><i
                                    class="fa fa-youtube-play"></i></a>
                            <a href="{{ get_setting('instagram_url', '#') }}" target="_blank"><i
                                    class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Right: Form -->
                <div class="col-md-7 col-sm-12">
                    <div class="contact-form-card">
                        <h3>Send Us a Message</h3>
                        <form id="homeContactForm">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group-custom">
                                        <label>Your Name <span>*</span></label>
                                        <input type="text" class="cf-input" placeholder="e.g. John Doe" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group-custom">
                                        <label>Email Address <span>*</span></label>
                                        <input type="email" class="cf-input" placeholder="e.g. john@email.com" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group-custom">
                                        <label>Phone Number</label>
                                        <input type="tel" class="cf-input" placeholder="e.g. +91 98765 43210">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group-custom">
                                        <label>Course of Interest</label>
                                        <select class="cf-input">
                                            <option value="">— Select a Course —</option>
                                            <option>Online MBA General</option>
                                            <option>Certificate in HRM</option>
                                            <option>Certificate in Marketing</option>
                                            <option>Certificate in Finance</option>
                                            <option>Corporate Programs</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-custom">
                                <label>Your Message</label>
                                <textarea class="cf-input" rows="4" placeholder="Write your message here..."></textarea>
                            </div>
                            <button type="submit" class="cf-submit-btn">
                                <i class="fa fa-paper-plane"></i> Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* =============================================
                           Contact Section
                           ============================================= */
        .contact-section {
            padding: 80px 0;
            background: #fff;
        }

        /* Left info block */
        .contact-info-block {
            padding-right: 30px;
            padding-top: 10px;
        }

        .contact-info-block h2 {
            font-size: 36px;
            font-weight: 700;
            color: #1b305c;
            margin-bottom: 15px;
            line-height: 1.2;
        }

        .contact-info-block h2 span {
            color: #ff9600;
        }

        .contact-info-block>p {
            color: #718096;
            font-size: 15px;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        .contact-info-list {
            list-style: none;
            padding: 0;
            margin: 0 0 30px;
        }

        .contact-info-list li {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 20px;
        }

        .contact-info-list .ci-icon {
            width: 46px;
            height: 46px;
            background: #f0f4ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1b305c;
            font-size: 16px;
            flex-shrink: 0;
            border: 1px solid #dce8ff;
        }

        .contact-info-list .ci-text strong {
            display: block;
            color: #2d3748;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .contact-info-list .ci-text span {
            color: #718096;
            font-size: 13px;
            line-height: 1.4;
        }

        .contact-social {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .contact-social a {
            width: 38px;
            height: 38px;
            background: #1b305c;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .contact-social a:hover {
            background: #ff9600;
            transform: translateY(-3px);
        }

        /* Right form card */
        .contact-form-card {
            background: #fff;
            border-radius: 16px;
            padding: 40px 35px;
            box-shadow: 0 10px 40px rgba(27, 48, 92, 0.1);
            border: 1px solid #edf2f7;
        }

        .contact-form-card h3 {
            font-size: 22px;
            font-weight: 700;
            color: #1b305c;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #ff9600;
            display: inline-block;
        }

        .form-group-custom {
            margin-bottom: 18px;
        }

        .form-group-custom label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: #4a5568;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }

        .form-group-custom label span {
            color: #e53e3e;
        }

        .cf-input {
            width: 100%;
            padding: 11px 15px;
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            font-size: 14px;
            color: #2d3748;
            background: #f9fafb;
            transition: all 0.3s ease;
            outline: none;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
        }

        .cf-input:focus {
            border-color: #1b305c;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(27, 48, 92, 0.08);
        }

        textarea.cf-input {
            resize: vertical;
        }

        select.cf-input {
            appearance: none;
            cursor: pointer;
        }

        .cf-submit-btn {
            background: #1b305c;
            color: #fff;
            border: none;
            padding: 13px 35px;
            border-radius: 50px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 5px;
        }

        .cf-submit-btn:hover {
            background: #ff9600;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 150, 0, 0.35);
        }

        .cf-submit-btn i {
            margin-right: 8px;
        }

        @media (max-width: 767px) {
            .contact-section {
                padding: 60px 0;
            }

            .contact-info-block {
                padding-right: 0;
                margin-bottom: 40px;
            }

            .contact-form-card {
                padding: 30px 20px;
            }

            .contact-info-block h2 {
                font-size: 28px;
            }
        }
    </style>

@endsection

@push('scripts')
    @if(isset($testimonials) && $testimonials->count() > 0)
        <script>
            $(document).ready(function () {
                var $slider = $('.testimonial-slider');

                $slider.owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: true,
                    dots: true,
                    autoplay: true,
                    autoplayTimeout: 4000,
                    autoplayHoverPause: true,
                    smartSpeed: 700,
                    navText: [
                        '<i class="fa fa-chevron-left"></i>',
                        '<i class="fa fa-chevron-right"></i>'
                    ],
                    responsive: {
                        0: { items: 1 },
                        600: { items: 1 },
                        768: { items: 2 },
                        1024: { items: 3 }
                    },
                    onInitialized: function () {
                        // Move .owl-nav so it is a direct child of .testimonial-slider
                        // and CSS absolute positioning works correctly
                        var $nav = $slider.find('.owl-nav');
                        $slider.prepend($nav);
                    }
                });
            });
        </script>
    @endif
@endpush