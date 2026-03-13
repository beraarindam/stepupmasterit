@extends('frontend.layouts.master')
@section('title', 'Home')

@section('meta_title', get_setting('home_meta_title', get_setting('site_title')))
@section('meta_description', get_setting('home_meta_description', get_setting('site_description')))
@section('meta_keywords', get_setting('home_meta_keywords', get_setting('site_keywords')))

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
                        <div class="section-badge">{{ get_setting('home_about_heading', 'Who We Are') }}</div>
                        <h2>{!! get_setting('home_about_subheading', 'Learn About <span>Our Institution</span>') !!}</h2>
                        <div class="description">
                            {!! get_setting('home_about_description', 'Step Up Master IT is a premier educational institution dedicated to providing high-quality IT training and certification programs. Our mission is to empower students with the skills and knowledge needed to excel in the rapidly evolving technology landscape.') !!}
                        </div>
                        @php
                            $highlights = array_filter(explode("\n", get_setting('home_about_highlights', "Certified Professional Instructors\nComprehensive Learning Materials\nIndustry-Recognized Certifications\nCareer Placement Support")));
                        @endphp
                        @if(count($highlights))
                            <ul class="check-list">
                                @foreach($highlights as $point)
                                    @php $title = str_contains($point, '|') ? trim(explode('|', $point, 2)[0]) : trim($point); @endphp
                                    <li><i class="fa fa-check-circle"></i> {{ $title }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <a href="{{ get_setting('home_about_btn_link', '#') }}" class="btn btn-primary-custom">
                            {{ get_setting('home_about_btn_text', 'Learn More About Us') }}
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-img mt-mobile-40">
                        <img src="{{ get_setting('home_about_image') ? asset(get_setting('home_about_image')) : 'https://placehold.co/600x400?text=About+Us' }}"
                            class="img-responsive rounded-xl shadow-lg" alt="About Us">
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
                <h2>{{ get_setting('home_services_heading', 'Our Specialized Services') }}</h2>
                <p>{{ get_setting('home_services_subheading', 'We offer a wide range of academic and support services to ensure every student succeeds.') }}
                </p>
            </div>
            <div class="row">
                @foreach($services as $service)
                    <div class="col-md-4 col-sm-6 mb-30">
                        <div class="service-box transition-all">
                            <div class="service-icon-info">
                                <div class="icon-circle">
                                    @if($service->icon_image)
                                        <img src="{{ asset($service->icon_image) }}" alt="{{ $service->title }}" class="icon-img">
                                    @else
                                        <i class="fa fa-graduation-cap"></i>
                                    @endif
                                </div>
                            </div>
                            <div class="service-detail">
                                <h3>{{ $service->title }}</h3>
                                <p>{{ Str::limit($service->short_description, 100) }}</p>
                                <a href="{{ route('service.details', $service->slug) }}" class="btn-read-more">READ MORE <i
                                        class="fa fa-angle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-40">
                <a href="{{ route('services') }}" class="btn-primary-custom">VIEW ALL SERVICES</a>
            </div>
        </div>
    </section>

    <!-- ==============================================
                                                                                ** Global Statistics **
                                                                                =================================================== -->
    <section class="why-choose padding-lg bg-dark text-white">
        <div class="container">
            <h2 class="text-white text-center mb-50">
                {{ get_setting('home_stats_heading', 'Empowering Students Worldwide') }}
            </h2>
            <ul class="our-strength">
                @for($i = 1; $i <= 4; $i++)
                    @php
                        $val = get_setting('home_stat' . $i . '_value', '');
                        $label = get_setting('home_stat' . $i . '_label', '');
                        $suffix = get_setting('home_stat' . $i . '_suffix', '');
                        $icons = ['icon-certification-icon', 'icon-student-icon', 'icon-book-icon', 'icon-parents-icon'];
                    @endphp
                    @if($val || $label)
                        <li>
                            <div class="icon"><span class="{{ $icons[$i - 1] }}"> </span></div>
                            <div class="couter-outer"><span
                                    class="counter">{{ $val }}</span>@if($suffix)<span>{{ $suffix }}</span>@endif</div>
                            <div class="title">{{ $label }}</div>
                        </li>
                    @endif
                @endfor
            </ul>
        </div>
    </section>

    <!-- ==============================================
                                                                                ** Course List **
                                                                                =================================================== -->
    <section class="course-list padding-lg">
        <div class="container">
            <div class="section-header text-center mb-50">
                <h2>{{ get_setting('home_courses_heading', 'Popular Courses') }}</h2>
                <p>{{ get_setting('home_courses_subheading', 'Explore our most sought-after programs designed for your career growth.') }}
                </p>
            </div>
            <div class="our-cources">
                <div class="course-slider owl-carousel">
                    @foreach($courses as $course)
                        <div class="course-card shadow-sm transition-all border border-light">
                            <div class="course-thumb relative">
                                <img src="{{ asset($course->image) }}" class="course-img" alt="{{ $course->title }}"
                                    onerror="this.src='https://placehold.co/600x400?text=Course+Image'">
                            </div>
                            <div class="course-body p-25 bg-white">
                                <h3 class="course-title font-bold text-20 mb-5">
                                    <a href="{{ route('course.details', $course->slug) }}"
                                        class="text-secondary">{{ $course->title }}</a>
                                </h3>
                                <div class="course-subtitle text-gray text-13 mb-15">
                                    {{ Str::limit($course->short_description, 100) }}
                                </div>

                                <div class="course-footer flex justify-center items-center pt-15 border-top">
                                    <a href="{{ route('course.details', $course->slug) }}" class="btn-view-details">VIEW
                                        DETAILS</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="text-center mt-50">
                <a href="{{ route('courses') }}" class="btn-primary-custom">VIEW ALL COURSES</a>
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

        .section-badge {
            display: inline-block;
            background: #f0f7ff;
            color: #1b305c;
            padding: 6px 20px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
            border: 1px solid rgba(27, 48, 92, 0.1);
        }

        .about-content h2 {
            font-size: 38px;
            color: #1b305c;
            margin-bottom: 25px;
            font-weight: 800;
            line-height: 1.3;
            text-transform: uppercase;
        }

        .about-content h2 span {
            color: #ff9600 !important;
            background: transparent !important;
            padding: 0 !important;
            display: inline !important;
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

        /* ==============================================
                                                   Enhanced Services & Courses UI
                                                   ============================================== */

        /* --- Enhanced Services UI (Professional & High-End) --- */
        .services-section {
            background-color: #f8fbff;
        }

        .services-section .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .services-section .row>[class*='col-'] {
            display: flex;
            flex-direction: column;
        }

        .service-box {
            background: #fff;
            padding: 50px 30px;
            border-radius: 12px;
            border: 1px solid #eee;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
            text-align: center;
            height: 100%;
            flex: 1;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .service-box:hover {
            border-color: #ff9600;
            box-shadow: 0 10px 30px rgba(27, 48, 92, 0.08);
            transform: translateY(-5px);
        }

        .service-box::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: #1b305c;
            transform: scaleX(0);
            transition: transform 0.3s ease;
            transform-origin: left;
        }

        .service-box:hover::after {
            transform: scaleX(1);
        }

        .icon-circle {
            width: 80px;
            height: 80px;
            background: #f0f7ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            font-size: 36px;
            color: #1b305c;
            transition: all 0.3s ease;
        }

        .service-box:hover .icon-circle {
            background: #1b305c;
            color: #fff;
            transform: rotateY(180deg);
        }

        .icon-img {
            max-width: 45px;
            height: auto;
        }

        .service-detail {
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .service-detail h3 {
            font-size: 20px;
            color: #1b305c;
            margin-bottom: 15px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .service-detail p {
            font-size: 15px;
            color: #718096;
            line-height: 1.6;
            margin-bottom: 25px;
            flex: 1;
        }

        .btn-read-more {
            font-size: 13px;
            font-weight: 700;
            color: #1b305c;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none !important;
            transition: color 0.3s ease;
        }

        .btn-read-more i {
            margin-left: 5px;
            transition: transform 0.3s ease;
        }

        .service-box:hover .btn-read-more {
            color: #ff9600;
        }

        .service-box:hover .btn-read-more i {
            transform: translateX(5px);
        }

        /* --- Enhanced Course UI (Maya Reference Style) --- */
        .course-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            margin: 15px 12px;
            border: 1px solid #eee;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .course-card:hover {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transform: translateY(-5px);
        }

        .course-thumb {
            padding: 30px;
            background: #f8fbff;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .mini-logo {
            width: 50px;
            height: 50px;
            object-fit: contain;
            border-radius: 50%;
            background: #fff;
            padding: 5px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        }

        .course-brand-badge {
            position: absolute;
            top: 15px;
            right: 15px;
        }

        .course-img {
            max-width: 85%;
            max-height: 85%;
            object-fit: contain;
        }

        .course-title {
            font-size: 22px;
            color: #1b305c;
            line-height: 1.2;
        }

        .course-subtitle {
            color: #718096;
            margin-bottom: 20px;
        }

        .btn-view-details {
            background: #1b305c;
            color: #fff !important;
            padding: 10px 25px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none !important;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(27, 48, 92, 0.2);
        }

        .btn-view-details:hover {
            background: #ff9600;
            box-shadow: 0 4px 12px rgba(255, 150, 0, 0.3);
            transform: translateY(-2px);
        }

        .currency {
            font-size: 16px;
            margin-right: 2px;
            color: #ff9600;
        }

        .text-22 {
            font-size: 22px;
        }

        .text-20 {
            font-size: 20px;
        }

        .bg-light {
            background-color: #f8fbff !important;
        }

        /* Scrollable Slider Customization */
        .course-slider .owl-nav button {
            width: 45px;
            height: 45px;
            background: #333 !important;
            border-radius: 50% !important;
            color: #fff !important;
            font-size: 18px !important;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3) !important;
            opacity: 0.8;
            margin: 0 !important;
        }

        .course-slider .owl-nav button:hover {
            opacity: 1;
            background: #1b305c !important;
        }

        .course-slider .owl-prev {
            left: -25px;
        }

        .course-slider .owl-next {
            right: -25px;
        }

        @media (max-width: 1199px) {
            .course-slider .owl-prev {
                left: 0;
            }

            .course-slider .owl-next {
                right: 0;
            }
        }

        /* Utilities */
        .flex {
            display: flex;
        }

        .justify-between {
            justify-content: space-between;
        }

        .items-center {
            align-items: center;
        }

        .mt-20 {
            margin-top: 20px;
        }

        .mb-15 {
            margin-bottom: 15px;
        }

        .pt-15 {
            padding-top: 15px;
        }

        .gap-5 {
            gap: 5px;
        }

        .text-primary {
            color: #1b305c;
        }

        .text-gray {
            color: #718096;
        }

        .font-bold {
            font-weight: 700;
        }

        /* --- Global Course List Refinements --- */
        .course-list {
            background: #ffffff !important;
            background-image: none !important;
            position: relative;
            z-index: 1;
            padding: 80px 0 !important;
        }

        /* Kill theme-specific background and overlay on 'our-cources' */
        .our-cources {
            background: transparent !important;
            background-image: none !important;
            padding: 0 !important;
            position: relative;
        }

        /* Essential: Disable the dark theme overlay */
        .our-cources:after,
        .course-list:after {
            display: none !important;
            content: none !important;
        }

        .course-list .container {
            position: relative;
            z-index: 2;
        }

        /* Course Card (Maya Style - High Contrast) */
        .course-card {
            background: #ffffff !important;
            border-radius: 15px;
            overflow: hidden;
            margin: 15px 12px;
            border: 1px solid #edf2f7 !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            display: flex !important;
            flex-direction: column;
            height: 100%;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .course-card:hover {
            box-shadow: 0 15px 35px rgba(27, 48, 92, 0.12);
            transform: translateY(-8px);
            border-color: #1b305c !important;
        }

        .course-thumb {
            padding: 0 !important;
            background: #fff !important;
            height: 240px !important;
            width: 100% !important;
            display: block !important;
            position: relative;
            overflow: hidden;
        }

        .course-img {
            display: block !important;
            width: 100% !important;
            min-width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
            transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .course-card:hover .course-img {
            transform: scale(1.15);
        }

        .course-body {
            padding: 25px !important;
            background: #ffffff !important;
            flex-grow: 1;
        }

        .course-title {
            font-size: 19px !important;
            color: #1b305c !important;
            line-height: 1.3 !important;
            margin-bottom: 12px !important;
            font-weight: 700 !important;
            text-transform: none !important;
        }

        .course-title a {
            color: #1b305c !important;
            text-decoration: none !important;
        }

        .course-subtitle {
            font-size: 14px;
            color: #718096;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .course-footer {
            margin-top: auto;
            padding-top: 20px;
            border-top: 1px solid #f0f4f8;
            text-align: center;
        }

        .btn-view-details {
            background: #1b305c !important;
            color: #ffffff !important;
            padding: 9px 22px !important;
            border-radius: 50px !important;
            font-size: 11px !important;
            font-weight: 700 !important;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(27, 48, 92, 0.15);
        }

        .btn-view-details:hover {
            background: #ff9600 !important;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(255, 150, 0, 0.3);
            color: #ffffff !important;
        }

        /* Slider Controls (High Professionalism) */
        .course-slider .owl-nav button {
            width: 48px !important;
            height: 48px !important;
            background: #1b305c !important;
            color: #ffffff !important;
            border-radius: 50% !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2) !important;
            position: absolute !important;
            top: 45% !important;
            margin-top: -24px !important;
            opacity: 0.9;
            transition: all 0.3s ease !important;
            z-index: 10;
        }

        .course-slider .owl-nav button:hover {
            opacity: 1;
            background: #ff9600 !important;
            transform: scale(1.1);
        }

        .course-slider .owl-prev {
            left: -30px !important;
        }

        .course-slider .owl-next {
            right: -30px !important;
        }

        .course-slider .owl-dots {
            text-align: center;
            margin-top: 40px;
        }

        .course-slider .owl-dot span {
            width: 10px;
            height: 10px;
            background: #d1d9e6 !important;
            display: inline-block;
            margin: 0 6px;
            border-radius: 50%;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .course-slider .owl-dot.active span {
            background: #ff9600 !important;
            width: 32px;
            border-radius: 12px;
        }

        /* Final Action Button */
        .btn-primary-custom {
            display: inline-block;
            background-color: #1b305c;
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
            box-shadow: 0 10px 20px rgba(27, 48, 92, 0.1);
        }

        .btn-primary-custom:hover {
            background-color: #ff9600;
            color: #ffffff !important;
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(255, 150, 0, 0.2);
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
                        @if(session('success'))
                            <div class="alert alert-success"
                                style="background:#d4edda; color:#155724; padding:15px; border-radius:5px; margin-bottom: 20px;">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form id="homeContactForm" action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group-custom">
                                        <label>Your Name <span>*</span></label>
                                        <input type="text" name="name" class="cf-input" placeholder="e.g. John Doe"
                                            required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group-custom">
                                        <label>Email Address <span>*</span></label>
                                        <input type="email" name="email" class="cf-input" placeholder="e.g. john@email.com"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group-custom">
                                        <label>Phone Number</label>
                                        <input type="tel" name="phone" class="cf-input" placeholder="e.g. +91 98765 43210">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group-custom">
                                        <label>Course of Interest</label>
                                        <select class="cf-input" name="subject">
                                            <option value="">— Select a Course —</option>
                                            @foreach($courses as $course)
                                                <option value="{{ $course->title }}">{{ $course->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-custom">
                                <label>Your Message</label>
                                <textarea name="message" class="cf-input" rows="4" placeholder="Write your message here..."
                                    required></textarea>
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
                        var $nav = $slider.find('.owl-nav');
                        $slider.prepend($nav);
                    }
                });
            });
        </script>
    @endif

    <script>
        $(document).ready(function () {
            var $courseSlider = $('.course-slider');
            if ($courseSlider.length) {
                $courseSlider.owlCarousel({
                    loop: true,
                    margin: 20,
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
                        1024: { items: 4 }
                    },
                    onInitialized: function () {
                        var $nav = $courseSlider.find('.owl-nav');
                        $courseSlider.prepend($nav);
                    }
                });
            }
        });
    </script>
@endpush