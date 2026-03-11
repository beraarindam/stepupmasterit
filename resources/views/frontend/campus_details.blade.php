@extends('frontend.layouts.master')
@section('title', $campus->title)

@section('content')

    <!-- ==============================================
                                                                                                                            ** Inner Banner / Breadcrumb **
                                                                                                                            =================================================== -->
    <section class="inner-banner"
        style="background: url('{{ $campus->image ? asset($campus->image) : get_setting_image('campus_banner_image', 'https://placehold.co/1920x400?text=Campus+Details') }}') no-repeat center center / cover;">
        <div class="container">
            <div class="contents">
                <h1>{{ $campus->title }}</h1>
                <div class="banner-subheading-wrap">
                    <p>Experience Our World-Class Learning Environment</p>
                </div>
                <ul class="breadcrumb-custom">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('campus') }}">Campuses</a></li>
                    <li>Details</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- ==============================================
                                                                                                                            ** Campus Details Content **
                                                                                                                            =================================================== -->
    <section class="campus-details-section padding-lg">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-md-8">
                    <div class="campus-main-wrapper bg-white shadow-premium rounded-20 overflow-hidden">
                        @if($campus->image)
                            <div class="main-thumb">
                                <img src="{{ asset($campus->image) }}" class="img-responsive w-full" alt="{{ $campus->title }}">
                            </div>
                        @endif

                        <div class="campus-body p-50">
                            <!-- Premium Tabs Navigation -->
                            <div class="tabs-container-premium">
                                <ul class="nav-tabs-premium mb-40">
                                    <li class="active">
                                        <a href="#overview" data-toggle="tab">
                                            <i class="fa fa-info-circle"></i> <span>Overview</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#descriptions" data-toggle="tab">
                                            <i class="fa fa-file-text"></i> <span>Descriptions</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#career" data-toggle="tab">
                                            <i class="fa fa-briefcase"></i> <span>Career</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#summary" data-toggle="tab">
                                            <i class="fa fa-list-alt"></i> <span>Summary</span>
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab Panes -->
                                <div class="tab-content">
                                    <!-- Overview Tab -->
                                    <div class="tab-pane active animated fadeIn" id="overview">
                                        <div class="content-header-wrap">
                                            <span class="sub-heading-badge">Basic Information</span>
                                            <h2 class="content-header">{{ $campus->title }}</h2>
                                            <div class="header-line-custom"></div>
                                        </div>
                                        <div class="rich-text-area mt-30">
                                            {!! $campus->tab_overview ?? $campus->description !!}
                                        </div>


                                    </div>

                                    <!-- Descriptions Tab -->
                                    <div class="tab-pane animated fadeIn" id="descriptions">
                                        <div class="content-header-wrap">
                                            <span class="sub-heading-badge">Campus Details</span>
                                            <h2 class="content-header">Campus <span>Descriptions</span></h2>
                                            <div class="header-line-custom"></div>
                                        </div>
                                        <div class="rich-text-area mt-30">
                                            {!! $campus->tab_descriptions ?? '<p>Specific details about the campus environment and academic culture will be displayed here.</p>' !!}
                                        </div>
                                    </div>

                                    <!-- Career Tab -->
                                    <div class="tab-pane animated fadeIn" id="career">
                                        <div class="content-header-wrap">
                                            <span class="sub-heading-badge">Pathways</span>
                                            <h2 class="content-header">Career & <span>Progression</span></h2>
                                            <div class="header-line-custom"></div>
                                        </div>
                                        <div class="rich-text-area mt-30">
                                            {!! $campus->tab_career ?? '<p>Explore the career paths and progression opportunities available at our campus.</p>' !!}
                                        </div>
                                    </div>

                                    <!-- Summary Tab -->
                                    <div class="tab-pane animated fadeIn" id="summary">
                                        <div class="content-header-wrap">
                                            <span class="sub-heading-badge">At a Glance</span>
                                            <h2 class="content-header">Campus <span>Summary</span></h2>
                                            <div class="header-line-custom"></div>
                                        </div>
                                        <div class="rich-text-area mt-30">
                                            {!! $campus->tab_summary ?? '<p>A quick summary of the key highlights and features of this campus.</p>' !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="campus-cta-block mt-80">
                                <div class="cta-text">
                                    <h3>Ready to Visit?</h3>
                                    <p>Book a campus tour today and experience our facilities firsthand.</p>
                                </div>
                                <div class="cta-btn">
                                    <a href="{{ route('contact') }}" class="btn-premium-blue">Book a Tour</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-md-4">
                    <div class="premium-sidebar">
                        @if($other_campuses->count() > 0)
                            <!-- Campus Navigation -->
                            <div class="sidebar-nav-card mb-30">
                                <h4 class="sidebar-title">Our Campuses</h4>
                                <div class="sidebar-line mb-20"></div>
                                <ul class="sidebar-menu-list">
                                    @foreach($other_campuses as $other)
                                        <li class="{{ $other->id == $campus->id ? 'active' : '' }}">
                                            <a href="{{ route('campus.details', $other->slug) }}">
                                                <span>{{ $other->title }}</span>
                                                <i class="fa fa-chevron-right"></i>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Other Campuses Card -->
                        <div class="sidebar-nav-card mb-30 fadeIn">
                            <h4 class="sidebar-title">Other Campuses</h4>
                            <div class="sidebar-line mb-20"></div>
                            <ul class="sidebar-menu-list">
                                @foreach($other_campuses as $other)
                                    <li>
                                        <a href="{{ route('campus.details', $other->slug) }}">
                                            <span>{{ $other->title }}</span>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Contact Support Box -->
                        <div class="sidebar-support-box mb-30">
                            <div class="support-icon"><i class="fa fa-headphones"></i></div>
                            <h4>Admissions Contact</h4>
                            <p>Speak directly with our campus advisors for immediate assistance.</p>
                            <div class="support-contact">
                                <a
                                    href="tel:{{ get_setting('contact_phone') }}">{{ get_setting('contact_phone', '+1 234 567 890') }}</a>
                                <a href="mailto:{{ get_setting('contact_email') }}">{{ get_setting('contact_email',
                                    'admissions@stepupmasterit.com') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .campus-details-section {
            background: #f8fafc;
            padding: 100px 0 80px;
        }

        .shadow-premium {
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.04);
            border: 1px solid #f1f5f9;
        }

        .rounded-20 {
            border-radius: 20px;
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

        .mb-20 {
            margin-bottom: 20px;
        }

        /* --- Banner Style --- */
        .inner-banner {
            padding: 300px 0 100px !important;
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
        .sidebar-nav-card,
        .sidebar-info-card {
            background: #fff;
            border-radius: 20px;
            padding: 30px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
            margin-bottom: 30px;
        }

        .sidebar-title {
            font-size: 20px;
            font-weight: 800;
            color: #1b305c;
            margin-bottom: 10px;
            text-transform: uppercase;
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
            background: linear-gradient(135deg, #1b305c, #2a4a8e);
            padding: 40px 30px;
            border-radius: 20px;
            color: #fff;
            text-align: center;
        }

        .support-icon {
            font-size: 45px;
            margin-bottom: 20px;
            color: #ff9600;
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

        .quick-info-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .key-info-premium-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .key-info-premium-list li {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px dashed #e2e8f0;
        }

        .key-info-premium-list li:last-child {
            border-bottom: none;
        }

        .k-icon {
            width: 40px;
            height: 40px;
            background: #fff0db;
            color: #ff9600;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
            border: 1px solid #ff960040;
        }

        .k-text strong {
            display: block;
            color: #1b305c;
            font-size: 14px;
            line-height: 1.2;
            margin-bottom: 2px;
        }

        .k-text span {
            color: #64748b;
            font-size: 13px;
            font-weight: 500;
        }

        .sub-heading-badge {
            display: inline-block;
            color: #ff9600;
            font-weight: 800;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }

        .mt-60 {
            margin-top: 60px;
        }

        /* --- Main Content --- */
        .content-header-wrap {
            margin-bottom: 30px;
            position: relative;
        }

        .content-header {
            font-size: 32px;
            font-weight: 800;
            color: #1b305c;
            margin-bottom: 12px;
            text-transform: uppercase;
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

        .feature-item-modern {
            display: flex;
            gap: 15px;
            background: #fff;
            padding: 15px;
            border-radius: 12px;
            border: 1px solid #f1f5f9;
            transition: 0.3s;
        }

        .feature-item-modern:hover {
            border-color: #ff9600;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .feature-icon {
            width: 45px;
            height: 45px;
            background: #f0f7ff;
            color: #1b305c;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .feature-text h5 {
            font-weight: 700;
            margin-bottom: 5px;
            color: #1b305c;
            font-size: 16px;
        }

        .feature-text p {
            font-size: 13px;
            color: #64748b;
            margin-bottom: 0;
            line-height: 1.4;
        }

        .campus-cta-block {
            background: #ff9600;
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
            color: rgba(255, 255, 255, 0.9);
            margin: 0;
        }

        .btn-premium-orange {
            display: inline-block;
            background: #1b305c;
            color: #fff !important;
            padding: 14px 30px;
            border-radius: 50px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none !important;
            transition: 0.3s;
            box-shadow: 0 10px 20px rgba(27, 48, 92, 0.2);
        }

        .btn-premium-orange:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(27, 48, 92, 0.3);
            background: #142446;
        }

        /* --- Tabs Overhaul Premium --- */
        .nav-tabs-premium {
            display: flex;
            background: #f1f5f9;
            padding: 8px;
            border-radius: 16px;
            list-style: none;
            margin-bottom: 40px;
            border: none;
        }

        .nav-tabs-premium li {
            flex: 1;
        }

        .nav-tabs-premium li a {
            display: block;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none !important;
            border-radius: 12px;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            color: #64748b;
            font-weight: 700;
            border: none !important;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .nav-tabs-premium li.active a {
            background: #fff;
            color: #1b305c;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        }

        .nav-tabs-premium li.active a i {
            color: #ff9600;
        }

        .nav-tabs-premium li a:hover:not(.active) {
            background: rgba(255, 255, 255, 0.5);
            color: #1b305c;
        }

        .check-list-modern {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .check-list-modern li {
            margin-bottom: 12px;
            font-weight: 600;
            color: #475569;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .check-list-modern li i {
            color: #ff9600;
            font-size: 18px;
        }

        .btn-premium-blue {
            display: inline-block;
            background: #1b305c;
            color: #fff !important;
            padding: 14px 30px;
            border-radius: 50px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none !important;
            transition: 0.3s;
            box-shadow: 0 10px 20px rgba(27, 48, 92, 0.15);
        }

        .btn-premium-blue:hover {
            transform: translateY(-3px);
            background: #142446;
            box-shadow: 0 10px 25px rgba(27, 48, 92, 0.3);
        }

        /* Waterfall Animations */
        .animated {
            animation-duration: 0.6s;
            animation-fill-mode: both;
        }

        .fadeIn {
            animation-name: fadeIn;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 767px) {
            .campus-cta-block {
                text-align: center;
                justify-content: center;
            }

            .campus-body {
                padding: 30px;
            }

            .nav-tabs-premium {
                flex-direction: column;
                gap: 5px;
            }

            .nav-tabs-premium li a {
                justify-content: flex-start;
            }
        }
    </style>
@endsection