@extends('frontend.layouts.master')
@section('title', 'Sitemap')

@section('content')
    <!-- ==============================================
                ** Inner Banner / Breadcrumb **
                =================================================== -->
    <section class="inner-banner"
        style="background: url('{{ get_setting_image('courses_banner_image', 'https://placehold.co/1920x450?text=Sitemap') }}') no-repeat center center / cover;">
        <div class="container">
            <div class="contents">
                <h1>Website Sitemap</h1>
                <div class="banner-subheading-wrap">
                    <p>Navigate through all our professional programs and services.</p>
                </div>
                <ul class="breadcrumb-custom">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Sitemap</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- ==============================================
                ** Sitemap Content Section **
                =================================================== -->
    <section class="sitemap-section padding-lg">
        <div class="container">
            <div class="row">
                <!-- Group 1: Core Navigation & Services -->
                <div class="col-md-4 mb-40">
                    <div class="sitemap-card shadow-premium rounded-20 bg-white p-40">
                        <div class="sitemap-header">
                            <i class="fa fa-home"></i>
                            <h3>Main Navigation</h3>
                            <div class="header-line-custom"></div>
                        </div>
                        <ul class="sitemap-list">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li><a href="{{ route('courses') }}">Our Courses</a></li>
                            <li><a href="{{ route('services') }}">Our Services</a></li>
                            <li><a href="{{ route('campus') }}">Our Campus</a></li>
                            <li><a href="{{ route('gallery') }}">Gallery</a></li>
                            <li><a href="{{ route('faq') }}">FAQ</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                            <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        </ul>

                        <div class="sitemap-header mt-40">
                            <i class="fa fa-cogs"></i>
                            <h3>Expert Services</h3>
                            <div class="header-line-custom"></div>
                        </div>
                        <ul class="sitemap-list">
                            @foreach($services as $service)
                                <li><a href="{{ route('service.details', $service->slug) }}">{{ $service->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Group 2: Course Categories & Individual Programs -->
                <div class="col-md-4 mb-40">
                    <div class="sitemap-card shadow-premium rounded-20 bg-white p-40">
                        <div class="sitemap-header">
                            <i class="fa fa-folder-open"></i>
                            <h3>Course Categories</h3>
                            <div class="header-line-custom"></div>
                        </div>
                        <ul class="sitemap-list">
                            @foreach($course_categories as $cat)
                                <li><a href="{{ route('category.courses', $cat->slug) }}">{{ $cat->name }}</a></li>
                            @endforeach
                        </ul>

                        <div class="sitemap-header mt-40">
                            <i class="fa fa-graduation-cap"></i>
                            <h3>Professional Courses</h3>
                            <div class="header-line-custom"></div>
                        </div>
                        <ul class="sitemap-list">
                            @foreach($courses as $course)
                                <li><a href="{{ route('course.details', $course->slug) }}">{{ $course->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Group 3: News, Campus & Other -->
                <div class="col-md-4 mb-40">
                    <div class="sitemap-card shadow-premium rounded-20 bg-white p-40">
                        @if($blogs->count() > 0)
                            <div class="sitemap-header">
                                <i class="fa fa-newspaper-o"></i>
                                <h3>Latest News & Updates</h3>
                                <div class="header-line-custom"></div>
                            </div>
                            <ul class="sitemap-list">
                                @foreach($blogs as $blog)
                                    {{-- Assuming blog details route exists --}}
                                    <li><a href="#">{{ $blog->title }}</a></li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="sitemap-header mt-40">
                            <i class="fa fa-map-marker"></i>
                            <h3>Our Locations</h3>
                            <div class="header-line-custom"></div>
                        </div>
                        <ul class="sitemap-list">
                            @foreach($campuses as $campus)
                                <li><a href="{{ route('campus') }}#campus-{{ $campus->id }}">{{ $campus->title }}</a></li>
                            @endforeach
                        </ul>

                        <div class="sitemap-help-box mt-40">
                            <h4>Need Immediate Help?</h4>
                            <p>Our experts are available to guide you through your career path.</p>
                            <a href="{{ route('contact') }}" class="btn-enroll-premium">Enquire Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .sitemap-section {
            background: #f4f7f9;
            padding: 80px 0;
        }

        .shadow-premium {
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.05);
        }

        .rounded-20 {
            border-radius: 20px;
        }

        .p-40 {
            padding: 40px;
        }

        .mt-40 {
            margin-top: 40px;
        }

        /* --- Header Styles --- */
        .sitemap-header {
            margin-bottom: 25px;
            position: relative;
        }

        .sitemap-header i {
            font-size: 24px;
            color: #ff9600;
            margin-bottom: 15px;
            display: block;
        }

        .sitemap-header h3 {
            font-size: 20px;
            font-weight: 800;
            color: #1b305c;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .header-line-custom {
            width: 50px;
            height: 4px;
            background: linear-gradient(to right, #ff9600, #ffb347);
            border-radius: 10px;
        }

        /* --- List Styles --- */
        .sitemap-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sitemap-list li {
            margin-bottom: 12px;
            padding-left: 20px;
            position: relative;
        }

        .sitemap-list li::before {
            content: '\f105';
            font-family: 'FontAwesome';
            position: absolute;
            left: 0;
            top: 0;
            color: #ff9600;
            font-weight: 700;
        }

        .sitemap-list li a {
            color: #475569;
            font-weight: 600;
            font-size: 15px;
            transition: 0.3s;
            text-decoration: none !important;
        }

        .sitemap-list li a:hover {
            color: #1b305c;
            padding-left: 5px;
        }

        /* --- Help Box --- */
        .sitemap-help-box {
            background: #f8fafc;
            padding: 30px;
            border-radius: 15px;
            border-left: 5px solid #ff9600;
            margin-bottom: 20px;
        }

        .sitemap-help-box h4 {
            font-weight: 800;
            color: #1b305c;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .sitemap-help-box p {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .btn-enroll-premium {
            display: inline-block;
            background: #1b305c;
            color: #fff !important;
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: 800;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 1px;
            text-decoration: none !important;
            transition: 0.3s;
            box-shadow: 0 5px 15px rgba(27, 48, 92, 0.15);
        }

        .btn-enroll-premium:hover {
            background: #ff9600;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 150, 0, 0.3);
        }

        /* --- Banner Style --- */
        .inner-banner {
            padding: 100px 0 80px;
            position: relative;
            color: #fff;
            text-align: center;
            overflow: hidden;
        }

        .inner-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(27, 48, 92, 0.9), rgba(27, 48, 92, 0.7));
            z-index: 1;
        }

        .inner-banner .container {
            position: relative;
            z-index: 5;
        }

        .inner-banner h1 {
            font-size: 48px;
            font-weight: 900;
            margin-bottom: 20px;
            color: #fff !important;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            text-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .banner-subheading-wrap p {
            display: inline-block;
            background: rgba(255, 150, 0, 0.2);
            color: #ff9600;
            padding: 8px 25px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 13px;
            text-transform: uppercase;
            border: 1px solid rgba(255, 150, 0, 0.3);
            margin-bottom: 20px;
        }

        .breadcrumb-custom {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            gap: 15px;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 13px;
        }

        .breadcrumb-custom li:not(:last-child)::after {
            content: '\f105';
            font-family: 'FontAwesome';
            margin-left: 15px;
            color: #ff9600;
        }

        .breadcrumb-custom a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: 0.3s;
        }

        .breadcrumb-custom a:hover {
            color: #ff9600;
        }

        @media (max-width: 991px) {
            .inner-banner h1 {
                font-size: 36px;
            }

            .p-40 {
                padding: 30px;
            }
        }
    </style>
@endsection