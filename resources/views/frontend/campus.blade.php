@extends('frontend.layouts.master')
@section('title', 'Our Campuses')

@section('meta_title', get_setting('campus_meta_title', 'Our Campuses | ' . get_setting('site_title')))
@section('meta_description', get_setting('campus_meta_description', get_setting('site_description')))
@section('meta_keywords', get_setting('campus_meta_keywords', get_setting('site_keywords')))

@section('content')

    <!-- ==============================================
                                                                        ** Inner Banner / Breadcrumb **
                                                                        =================================================== -->
    @php
        $campusBannerPath = get_setting('campus_banner_image');
        $campusBannerUrl = $campusBannerPath && file_exists(public_path($campusBannerPath)) ? asset($campusBannerPath) : null;
    @endphp
    <section class="inner-banner"@if ($campusBannerUrl) style="background: url('{{ $campusBannerUrl }}') no-repeat center center / cover;" @endif>
        <div class="container">
            <div class="contents">
                <h1>{!! get_setting('campus_banner_heading', 'Our World-Class <span>Campuses</span>') !!}</h1>
                <div class="banner-subheading-wrap">
                    <p>{{ get_setting('campus_banner_subheading', 'Experience a vibrant learning environment equipped with modern facilities.') }}
                    </p>
                </div>
                <ul class="breadcrumb-custom">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Campuses</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- ==============================================
                                                                        ** Campus Grid Section **
                                                                        =================================================== -->
    <section class="campus-page-section padding-lg">
        <div class="container">
            <div class="section-header-premium text-center mb-60">
                <span class="sub-badge">Where Excellence Lives</span>
                <h2>{!! get_setting('campus_section_heading', 'Explore Our <span>Learning Hubs</span>') !!}</h2>
                <div class="header-line"></div>
                <p>{{ get_setting('campus_section_subheading', 'Our campuses are strategically located to provide students with a conducive environment for both academic and personal growth.') }}
                </p>
            </div>

            <div class="row">
                @forelse($campuses as $campus)
                    <div class="col-md-6 mb-40">
                        <div class="campus-card-premium transition-all">
                            <div class="campus-img-box">
                                <a href="{{ route('campus.details', $campus->slug) }}">
                                    <img src="{{ $campus->image ? asset($campus->image) : 'https://placehold.co/800x500?text=Campus+Image' }}"
                                        alt="{{ $campus->title }}" class="img-responsive">
                                </a>
                                <div class="campus-tag">
                                    <i class="fa fa-map-marker"></i> Learning Center
                                </div>
                            </div>
                            <div class="campus-info-premium bg-white p-30">
                                <h3><a href="{{ route('campus.details', $campus->slug) }}"
                                        style="color: inherit; text-decoration: none;">{{ $campus->title }}</a></h3>
                                <p class="campus-short-desc">{{ $campus->short_description }}</p>

                                <div class="campus-footer-action mt-20 pt-20 border-top">
                                    <a href="{{ route('campus.details', $campus->slug) }}" class="btn-premium-action">
                                        View Details <i class="fa fa-arrow-right ml-10"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-xs-12 text-center">
                        <div class="empty-state-v2">
                            <i class="fa fa-university fa-4x text-gray-200"></i>
                            <h3>No campus data available yet.</h3>
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
        $campusCtaBgPath = get_setting('campus_cta_background_image');
        $campusCtaBgUrl = $campusCtaBgPath && file_exists(public_path($campusCtaBgPath)) ? asset($campusCtaBgPath) : null;
        $campusCtaBtnLink = trim((string) get_setting('campus_cta_btn_link', ''));
        if ($campusCtaBtnLink === '') {
            $campusCtaBtnLink = route('contact');
        }
    @endphp
    <section class="cta-section padding-lg"@if ($campusCtaBgUrl) style="background: linear-gradient(rgba(27, 48, 92, 0.9), rgba(27, 48, 92, 0.9)), url('{{ $campusCtaBgUrl }}') no-repeat center center / cover;"@endif>
        <div class="container">
            <div class="cta-inner text-center">
                <h2>{!! get_setting('campus_cta_heading', 'Visit Our <span>Campus Today</span>') !!}</h2>
                <p>{{ get_setting('campus_cta_subheading', 'Take a tour and experience the professional atmosphere that will shape your future.') }}</p>
                <div class="cta-btns">
                    <a href="{{ $campusCtaBtnLink }}" class="btn-primary-custom">{{ get_setting('campus_cta_btn_text', 'Book a Campus Tour') }}</a>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* --- Inner Banner (gradient when no photo; optional campus_banner_image) --- */
        .inner-banner {
            padding: 300px 0 100px !important;
            position: relative;
            color: #fff;
            text-align: center;
            background: linear-gradient(135deg, #1b305c 0%, #243f6e 45%, #1b305c 100%);
        }

        /* --- Grid & Card Fixes --- */
        .campus-page-section .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .campus-page-section .row>[class*='col-'] {
            display: flex;
            flex-direction: column;
        }

        .campus-card-premium {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid #f1f5f9;
            height: 100%;
            flex: 1;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }

        .campus-card-premium:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(27, 48, 92, 0.1);
        }

        .btn-premium-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #1b305c;
            color: #fff !important;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 800;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 1px;
            text-decoration: none !important;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 5px 15px rgba(27, 48, 92, 0.1);
            border: 2px solid #1b305c;
            width: 100%;
        }

        .btn-premium-action:hover {
            background: #ff9600;
            border-color: #ff9600;
            color: #fff !important;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 150, 0, 0.3);
        }

        .btn-premium-action i {
            margin-left: 10px;
            transition: transform 0.3s ease;
        }

        .btn-premium-action:hover i {
            transform: translateX(5px);
        }

        .campus-img-box {
            position: relative;
            height: 300px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .campus-img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.6s;
        }

        .campus-info-premium {
            padding: 30px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .campus-short-desc {
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 25px;
            font-size: 15px;
            flex: 1;
        }

        .campus-footer-action {
            margin-top: auto;
            padding-top: 20px;
            border-top: 1px solid #f1f5f9;
        }

        .campus-tag {
            position: absolute;
            top: 20px;
            left: 20px;
            background: #ff9600;
            color: #fff;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 700;
            box-shadow: 0 5px 15px rgba(255, 150, 0, 0.3);
            z-index: 10;
        }

        .campus-info-premium h3 {
            font-size: 26px;
            font-weight: 800;
            color: #1b305c;
            margin-bottom: 15px;
        }

        .feature-list {
            list-style: none;
            padding: 0;
            margin: 0 0 20px;
        }

        .feature-list li {
            font-size: 13px;
            color: #475569;
            margin-bottom: 10px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .feature-list li i {
            color: #ff9600;
            width: 15px;
        }

        /* Generic styles repeat for consistency */
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
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 15px;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 2px;
            position: relative;
            z-index: 5;
        }

        .inner-banner h1 span {
            color: #ff9600;
        }

        .inner-banner h1::before,
        .inner-banner h1::after,
        .inner-banner .contents::before,
        .inner-banner .contents::after,
        .inner-banner .container::before,
        .inner-banner .container::after {
            display: none !important;
            content: none !important;
        }

        .breadcrumb-custom {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            gap: 15px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 13px;
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
        }

        .banner-subheading-wrap p {
            display: inline-block;
            background: rgba(255, 150, 0, 0.15);
            color: #ff9600;
            padding: 6px 20px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 12px;
            text-transform: uppercase;
            border: 1px solid rgba(255, 150, 0, 0.3);
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

        /* --- CTA (optional campus_cta_background_image sets inline background) --- */
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
            flex-wrap: wrap;
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
            color: #ffffff !important;
        }

        @media (max-width: 767px) {
            .cta-inner h2 {
                font-size: 28px;
            }

            .cta-btns .btn-primary-custom {
                width: 100%;
                max-width: 320px;
                text-align: center;
            }
        }
    </style>
@endsection