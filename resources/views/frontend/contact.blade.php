@extends('frontend.layouts.master')
@section('title', 'Contact Us')

@section('meta_title', get_setting('contact_meta_title', get_setting('site_title')))
@section('meta_description', get_setting('contact_meta_description', get_setting('site_description')))
@section('meta_keywords', get_setting('contact_meta_keywords', get_setting('site_keywords')))

@section('content')

    <!-- ==============================================
                                    ** Inner Banner / Breadcrumb **
                                    =================================================== -->
    <section class="inner-banner"
        style="background: url('{{ get_setting_image('contact_banner_image', 'https://placehold.co/1920x400?text=Contact+Us') }}') no-repeat center center / cover;">
        <div class="container">
            <div class="contents">
                <h1>{{ get_setting('contact_banner_heading', 'Contact Us') }}</h1>
                <div class="banner-subheading-wrap">
                    <p>{{ get_setting('contact_banner_subheading', 'Have a question? We are here to help you.') }}</p>
                </div>
                <ul class="breadcrumb-custom">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- ==============================================
                                    ** Contact Details Section **
                                    =================================================== -->
    <section class="contact-details-section padding-lg">
        <div class="container">
            <div class="row items-center">
                <div class="col-md-5">
                    <div class="contact-info">
                        <div class="section-header mb-40">
                            <span class="sub-badge">Get In Touch</span>
                            <h2>We Are <span>Here to Help</span></h2>
                            <div class="header-line" style="margin: 0 auto 25px 0;"></div>
                            <p>Connect with our expert consultants today. Whether you have questions about our programs,
                                certifications, or career pathways, our team is ready to guide you.</p>
                        </div>

                        <div class="info-card-list">
                            <div class="info-card">
                                <div class="info-icon"><i class="fa fa-map-marker"></i></div>
                                <div class="info-text">
                                    <h4>Visit Our Office</h4>
                                    <p>{{ get_setting('contact_address', '123 Education St, Knowledge City, Country') }}</p>
                                </div>
                            </div>
                            <div class="info-card active">
                                <div class="info-icon"><i class="fa fa-phone"></i></div>
                                <div class="info-text">
                                    <h4>Call Us Anytime</h4>
                                    <p>{{ get_setting('contact_phone', '+1 234 567 8900') }}</p>
                                </div>
                            </div>
                            <div class="info-card">
                                <div class="info-icon"><i class="fa fa-envelope-o"></i></div>
                                <div class="info-text">
                                    <h4>Email Support</h4>
                                    <p>{{ get_setting('contact_email', 'hr@stepupmasterit.com') }}</p>
                                </div>
                            </div>
                            <div class="info-card">
                                <div class="info-icon"><i class="fa fa-clock-o"></i></div>
                                <div class="info-text">
                                    <h4>Opening Hours</h4>
                                    <p>{{ get_setting('contact_opening_hours', 'Mon - Fri: 9:00 AM - 6:00 PM') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="contact-social mt-40">
                            <p>Follow our journey on social media:</p>
                            <ul class="social-links-contact">
                                <li><a href="{{ get_setting('facebook_url', '#') }}" target="_blank"><i
                                            class="fa fa-facebook"></i></a></li>
                                <li><a href="{{ get_setting('twitter_url', '#') }}" target="_blank"><i
                                            class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ get_setting('linkedin_url', '#') }}" target="_blank"><i
                                            class="fa fa-linkedin"></i></a></li>
                                <li><a href="{{ get_setting('instagram_url', '#') }}" target="_blank"><i
                                            class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="contact-form-wrapper">
                        <div class="form-header">
                            <h3>Send Us a <span>Message</span></h3>
                            <p>Have something to say? Fill out the form below and we will respond within 24 hours.</p>
                        </div>
                        <form id="contactForm" class="modern-form">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group-custom">
                                        <label for="name">Full Name</label>
                                        <div class="input-wrap">
                                            <i class="fa fa-user-o"></i>
                                            <input type="text" id="name" name="name" placeholder="John Doe" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group-custom">
                                        <label for="email">Email Address</label>
                                        <div class="input-wrap">
                                            <i class="fa fa-envelope-o"></i>
                                            <input type="email" id="email" name="email" placeholder="john@example.com"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group-custom">
                                        <label for="phone">Phone Number</label>
                                        <div class="input-wrap">
                                            <i class="fa fa-phone"></i>
                                            <input type="text" id="phone" name="phone" placeholder="+1 234 567 890">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group-custom">
                                        <label for="subject">Subject</label>
                                        <div class="input-wrap">
                                            <i class="fa fa-tag"></i>
                                            <input type="text" id="subject" name="subject" placeholder="General Inquiry">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group-custom">
                                        <label for="message">Your Message</label>
                                        <div class="input-wrap">
                                            <i class="fa fa-pencil-square-o"></i>
                                            <textarea id="message" name="message" rows="5"
                                                placeholder="Hi, I would like to know about..." required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-10">
                                    <button type="submit" class="btn-primary-custom"
                                        style="width: 100%; border: none; cursor: pointer;">
                                        Send Message <i class="fa fa-paper-plane" style="margin-left: 10px;"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==============================================
                                    ** Map Section **
                                    ==================================================== -->
    <section class="map-section">
        <div class="container-fluid no-padding">
            <div class="map-wrapper">
                @if(get_setting('contact_map_iframe'))
                    <iframe src="{{ get_setting('contact_map_iframe') }}" width="100%" height="450" style="border:0;"
                        allowfullscreen="" loading="lazy"></iframe>
                @else
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d117925.33439927714!2d88.2649502120485!3d22.535427313888876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f882db4908f667%3A0x43e330e68f6c2cbc!2sKolkata%2C%20West%20Bengal!5e0!3m2!1sen!2sin!4v1709623861234!5m2!1sen!2sin"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                @endif
            </div>
        </div>
    </section>

    <style>
        /* --- Breadcrumb / Inner Banner --- */
        .inner-banner {
            padding: 100px 0 80px;
            position: relative;
            color: #fff;
            text-align: center;
        }

        .inner-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(27, 48, 92, 0.75);
            z-index: 1;
        }

        .inner-banner .container {
            position: relative;
            z-index: 2;
        }

        .inner-banner h1 {
            font-size: 52px;
            font-weight: 800;
            margin-bottom: 15px;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 2px;
            position: relative;
            z-index: 5;
        }

        /* Suppress any theme watermarks */
        .inner-banner h1::before,
        .inner-banner h1::after,
        .inner-banner .contents::before,
        .inner-banner .contents::after,
        .inner-banner .container::before,
        .inner-banner .container::after {
            display: none !important;
            content: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
        }

        .banner-subheading-wrap {
            margin-bottom: 30px;
        }

        .banner-subheading-wrap p {
            display: inline-block;
            background: rgba(255, 150, 0, 0.15);
            color: #ff9600;
            padding: 8px 25px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: 1px solid rgba(255, 150, 0, 0.3);
            margin: 0;
            opacity: 1 !important;
        }
        }

        .breadcrumb-custom {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            gap: 15px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 1px;
        }

        .breadcrumb-custom li {
            position: relative;
        }

        .breadcrumb-custom li:not(:last-child)::after {
            content: '\f105';
            font-family: 'FontAwesome';
            margin-left: 15px;
            color: #ff9600;
        }

        .breadcrumb-custom li a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .breadcrumb-custom li a:hover {
            color: #ff9600;
        }

        .sub-badge {
            background: #f0f7ff;
            color: #1b305c;
            padding: 6px 16px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            display: inline-block;
            margin-bottom: 15px;
        }

        .section-header h2 {
            font-size: 42px;
            color: #1b305c;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .section-header h2 span {
            color: #ff9600;
        }

        .header-line {
            width: 80px;
            height: 4px;
            background: #ff9600;
            margin: 0 auto 25px;
            border-radius: 2px;
        }

        /* --- Contact Details Section --- */
        .contact-details-section {
            background-color: #fbfcfe;
            padding-bottom: 100px;
        }

        /* Info Card Styling */
        .info-card-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .info-card {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            gap: 20px;
            border: 1px solid #edf2f7;
            transition: all 0.3s ease;
        }

        .info-card:hover {
            transform: translateX(10px);
            border-color: #ff960050;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .info-card.active {
            background: #1b305c;
            border-color: #1b305c;
            color: #fff;
            box-shadow: 0 15px 35px rgba(27, 48, 92, 0.2);
        }

        .info-icon {
            width: 55px;
            height: 55px;
            background: #fff8f0;
            color: #ff9600;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            flex-shrink: 0;
            transition: 0.3s;
        }

        .info-card.active .info-icon {
            background: rgba(255, 255, 255, 0.1);
            color: #ff9600;
        }

        .info-text h4 {
            font-size: 18px;
            font-weight: 800;
            margin-bottom: 5px;
            color: #1b305c;
        }

        .info-card.active .info-text h4 {
            color: #fff;
        }

        .info-text p {
            font-size: 15px;
            color: #718096;
            margin: 0;
            line-height: 1.5;
        }

        .info-card.active .info-text p {
            color: rgba(255, 255, 255, 0.7);
        }

        /* --- Social Links --- */
        .social-links-contact {
            list-style: none;
            padding: 0;
            margin: 15px 0 0;
            display: flex;
            gap: 12px;
        }

        .social-links-contact a {
            width: 40px;
            height: 40px;
            background: #fff;
            color: #1b305c;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            border: 1px solid #edf2f7;
            transition: 0.3s;
        }

        .social-links-contact a:hover {
            background: #ff9600;
            color: #fff;
            border-color: #ff9600;
            transform: translateY(-5px);
        }

        /* --- Contact Form Wrapper --- */
        .contact-form-wrapper {
            background: #fff;
            border-radius: 25px;
            padding: 50px 40px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.04);
            border: 1px solid #edf2f7;
            position: relative;
            z-index: 10;
        }

        .form-header h3 {
            font-size: 26px;
            font-weight: 800;
            color: #1b305c;
            margin-bottom: 12px;
        }

        .form-header h3 span {
            color: #ff9600;
        }

        .form-header p {
            font-size: 15px;
            color: #718096;
            margin-bottom: 35px;
        }

        /* --- Modern Form Controls --- */
        .form-group-custom {
            margin-bottom: 25px;
        }

        .form-group-custom label {
            font-weight: 700;
            color: #1b305c;
            margin-bottom: 10px;
            display: block;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap i {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
            font-size: 16px;
            transition: count 0.3s;
        }

        .input-wrap textarea+i {
            top: 25px;
            transform: none;
        }

        .modern-form input,
        .modern-form textarea {
            width: 100%;
            background: #f8fafc;
            border: 2px solid #f1f5f9;
            padding: 14px 20px 14px 50px;
            border-radius: 12px;
            font-size: 15px;
            color: #1b305c;
            outline: none;
            transition: all 0.3s ease;
        }

        .modern-form textarea {
            padding-top: 20px;
        }

        .modern-form input:focus,
        .modern-form textarea:focus {
            background: #fff;
            border-color: #ff9600;
            box-shadow: 0 10px 20px rgba(255, 150, 0, 0.05);
        }

        .modern-form input:focus+i,
        .modern-form textarea:focus+i {
            color: #ff9600;
        }

        /* --- Map Styling --- */
        .map-section {
            line-height: 0;
        }

        .map-section iframe {
            filter: grayscale(1) invert(0);
            transition: 0.5s;
        }

        .map-section iframe:hover {
            filter: grayscale(0);
        }

        /* Responsive Contact */
        @media (max-width: 991px) {
            .contact-form-wrapper {
                margin-top: 60px;
                padding: 40px 30px;
            }
        }

        @media (max-width: 480px) {
            .form-header h3 {
                font-size: 22px;
            }
        }

        .btn-primary-custom {
            display: inline-block;
            background-color: #ff9600;
            color: #ffffff !important;
            padding: 16px 40px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            transition: all 0.4s ease;
            text-decoration: none !important;
            border: none;
            box-shadow: 0 10px 20px rgba(255, 150, 0, 0.2);
            text-align: center;
        }

        .btn-primary-custom:hover {
            background-color: #e08500;
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(255, 150, 0, 0.3);
            color: #fff !important;
        }
    </style>

@endsection