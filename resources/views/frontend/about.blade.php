@extends('frontend.layouts.master')
@section('title', 'About Us')

@section('meta_title', get_setting('about_meta_title', get_setting('site_title')))
@section('meta_description', get_setting('about_meta_description', get_setting('site_description')))
@section('meta_keywords', get_setting('about_meta_keywords', get_setting('site_keywords')))

@section('content')

    <!-- ==============================================
                                                ** Inner Banner / Breadcrumb **
                                                =================================================== -->
    <section class="inner-banner"
        style="background: url('{{ get_setting_image('about_banner_image', 'https://placehold.co/1920x400?text=About+Us') }}') no-repeat center center / cover;">
        <div class="container">
            <div class="contents">
                <h1>{{ get_setting('about_banner_heading', 'About Our Institution') }}</h1>
                <div class="banner-subheading-wrap">
                    <p>{{ get_setting('about_banner_subheading', 'Learn more about our mission, vision, and values.') }}</p>
                </div>
                <ul class="breadcrumb-custom">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- ==============================================
                                                ** About Us Main Content **
                                                =================================================== -->
    <section class="about-us-section padding-lg">
        <div class="container">
            <div class="row items-center">
                <div class="col-md-6">
                    <div class="about-text-content">
                        <div class="section-badge">{{ get_setting('home_about_heading', 'Who We Are') }}</div>
                        <h2>{!! get_setting('about_intro_heading', 'Learn About <span>Step Up Master IT</span>') !!}</h2>
                        <div class="description-text">
                            <p>{{ get_setting('home_about_description', 'We are dedicated to providing the highest quality education and training to empower the next generation of professionals.') }}
                            </p>
                        </div>

                        <div class="mv-boxes mt-40">
                            @if(get_setting('about_mission'))
                                <div class="mv-item mb-30">
                                    <div class="mv-icon"><i class="fa fa-bullseye"></i></div>
                                    <div class="mv-text">
                                        <h3>Our Mission</h3>
                                        <p>{!! get_setting('about_mission') !!}</p>
                                    </div>
                                </div>
                            @endif

                            @if(get_setting('about_vision'))
                                <div class="mv-item">
                                    <div class="mv-icon"><i class="fa fa-eye"></i></div>
                                    <div class="mv-text">
                                        <h3>Our Vision</h3>
                                        <p>{!! get_setting('about_vision') !!}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-mobile-40">
                    <div class="about-image-wrapper">
                        <div class="image-inner">
                            <img src="{{ get_setting('home_about_image') ? asset(get_setting('home_about_image')) : 'https://placehold.co/600x600?text=About+Us' }}"
                                class="img-responsive main-img" alt="About Us">
                            <div class="experience-badge">
                                <span class="number">{{ get_setting('about_exp_text', '10+') }}</span>
                                <span class="text">{{ get_setting('about_exp_label', 'Years of Excellence') }}</span>
                            </div>
                        </div>
                        <div class="shape-1"></div>
                        <div class="shape-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==============================================
                                                ** Values / Why Choose Us **
                                                =================================================== -->
    <section class="why-choose-us-premium padding-lg">
        <div class="container">
            <div class="section-header-premium text-center mb-60">
                <span class="sub-badge">Our Core Excellence</span>
                <h2>{!! get_setting('about_why_heading', 'Why Choose <span>Step Up Master IT</span>?') !!}</h2>
                <div class="header-line"></div>
                <p>{{ get_setting('about_why_subheading', 'We provide industry-leading education with a focus on practical skills and career success, ensuring every student reaches their full potential.') }}</p>
            </div>

            <div class="row">
                @php
                    $highlights = array_filter(explode("\n", get_setting('home_about_highlights', "Certified Professional Instructors\nComprehensive Learning Materials\nIndustry-Recognized Certifications\nCareer Placement Support")));
                    $icons = ['fa-user', 'fa-book', 'fa-star', 'fa-briefcase', 'fa-graduation-cap', 'fa-check-circle'];
                    $colors = ['#1b305c', '#ff9600', '#1b305c', '#ff9600'];
                @endphp

                @foreach($highlights as $index => $point)
                    @php
                        $parts = explode('|', $point, 2);
                        $card_title = trim($parts[0]);
                        $card_desc = isset($parts[1]) ? trim($parts[1]) : get_setting('about_why_card_description', 'Delivering world-class standards in specialized training and hands-on academic support.');
                    @endphp
                    <div class="col-md-3 col-sm-6 mb-30">
                        <div class="modern-value-card" style="--accent-color: {{ $colors[$index % count($colors)] }};">
                            <div class="card-bg-number">0{{ $index + 1 }}</div>
                            <div class="icon-wrap-premium">
                                <div class="icon-inner">
                                    <i class="fa {{ $icons[$index % count($icons)] }}"></i>
                                </div>
                            </div>
                            <div class="card-content-premium">
                                <h3>{{ $card_title }}</h3>
                                <div class="card-dash"></div>
                                <p>{{ $card_desc }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ==============================================
                                            ** Core Values Section **
                                            =================================================== -->
    <section class="core-values-section padding-lg">
        <div class="container">
            <div class="row items-center">
                <div class="col-md-5">
                    <div class="values-text">
                        <span class="sub-badge">Our Philosophy</span>
                        <h2>{!! get_setting('about_values_heading', 'Core Values That <span>Drive Us Forward</span>') !!}</h2>
                        <p>{{ get_setting('about_values_description', 'Our foundation is built on principles that ensure we deliver excellence consistently and transparently to all our students.') }}</p>
                        <div class="value-mini-list mt-30">
                            @php
                                $values_data = explode("\n", get_setting('about_values_list', "Excellence|We strive for the highest standards in everything we do.\nInclusivity|Education for all, regardless of background or status.\nInnovation|Embracing new technologies to enhance learning.\nPassion|We are dedicated to your success and growth."));
                            @endphp
                            @foreach($values_data as $v_line)
                                @php
                                    $v_parts = explode('|', $v_line);
                                @endphp
                                @if(count($v_parts) >= 1)
                                    <div class="mini-item">
                                        <div class="mini-icon"><i class="fa fa-dot-circle-o"></i></div>
                                        <span>{{ trim($v_parts[0]) }}</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row values-cards-row">
                        @php
                            $v_icons = ['fa-check-square-o', 'fa-handshake-o', 'fa-lightbulb-o', 'fa-heart'];
                        @endphp
                        @foreach($values_data as $index => $v_line)
                            @php
                                $v_parts = explode('|', $v_line);
                            @endphp
                            @if(count($v_parts) >= 2)
                                <div class="col-sm-6 mb-30">
                                    <div class="value-simple-card">
                                        <i class="fa {{ $v_icons[$index % count($v_icons)] }}"></i>
                                        <h4>{{ trim($v_parts[0]) }}</h4>
                                        <p>{{ trim($v_parts[1]) }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==============================================
                                            ** Call to Action Section **
                                            =================================================== -->
    <section class="cta-section padding-lg">
        <div class="container">
            <div class="cta-inner text-center">
                <h2>{!! get_setting('about_cta_heading', 'Ready to Start Your <span>Journey With Us</span>?') !!}</h2>
                <p>{{ get_setting('about_cta_subheading', 'Join thousands of students who have transformed their careers through our industry-leading programs.') }}</p>
                <div class="cta-btns">
                    <a href="{{ get_setting('about_cta_btn1_link', '#') }}" class="btn-primary-custom">{{ get_setting('about_cta_btn1_text', 'Enroll Now') }}</a>
                    <a href="{{ get_setting('about_cta_btn2_link', '#') }}" class="btn-outline-custom">{{ get_setting('about_cta_btn2_text', 'Contact Admissions') }}</a>
                </div>
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

        /* --- About Us Section --- */
        .section-badge {
            display: inline-block;
            background: #f0f7ff;
            color: #1b305c;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }

        .about-text-content h2 {
            font-size: 38px;
            color: #1b305c;
            margin-bottom: 25px;
            font-weight: 800;
        }

        .about-text-content h2 span {
            color: #ff9600;
        }

        .description-text p {
            font-size: 16px;
            line-height: 1.8;
            color: #555;
            margin-bottom: 30px;
        }

        /* Mission Vision Items */
        .mv-item {
            display: flex;
            gap: 20px;
            background: #fff;
            padding: 25px;
            border-radius: 15px;
            border: 1px solid #eee;
            transition: all 0.3s ease;
        }

        .mv-item:hover {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border-color: #1b305c;
            transform: translateY(-5px);
        }

        .mv-icon {
            width: 60px;
            height: 60px;
            background: #1b305c;
            color: #fff;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            flex-shrink: 0;
            transition: 0.3s;
        }

        .mv-item:hover .mv-icon {
            background: #ff9600;
        }

        .mv-text h3 {
            font-size: 20px;
            color: #1b305c;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .mv-text p {
            font-size: 15px;
            color: #666;
            margin-bottom: 0;
            line-height: 1.6;
        }

        /* Image Wrapper */
        .about-image-wrapper {
            position: relative;
            padding: 20px;
        }

        .image-inner {
            position: relative;
            z-index: 2;
        }

        .main-img {
            border-radius: 20px;
            width: 100%;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .experience-badge {
            position: absolute;
            bottom: 40px;
            left: -30px;
            background: #ff9600;
            color: #fff;
            padding: 25px;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 25px rgba(255, 150, 0, 0.3);
            z-index: 3;
            min-width: 140px;
        }

        .experience-badge .number {
            font-size: 32px;
            font-weight: 800;
            line-height: 1;
        }

        .experience-badge .text {
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-align: center;
            margin-top: 5px;
        }

        .shape-1 {
            position: absolute;
            top: -20px;
            right: -20px;
            width: 150px;
            height: 150px;
            background: #f0f7ff;
            border-radius: 50%;
            z-index: 1;
        }

        .shape-2 {
            position: absolute;
            bottom: -30px;
            right: 40px;
            width: 200px;
            height: 200px;
            background: #fff0db;
            border-radius: 50%;
            z-index: 1;
        }

        /* --- Premium Section Header --- */
        .why-choose-us-premium {
            background: #f4f7fa;
            /* Light blue-gray background to make cards POP */
            position: relative;
            z-index: 1;
            padding: 100px 0;
        }

        .why-choose-us-premium::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(#1b305c10 1px, transparent 1px);
            background-size: 30px 30px;
            opacity: 0.5;
            z-index: -1;
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
            position: relative;
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

        /* --- Modern Value Card Visibility Fix --- */
        .modern-value-card {
            background: #ffffff;
            padding: 45px 30px;
            border-radius: 24px;
            text-align: center;
            position: relative;
            overflow: hidden;
            border: 2px solid #e2e8f0;
            /* Thicker border */
            transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
            /* Stronger shadow */
            z-index: 1;
        }

        .modern-value-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--accent-color);
            transform: scaleX(0);
            transition: transform 0.4s ease;
            transform-origin: left;
            z-index: 2;
        }

        .modern-value-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 30px 60px rgba(27, 48, 92, 0.15);
            border-color: var(--accent-color);
        }

        .modern-value-card:hover::before {
            transform: scaleX(1);
        }

        .card-bg-number {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 60px;
            font-weight: 900;
            color: #f1f5f9;
            /* Slightly darker to see it */
            line-height: 1;
            z-index: 0;
            transition: 0.3s;
            opacity: 0.5;
        }

        .modern-value-card:hover .card-bg-number {
            color: #e2e8f0;
            transform: scale(1.1);
            opacity: 1;
        }

        .icon-wrap-premium {
            width: 90px;
            height: 90px;
            background: #fff;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
            position: relative;
            z-index: 2;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: 0.5s;
            border: 1px solid #f1f5f9;
        }

        .icon-inner {
            width: 70px;
            height: 70px;
            background: #f8fafc;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: var(--accent-color) !important;
            /* Force color visibility */
            transition: 0.5s;
        }

        .modern-value-card:hover .icon-wrap-premium {
            background: var(--accent-color);
            transform: rotate(10deg);
            border-color: var(--accent-color);
        }

        .modern-value-card:hover .icon-inner {
            background: rgba(255, 255, 255, 0.2);
            color: #fff !important;
        }

        .card-content-premium {
            position: relative;
            z-index: 2;
        }

        .card-content-premium h3 {
            font-size: 20px;
            color: #1b305c;
            margin-bottom: 15px;
            font-weight: 800;
            line-height: 1.3;
            transition: 0.3s;
        }

        .card-dash {
            width: 30px;
            height: 3px;
            background: var(--accent-color);
            margin: 0 auto 20px;
            border-radius: 2px;
            transition: width 0.3s;
        }

        .modern-value-card:hover .card-dash {
            width: 60px;
        }

        .card-content-premium p {
            font-size: 15px;
            color: #4a5568;
            /* Darker text */
            line-height: 1.6;
            margin: 0;
        }

        @media (max-width: 991px) {
            .section-header-premium h2 {
                font-size: 32px;
            }

            .modern-value-card {
                padding: 35px 25px;
            }
        }

        /* --- Core Values Section --- */
        .core-values-section {
            background: #f8fafc;
        }

        .mini-item {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 12px;
            font-weight: 600;
            color: #1b305c;
        }

        .mini-icon {
            color: #ff9600;
        }

        .value-simple-card {
            background: #fff;
            padding: 35px 25px;
            border-radius: 15px;
            border: 1px solid #edf2f7;
            text-align: center;
            transition: 0.3s;
        }

        .value-simple-card:hover {
            border-color: #ff9600;
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.05);
        }

        .value-simple-card i {
            display: block;
            font-size: 36px;
            color: #ff9600;
            margin-bottom: 20px;
        }

        .value-simple-card h4 {
            font-size: 18px;
            font-weight: 700;
            color: #1b305c;
            margin-bottom: 10px;
        }

        .value-simple-card p {
            font-size: 14px;
            color: #718096;
            margin: 0;
        }

        /* Core Values grid: center last card when odd number */
        .values-cards-row {
            display: flex;
            flex-wrap: wrap;
        }
        .values-cards-row .col-sm-6 {
            display: flex;
        }
        .values-cards-row .value-simple-card {
            height: 100%;
        }
        @media (min-width: 576px) {
            .values-cards-row .col-sm-6:last-child:nth-child(odd) {
                margin-left: 25%;
            }
        }

        /* --- CTA Section --- */
        .cta-section {
            background: linear-gradient(rgba(27, 48, 92, 0.9), rgba(27, 48, 92, 0.9)), url('https://placehold.co/1920x600?text=CTA+Background') no-repeat center center / cover;
            color: #fff;
        }

        .cta-inner h2 {
            font-size: 42px;
            font-weight: 800;
            color: #fff;
            margin-bottom: 20px;
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

        /* --- General Styles --- */
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
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 15px;
            color: #fff;
        }

        .inner-banner p {
            font-size: 18px;
            margin-bottom: 25px;
            opacity: 0.9;
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

        .section-badge {
            display: inline-block;
            background: #f0f7ff;
            color: #1b305c;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }

        .about-text-content h2 {
            font-size: 38px;
            color: #1b305c;
            margin-bottom: 25px;
            font-weight: 800;
        }

        .about-text-content h2 span {
            color: #ff9600;
        }

        .description-text p {
            font-size: 16px;
            line-height: 1.8;
            color: #555;
            margin-bottom: 30px;
        }

        .mv-item {
            display: flex;
            gap: 20px;
            background: #fff;
            padding: 25px;
            border-radius: 15px;
            border: 1px solid #eee;
            transition: all 0.3s ease;
        }

        .mv-item:hover {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border-color: #1b305c;
            transform: translateY(-5px);
        }

        .mv-icon {
            width: 60px;
            height: 60px;
            background: #1b305c;
            color: #fff;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            flex-shrink: 0;
            transition: 0.3s;
        }

        .mv-item:hover .mv-icon {
            background: #ff9600;
        }

        .mv-text h3 {
            font-size: 20px;
            color: #1b305c;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .mv-text p {
            font-size: 15px;
            color: #666;
            margin-bottom: 0;
            line-height: 1.6;
        }

        .about-image-wrapper {
            position: relative;
            padding: 20px;
        }

        .image-inner {
            position: relative;
            z-index: 2;
        }

        .main-img {
            border-radius: 20px;
            width: 100%;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .experience-badge {
            position: absolute;
            bottom: 40px;
            left: -30px;
            background: #ff9600;
            color: #fff;
            padding: 25px;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 25px rgba(255, 150, 0, 0.3);
            z-index: 3;
            min-width: 140px;
        }

        .experience-badge .number {
            font-size: 32px;
            font-weight: 800;
            line-height: 1;
        }

        .experience-badge .text {
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-align: center;
            margin-top: 5px;
        }

        .shape-1 {
            position: absolute;
            top: -20px;
            right: -20px;
            width: 150px;
            height: 150px;
            background: #f0f7ff;
            border-radius: 50%;
            z-index: 1;
        }

        .shape-2 {
            position: absolute;
            bottom: -30px;
            right: 40px;
            width: 200px;
            height: 200px;
            background: #fff0db;
            border-radius: 50%;
            z-index: 1;
        }

        @media (max-width: 767px) {
            .cta-inner h2 {
                font-size: 28px;
            }

            .cta-btns {
                flex-direction: column;
                gap: 15px;
            }

            .mb-mobile-30 {
                margin-bottom: 30px;
            }
        }

        /* --- Global / Helpers --- */
        .items-center {
            align-items: center;
        }

        .mt-40 {
            margin-top: 40px;
        }

        .mt-30 {
            margin-top: 30px;
        }

        .mb-30 {
            margin-bottom: 30px;
        }

        .mb-50 {
            margin-bottom: 50px;
        }

        .mb-60 {
            margin-bottom: 60px;
        }

        .padding-lg {
            padding: 90px 0;
        }

        .bg-gray-light {
            background-color: #f8fafc;
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
    </style>

@endsection