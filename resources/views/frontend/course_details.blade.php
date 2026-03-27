@extends('frontend.layouts.master')
@section('title', $course->title)

@section('content')
    <!-- ==============================================
                            ** Inner Banner / Breadcrumb **
                            =================================================== -->
    <section class="inner-banner"
        style="background: url('{{ $course->image ? asset($course->image) : get_setting_image('courses_banner_image', 'https://placehold.co/1920x450?text=Course+Details') }}') no-repeat center center / cover;">
        <div class="container">
            <div class="contents">
                <h1>{{ $course->title }}</h1>
                <div class="banner-subheading-wrap">
                    <p>{{ $course->category->name ?? 'Professional Certification' }}</p>
                </div>
                <ul class="breadcrumb-custom">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('courses') }}">Courses</a></li>
                    @if($course->category)
                        <li><a href="{{ route('category.courses', $course->category->slug) }}">{{ $course->category->name }}</a>
                        </li>
                    @endif
                    <li>Details</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- ==============================================
                            ** Course Details Section **
                            =================================================== -->
    <section class="course-details-section padding-lg">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-md-8">
                    <div class="course-main-wrapper shadow-premium rounded-20 overflow-hidden bg-white">
                        @if($course->image)
                            <div class="main-thumb">
                                <img src="{{ asset($course->image) }}" alt="{{ $course->title }}" class="img-responsive w-full">
                            </div>
                        @endif

                        <div class="course-content-rich p-50">
                            <!-- Premium Tabs -->
                            <div class="tabs-container-premium">
                                <ul class="nav-tabs-custom-v2">
                                    <li class="active">
                                        <a href="#overview" data-toggle="tab">
                                            <div class="tab-btn-content">
                                                <i class="fa fa-info-circle"></i>
                                                <span>Overview</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#curriculum" data-toggle="tab">
                                            <div class="tab-btn-content">
                                                <i class="fa fa-book"></i>
                                                <span>Curriculum</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content mt-40">
                                    <div class="tab-pane active animated-fast fadeInUp" id="overview">
                                        <div class="content-header-wrap">
                                            <h2 class="content-header">Course Overview</h2>
                                            <div class="header-line-custom"></div>
                                        </div>
                                        <div class="rich-text-area">
                                            {!! $course->description !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane animated-fast fadeInUp" id="curriculum">
                                        <div class="content-header-wrap">
                                            <h2 class="content-header">Curriculum & Learning</h2>
                                            <div class="header-line-custom"></div>
                                        </div>
                                        <div class="rich-text-area">
                                            {!! $course->short_description !!}
                                            <div class="learning-outcome-box mt-40">
                                                <h4>What you'll achieve:</h4>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <ul class="benefit-list">
                                                            <li><i class="fa fa-check-circle"></i> Master core industry
                                                                concepts & tools</li>
                                                            <li><i class="fa fa-check-circle"></i> Hands-on project
                                                                experience with experts</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <ul class="benefit-list">
                                                            <li><i class="fa fa-check-circle"></i> Global certification
                                                                readiness & support</li>
                                                            <li><i class="fa fa-check-circle"></i> Career guidance and
                                                                placement assistance</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-md-4">
                    <div class="premium-sidebar">
                        <!-- Quick Info Card -->
                        <div class="sidebar-info-card mb-30 d-none">
                            <div class="price-tag">
                                <span class="fee-label">Course Investment</span>
                                <span
                                    class="fee-value">{{ $course->fee ? '₹' . number_format($course->fee) : 'TBD' }}</span>
                            </div>

                            <ul class="meta-info-list">
                                <li>
                                    <span class="meta-label"><i class="fa fa-clock-o"></i> Duration</span>
                                    <span class="meta-value">{{ $course->duration ?? '4-6 Weeks' }}</span>
                                </li>
                                <li>
                                    <span class="meta-label"><i class="fa fa-signal"></i> Level</span>
                                    <span class="meta-value">Beginner to Expert</span>
                                </li>
                                @if($course->category)
                                    <li>
                                        <span class="meta-label"><i class="fa fa-folder-open"></i> Category</span>
                                        <span class="meta-value">{{ $course->category->name }}</span>
                                    </li>
                                @endif
                                <li>
                                    <span class="meta-label"><i class="fa fa-language"></i> Language</span>
                                    <span class="meta-value">English / Hindi</span>
                                </li>
                            </ul>

                            <a href="{{ route('contact') }}" class="btn-enroll-premium mt-30">
                                Enquire Now <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>

                        <!-- Admissions Support -->
                        <div class="sidebar-help-box mb-30">
                            <div class="help-icon"><i class="fa fa-graduation-cap"></i></div>
                            <h4>Admissions Support</h4>
                            <p>Speak to our career counselors for expert guidance on course selection.</p>
                            <div class="contact-links">
                                <a href="tel:{{ get_setting('contact_phone') }}"><i class="fa fa-phone"></i>
                                    {{ get_setting('contact_phone') }}</a>
                            </div>
                        </div>

                        <!-- Related Courses -->
                        @if($related_courses->count() > 0)
                            <div class="sidebar-related-widget">
                                <h4 class="widget-title">Related Programs</h4>
                                <div class="header-line-sidebar mb-20"></div>
                                <div class="related-list">
                                    @foreach($related_courses as $related)
                                        <a href="{{ route('course.details', $related->slug) }}" class="related-card-mini">
                                            <div class="mini-thumb">
                                                <img src="{{ asset($related->image ?? 'https://placehold.co/80x80') }}"
                                                    alt="{{ $related->title }}">
                                            </div>
                                            <div class="mini-content">
                                                <h5>{{ Str::limit($related->title, 45) }}</h5>
                                                <span><i class="fa fa-clock-o"></i> {{ $related->duration }}</span>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .rounded-20 {
            border-radius: 20px;
        }

        .course-details-section {
            background: #f4f7f9;
            padding: 80px 0;
        }

        .shadow-premium {
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.05);
        }

        .p-50 {
            padding: 50px;
        }

        .course-content-rich {
            padding: 50px;
        }

        .w-full {
            width: 100%;
            object-fit: cover;
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
            background: linear-gradient(135deg, rgba(27, 48, 92, 0.85), rgba(27, 48, 92, 0.7));
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
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            transition: 0.3s;
        }

        .breadcrumb-custom a:hover {
            color: #ff9600;
        }

        /* --- Main Content --- */
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
        }

        .learning-outcome-box {
            background: #f8fafc;
            padding: 40px;
            border-radius: 24px;
            border: 1px solid #e2e8f0;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.02);
        }

        .learning-outcome-box h4 {
            font-weight: 800;
            color: #1b305c;
            margin-bottom: 25px;
            font-size: 20px;
        }

        .benefit-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .benefit-list li {
            margin-bottom: 18px;
            font-weight: 600;
            color: #475569;
            display: flex;
            align-items: flex-start;
            gap: 15px;
            font-size: 15px;
        }

        .benefit-list li i {
            color: #ff9600;
            font-size: 20px;
            flex-shrink: 0;
        }

        /* --- Tabs Overhaul V2 --- */
        .nav-tabs-custom-v2 {
            display: flex;
            background: #f1f5f9;
            padding: 8px;
            border-radius: 16px;
            list-style: none;
            margin-bottom: 40px;
            border: none;
        }

        .nav-tabs-custom-v2 li {
            flex: 1;
        }

        .nav-tabs-custom-v2 li a {
            display: block;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none !important;
            border-radius: 12px;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            color: #64748b;
            font-weight: 700;
            border: none !important;
        }

        .nav-tabs-custom-v2 li.active a {
            background: #fff;
            color: #1b305c;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        }

        .tab-btn-content {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .tab-btn-content i {
            font-size: 20px;
            color: #ff9600;
            transition: 0.3s;
        }

        .nav-tabs-custom-v2 li.active .tab-btn-content i {
            transform: scale(1.1);
        }

        .nav-tabs-custom-v2 li a:hover:not(.active) {
            background: rgba(255, 255, 255, 0.5);
            color: #1b305c;
        }

        /* Animations */
        .animated-fast {
            animation-duration: 0.5s;
            animation-fill-mode: both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 20px, 0);
            }

            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        .fadeInUp {
            animation-name: fadeInUp;
        }

        .tab-pane {
            padding: 0 8px;
        }

        /* --- Sidebar & Widgets --- */
        .sidebar-info-card {
            background: #fff;
            border-radius: 20px;
            padding: 40px 30px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
        }

        .price-tag {
            text-align: center;
            padding-bottom: 30px;
            border-bottom: 1px solid #f1f5f9;
            margin-bottom: 30px;
        }

        .fee-label {
            display: block;
            font-size: 13px;
            color: #94a3b8;
            text-transform: uppercase;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .fee-value {
            display: block;
            font-size: 38px;
            font-weight: 900;
            color: #1b305c;
            margin-top: 5px;
        }

        .meta-info-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .meta-info-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px dashed #f1f5f9;
        }

        .meta-info-list li:last-child {
            border: none;
        }

        .meta-label {
            color: #64748b;
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .meta-label i {
            color: #ff9600;
            font-size: 16px;
            width: 20px;
            text-align: center;
        }

        .meta-value {
            color: #1b305c;
            font-weight: 800;
            font-size: 14px;
        }

        /* Mobile Tab Stacking */
        @media (max-width: 575px) {
            .nav-tabs-custom-v2 {
                flex-direction: column;
                padding: 10px;
            }

            .nav-tabs-custom-v2 li {
                width: 100%;
            }

            .nav-tabs-custom-v2 li a {
                padding: 12px;
            }

            .tab-btn-content span {
                font-size: 14px;
            }
        }

        .btn-enroll-premium {
            display: block;
            background: #1b305c;
            color: #fff !important;
            padding: 18px;
            text-align: center;
            border-radius: 50px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none !important;
            transition: 0.3s;
            box-shadow: 0 10px 20px rgba(27, 48, 92, 0.15);
            border: none;
        }

        .btn-enroll-premium:hover {
            background: #ff9600;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 150, 0, 0.3);
        }

        .sidebar-help-box {
            background: linear-gradient(135deg, #ff9600, #ffb347);
            padding: 40px 30px;
            border-radius: 20px;
            color: #fff;
            text-align: center;
        }

        .help-icon {
            font-size: 45px;
            margin-bottom: 20px;
            color: #fff;
            opacity: 0.9;
        }

        .sidebar-help-box h4 {
            font-weight: 800;
            font-size: 22px;
            margin-bottom: 12px;
            color: #fff;
        }

        .sidebar-help-box p {
            font-size: 15px;
            opacity: 0.9;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .contact-links a {
            color: #fff;
            font-weight: 900;
            font-size: 22px;
            text-decoration: none !important;
        }

        .sidebar-related-widget {
            background: #fff;
            border-radius: 20px;
            padding: 30px;
            border: 1px solid #e2e8f0;
        }

        .widget-title {
            font-size: 20px;
            font-weight: 800;
            color: #1b305c;
            margin-bottom: 10px;
        }

        .header-line-sidebar {
            width: 40px;
            height: 3px;
            background: #ff9600;
            border-radius: 2px;
        }

        .related-card-mini {
            display: flex;
            gap: 15px;
            align-items: center;
            text-decoration: none !important;
            margin-bottom: 20px;
            transition: 0.3s;
            padding: 10px;
            border-radius: 12px;
            border: 1px solid transparent;
        }

        .related-card-mini:hover {
            background: #f8fafc;
            transform: translateX(5px);
            border-color: #f1f5f9;
        }

        .mini-thumb {
            width: 75px;
            height: 75px;
            border-radius: 10px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .mini-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .mini-content h5 {
            margin: 0 0 5px;
            font-size: 14px;
            font-weight: 700;
            color: #1b305c;
            line-height: 1.4;
        }

        .mini-content span {
            font-size: 12px;
            color: #94a3b8;
            font-weight: 700;
        }

        .mini-content span i {
            color: #ff9600;
            margin-right: 5px;
        }

        /* Animation */
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

        @media (max-width: 991px) {
            .inner-banner h1 {
                font-size: 34px;
            }

            .course-content-rich {
                padding: 30px;
            }
        }
    </style>
@endsection