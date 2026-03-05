@extends('frontend.layouts.master')
@section('title', $service->title)

@section('content')

    <!-- ==============================================
                                                                                        ** Inner Banner / Breadcrumb **
                                                                                        =================================================== -->
    <section class="inner-banner"
        style="background: url('{{ $service->icon_image ? asset($service->icon_image) : get_setting_image('services_banner_image', 'https://placehold.co/1920x400?text=Service+Details') }}') no-repeat center center / cover;">
        <div class="container">
            <div class="contents">
                <h1>{{ $service->title }}</h1>
                <div class="banner-subheading-wrap">
                    <p>Professional Solutions & Consulting</p>
                </div>
                <ul class="breadcrumb-custom">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('services') }}">Services</a></li>
                    <li>Details</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- ==============================================
                                                                                        ** Service Details Content **
                                                                                        =================================================== -->
    <section class="service-details-section padding-lg">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-md-8">
                    <div class="service-main-wrapper bg-white shadow-premium rounded-20 overflow-hidden">
                        @if($service->icon_image)
                            <div class="main-thumb">
                                <img src="{{ asset($service->icon_image) }}" class="img-responsive w-full"
                                    alt="{{ $service->title }}">
                            </div>
                        @endif

                        <div class="service-body p-50">
                            <div class="content-header-wrap">
                                <h2 class="content-header">{{ $service->title }}</h2>
                                <div class="header-line-custom"></div>
                            </div>

                            <div class="rich-text-area mt-30">
                                {!! $service->description !!}
                            </div>

                            @if($service->short_description)
                                <div class="premium-highlight mt-40">
                                    <div class="highlight-info">
                                        <i class="fa fa-star text-orange"></i>
                                        <h4>Service Excellence</h4>
                                        <p>{{ $service->short_description }}</p>
                                    </div>
                                </div>
                            @endif

                            <div class="service-cta-block mt-80">
                                <div class="cta-text">
                                    <h3>Ready to get started?</h3>
                                    <p>Contact our experts today for a personalized consultation.</p>
                                </div>
                                <div class="cta-btn">
                                    <a href="{{ route('contact') }}" class="btn-premium-orange">Consult Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-md-4">
                    <div class="premium-sidebar">
                        @if($other_services->count() > 0)
                            <!-- Service Navigation -->
                            <div class="sidebar-nav-card mb-30">
                                <h4 class="sidebar-title">Our Services</h4>
                                <div class="sidebar-line mb-20"></div>
                                <ul class="sidebar-menu-list">
                                    @foreach($other_services as $other)
                                        <li class="{{ $other->id == $service->id ? 'active' : '' }}">
                                            <a href="{{ route('service.details', $other->slug) }}">
                                                <span>{{ $other->title }}</span>
                                                <i class="fa fa-chevron-right"></i>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Admissions/Contact Support -->
                        <div class="sidebar-support-box mb-30">
                            <div class="support-icon"><i class="fa fa-user-md"></i></div>
                            <h4>Expert Guidance</h4>
                            <p>Need help choosing the right service? Our consultants are here 24/7.</p>
                            <div class="support-contact">
                                <a href="tel:{{ get_setting('contact_phone') }}">{{ get_setting('contact_phone') }}</a>
                                <a href="mailto:{{ get_setting('contact_email') }}">{{ get_setting('contact_email') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .rounded-20 {
            border-radius: 20px;
        }

        .service-details-section {
            background: #f8fafc;
            padding: 100px 0 80px;
        }

        .shadow-premium {
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.04);
            border: 1px solid #f1f5f9;
        }

        .w-full {
            width: 100%;
            object-fit: cover;
        }

        .text-orange {
            color: #ff9600;
        }

        .p-50 {
            padding: 50px;
        }

        .mt-30 {
            margin-top: 30px;
        }

        .mt-40 {
            margin-top: 40px;
        }

        .mt-50 {
            margin-top: 50px;
        }

        .mt-80 {
            margin-top: 80px;
        }

        .service-body {
            padding: 50px;
        }

        /* --- Banner Style --- */
        .inner-banner {
            padding: 120px 0 100px;
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
            font-size: 52px;
            font-weight: 900;
            margin-bottom: 25px;
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

        /* --- Sidebar & Cards --- */
        .sidebar-nav-card {
            background: #fff;
            border-radius: 20px;
            padding: 30px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
        }

        .sidebar-title {
            font-size: 20px;
            font-weight: 800;
            color: #1b305c;
            margin-bottom: 10px;
        }

        .sidebar-line {
            width: 40px;
            height: 3px;
            background: #ff9600;
            border-radius: 2px;
        }

        .sidebar-menu-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu-list li {
            margin-bottom: 12px;
        }

        .sidebar-menu-list li a {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 20px;
            background: #f8fafc;
            border-radius: 12px;
            color: #475569;
            font-weight: 700;
            text-decoration: none !important;
            transition: 0.3s;
            border: 1px solid #f1f5f9;
        }

        .sidebar-menu-list li.active a,
        .sidebar-menu-list li:hover a {
            background: #1b305c;
            color: #fff;
            border-color: #1b305c;
            transform: translateX(5px);
        }

        .sidebar-support-box {
            background: linear-gradient(135deg, #ff9600, #ffb347);
            padding: 40px 30px;
            border-radius: 20px;
            color: #fff;
            text-align: center;
        }

        .support-icon {
            font-size: 45px;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .sidebar-support-box h4 {
            font-weight: 800;
            font-size: 22px;
            margin-bottom: 12px;
            color: #fff;
        }

        .sidebar-support-box p {
            font-size: 15px;
            opacity: 0.9;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .support-contact a {
            display: block;
            color: #fff;
            font-weight: 900;
            font-size: 16px;
            text-decoration: none !important;
            transition: 0.3s;
            margin-bottom: 5px;
        }

        /* --- Main Content Header Matching Course Details --- */
        .content-header-wrap {
            margin-bottom: 30px;
            position: relative;
        }

        .content-header {
            font-size: 28px;
            font-weight: 800;
            color: #1b305c;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .header-line-custom {
            width: 70px;
            height: 5px;
            background: linear-gradient(to right, #ff9600, #ffb347);
            border-radius: 10px;
        }

        .rich-text-area {
            color: #475569;
            line-height: 1.8;
            font-size: 16px;
            margin-top: 20px;
        }

        .premium-highlight {
            background: #f0f7ff;
            padding: 30px;
            border-radius: 15px;
            border-left: 5px solid #1b305c;
        }

        .highlight-info h4 {
            font-weight: 800;
            color: #1b305c;
            margin: 10px 0;
        }

        .highlight-info p {
            color: #64748b;
            margin: 0;
            line-height: 1.6;
        }

        .service-cta-block {
            background: #1b305c;
            padding: 40px;
            border-radius: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #fff;
            gap: 20px;
            flex-wrap: wrap;
        }

        .cta-text h3 {
            font-weight: 800;
            color: #fff;
            margin-bottom: 10px;
        }

        .cta-text p {
            opacity: 0.8;
            margin: 0;
        }

        .btn-premium-orange {
            display: inline-block;
            background: #ff9600;
            color: #fff !important;
            padding: 14px 30px;
            border-radius: 50px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none !important;
            transition: 0.3s;
            box-shadow: 0 10px 20px rgba(255, 150, 0, 0.2);
        }

        .btn-premium-orange:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 150, 0, 0.3);
            background: #e08500;
        }

        /* Waterfall Animations */
        .fadeIn {
            animation: fadeIn 0.8s ease-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 767px) {
            .service-cta-block {
                text-align: center;
                justify-content: center;
            }

            .service-body {
                padding: 30px;
            }
        }
    </style>
@endsection