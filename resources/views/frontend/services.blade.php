@extends('frontend.layouts.master')
@section('title', 'Our Services')

@section('meta_title', get_setting('services_meta_title', 'Our Services | ' . get_setting('site_title')))
@section('meta_description', get_setting('services_meta_description', get_setting('site_description')))
@section('meta_keywords', get_setting('services_meta_keywords', get_setting('site_keywords')))

@section('content')

    <!-- ==============================================
                                                                        ** Inner Banner / Breadcrumb **
                                                                        =================================================== -->
    <section class="inner-banner"
        style="background: url('{{ get_setting_image('services_banner_image', 'https://placehold.co/1920x400?text=Our+Services') }}') no-repeat center center / cover;">
        <div class="container">
            <div class="contents">
                <h1>{{ get_setting('services_banner_heading', 'Our Professional Services') }}</h1>
                <div class="banner-subheading-wrap">
                    <p>{{ get_setting('services_banner_subheading', 'Tailored solutions to help you excel in the IT industry.') }}
                    </p>
                </div>
                <ul class="breadcrumb-custom">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Services</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- ==============================================
                                                                        ** Services Grid Section **
                                                                        =================================================== -->
    <section class="services-page-section padding-lg">
        <div class="container">
            <div class="section-header-premium text-center mb-60">
                <span class="sub-badge">What We Offer</span>
                <h2>{!! get_setting('services_section_heading', 'Excellence in <span>IT Training & Consulting</span>') !!}
                </h2>
                <div class="header-line"></div>
                <p>{{ get_setting('services_section_subheading', 'We offer a wide range of specialized services designed to bridge the gap between education and industry requirements.') }}
                </p>
            </div>

            <div class="row">
                @forelse($services as $index => $service)
                    <div class="col-md-4 col-sm-6 mb-40">
                        <div class="modern-service-card-premium">
                            <div class="card-image">
                                <img src="{{ $service->icon_image ? asset($service->icon_image) : 'https://placehold.co/400x250?text=Service+Icon' }}"
                                    alt="{{ $service->title }}" class="img-responsive">
                                <div class="card-icon-floating">
                                    <i class="fa fa-briefcase"></i>
                                </div>
                            </div>
                            <div class="card-body-premium">
                                <div class="card-number">0{{ $index + 1 }}</div>
                                <h3>{{ $service->title }}</h3>
                                <p>{{ $service->short_description ?? 'High-quality professional training and support designed for career success and personal growth.' }}
                                </p>
                                <div class="card-footer-premium">
                                    <a href="{{ route('service.details', $service->slug) }}" class="btn-read-more">Learn More <i
                                            class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-xs-12 text-center">
                        <div class="empty-state p-50">
                            <i class="fa fa-briefcase fa-4x text-gray-200 mb-20"></i>
                            <h3 class="text-gray-400">No services available at the moment.</h3>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ==============================================
                                                                    ** CTA Section **
                                                                    =================================================== -->
    @php
        $servicesCtaBg = get_setting('services_cta_background_image');
        $servicesCtaBgUrl = $servicesCtaBg && file_exists(public_path($servicesCtaBg)) ? asset($servicesCtaBg) : null;
        $servicesCtaHeading = get_setting('services_cta_heading');
        if ($servicesCtaHeading === null || $servicesCtaHeading === '') {
            $servicesCtaHeading = get_setting('about_cta_heading', 'Ready to Start Your <span>Journey With Us</span>?');
        }
        $servicesCtaSub = get_setting('services_cta_subheading');
        if ($servicesCtaSub === null || $servicesCtaSub === '') {
            $servicesCtaSub = get_setting('about_cta_subheading', 'Join thousands of students who have transformed their careers through our industry-leading programs.');
        }
    @endphp
    <section class="cta-section padding-lg"@if ($servicesCtaBgUrl) style="background: linear-gradient(rgba(27, 48, 92, 0.9), rgba(27, 48, 92, 0.9)), url('{{ $servicesCtaBgUrl }}') no-repeat center center / cover;"@endif>
        <div class="container">
            <div class="cta-inner text-center">
                <h2>{!! $servicesCtaHeading !!}</h2>
                <p>{{ $servicesCtaSub }}</p>
                <div class="cta-btns">
                    <a href="{{ get_setting('services_cta_btn1_link') ?: get_setting('about_cta_btn1_link', '#') }}"
                        class="btn-primary-custom">{{ get_setting('services_cta_btn1_text') ?: get_setting('about_cta_btn1_text', 'Enroll Now') }}</a>
                    <a href="{{ get_setting('services_cta_btn2_link') ?: get_setting('about_cta_btn2_link', '#') }}"
                        class="btn-outline-custom">{{ get_setting('services_cta_btn2_text') ?: get_setting('about_cta_btn2_text', 'Contact Admissions') }}</a>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* --- Breadcrumb / Inner Banner --- */
        .inner-banner {
            padding: 300px 0 100px !important;
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

        /* --- Premium Section Header --- */
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

        .section-header-premium h2 {
            font-size: 42px;
            color: #1b305c;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .section-header-premium h2 span {
            color: #ff9600;
        }

        .header-line {
            width: 80px;
            height: 4px;
            background: #ff9600;
            margin: 0 auto 25px;
            border-radius: 2px;
        }

        .section-header-premium p {
            max-width: 700px;
            margin: 0 auto 50px;
            color: #666;
            font-size: 17px;
            line-height: 1.6;
        }

        /* --- Services Grid Section Fixes --- */
        .services-page-section .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .services-page-section .row>[class*='col-'] {
            display: flex;
            flex-direction: column;
        }

        /* --- Modern Service Card Premium --- */
        .modern-service-card-premium {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            height: 100%;
            display: flex;
            flex-direction: column;
            border: 1px solid #f1f5f9;
        }

        .modern-service-card-premium:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(27, 48, 92, 0.12);
            border-color: #1b305c20;
        }

        .card-image {
            position: relative;
            overflow: hidden;
            height: 220px;
        }

        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .modern-service-card-premium:hover .card-image img {
            transform: scale(1.1);
        }

        .card-icon-floating {
            position: absolute;
            bottom: -25px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: #ff9600;
            color: #fff;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: 0 10px 20px rgba(255, 150, 0, 0.3);
            border: 4px solid #fff;
            transition: all 0.3s ease;
        }

        .modern-service-card-premium:hover .card-icon-floating {
            transform: translateY(-5px);
            background: #1b305c;
            box-shadow: 0 10px 20px rgba(27, 48, 92, 0.3);
        }

        .card-body-premium {
            padding: 40px 30px 30px;
            position: relative;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .card-number {
            position: absolute;
            top: 15px;
            left: 30px;
            font-size: 40px;
            font-weight: 800;
            color: #f1f5f9;
            line-height: 1;
            z-index: 0;
            transition: 0.3s;
        }

        .modern-service-card-premium:hover .card-number {
            color: #1b305c08;
            transform: scale(1.2);
        }

        .card-body-premium h3 {
            font-size: 24px;
            color: #1b305c;
            font-weight: 700;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
        }

        .card-body-premium p {
            flex: 1;
            margin-bottom: 25px;
            position: relative;
            z-index: 1;
            font-size: 15px;
            color: #64748b;
            line-height: 1.6;
        }

        .card-footer-premium {
            margin-top: auto;
            padding-top: 20px;
            border-top: 1px solid #f1f5f9;
        }

        .btn-read-more {
            color: #1b305c;
            font-weight: 700;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none !important;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: 0.3s;
        }

        .btn-read-more i {
            transition: transform 0.3s;
        }

        .btn-read-more:hover {
            color: #ff9600;
        }

        .btn-read-more:hover i {
            transform: translateX(8px);
        }

        /* --- CTA Section (matches About page; optional photo via admin sets inline background) --- */
        .cta-section {
            background: linear-gradient(135deg, #1b305c 0%, #243f6e 45%, #1b305c 100%);
            color: #fff;
        }

        .cta-inner h2 {
            font-size: 42px;
            font-weight: 800;
            color: #fff;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            line-height: 1.2;
        }

        .cta-inner h2 span {
            color: #ff9600;
        }

        .cta-inner p {
            font-size: 18px;
            margin-bottom: 40px;
            opacity: 0.9;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-btns {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .btn-outline-custom {
            display: inline-block;
            background: transparent;
            color: #fff !important;
            padding: 16px 40px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            transition: all 0.4s ease;
            text-decoration: none !important;
            border: 2px solid #fff;
        }

        .btn-outline-custom:hover {
            background: #fff;
            color: #1b305c !important;
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
        }

        .btn-primary-custom:hover {
            background-color: #e08500;
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(255, 150, 0, 0.3);
        }

        @media (max-width: 767px) {
            .cta-inner h2 {
                font-size: 28px;
            }

            .cta-btns {
                flex-direction: column;
                gap: 15px;
                align-items: center;
            }

            .cta-btns .btn-primary-custom,
            .cta-btns .btn-outline-custom {
                width: 100%;
                max-width: 320px;
                text-align: center;
            }
        }
    </style>
@endsection