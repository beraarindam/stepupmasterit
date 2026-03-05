@extends('frontend.layouts.master')
@section('title', isset($category) ? 'Courses in ' . $category->name : 'Our Courses')

@section('content')

    <!-- ==============================================
                                                            ** Inner Banner / Breadcrumb **
                                                            =================================================== -->
    <section class="inner-banner"
        style="background: url('{{ get_setting_image('courses_banner_image', 'https://placehold.co/1920x400?text=Our+Courses') }}') no-repeat center center / cover;">
        <div class="container">
            <div class="contents">
                <h1>{{ isset($category) ? $category->name : 'Professional Courses' }}</h1>
                <div class="banner-subheading-wrap">
                    <p>{{ isset($category) ? 'Explore our specialized training in ' . $category->name : 'Elevate your skills with our industry-leading certification programs.' }}
                    </p>
                </div>
                <ul class="breadcrumb-custom">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    @if(isset($category))
                        <li><a href="{{ route('courses') }}">Courses</a></li>
                        <li>{{ $category->name }}</li>
                    @else
                        <li>Courses</li>
                    @endif
                </ul>
            </div>
        </div>
    </section>

    <!-- ==============================================
                                                            ** Courses Page Section **
                                                            =================================================== -->
    <section class="courses-page-section padding-lg">
        <div class="container">
            <div class="row">
                <!-- Sidebar: Categories -->
                <div class="col-md-3">
                    <div class="course-sidebar-premium">
                        <div class="sidebar-widget">
                            <h4 class="widget-title">Categories</h4>
                            <ul class="cat-list-premium">
                                <li class="{{ !isset($category) ? 'active' : '' }}">
                                    <a href="{{ route('courses') }}">All Courses
                                        <span>({{ \App\Models\Course::where('status', 'active')->count() }})</span></a>
                                </li>
                                @foreach($categories as $cat)
                                    <li class="{{ (isset($category) && $category->id == $cat->id) ? 'active' : '' }}">
                                        <a href="{{ route('category.courses', $cat->slug) }}">
                                            {{ $cat->name }}
                                            <span>({{ $cat->courses()->where('status', 'active')->count() }})</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Special Offer / Promo -->
                        <div class="sidebar-promo-card">
                            <div class="promo-content">
                                <h3>Start Your Journey</h3>
                                <p>Get industry-ready with our expert-led programs.</p>
                                <a href="{{ route('contact') }}" class="btn-promo">Enquire Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content: Courses Grid -->
                <div class="col-md-9">
                    <div class="courses-toolbar mb-40 flex-header">
                        <div class="results-count">
                            Showing <span>{{ $courses->firstItem() ?? 0 }}-{{ $courses->lastItem() ?? 0 }}</span> of
                            {{ $courses->total() }} courses
                        </div>
                        <div class="filter-wrap">
                            @if(isset($category))
                                <div class="active-cat-badge">
                                    {{ $category->name }} <a href="{{ route('courses') }}"><i class="fa fa-times"></i></a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        @forelse($courses as $course)
                            <div class="col-md-6 col-sm-6 mb-40">
                                <div class="modern-course-card-v2">
                                    <div class="course-thumb">
                                        <img src="{{ $course->image ? asset($course->image) : 'https://placehold.co/600x400?text=Course+Image' }}"
                                            alt="{{ $course->title }}" class="img-responsive">
                                        <div class="course-tag">{{ $course->category->name ?? 'General' }}</div>
                                    </div>
                                    <div class="course-info-premium">
                                        <div class="course-meta">
                                            <span><i class="fa fa-clock-o"></i> Flexible Learning</span>
                                            <span><i class="fa fa-certificate"></i> Certified</span>
                                        </div>
                                        <h3>{{ $course->title }}</h3>
                                        <div class="course-desc">
                                            {!! Str::limit(strip_tags($course->description), 100) !!}
                                        </div>
                                        <div class="course-card-footer">
                                            <a href="{{ route('course.details', $course->slug) }}"
                                                class="btn-view-details">Course Details <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-xs-12 text-center">
                                <div class="empty-state-v2">
                                    <i class="fa fa-book fa-4x text-gray-200"></i>
                                    <h3>No courses found in this category.</h3>
                                    <a href="{{ route('courses') }}" class="btn-primary-custom mt-20">Browse All Courses</a>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-wrapper-premium text-center">
                        {{ $courses->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* --- Sidebar & Filters --- */
        .course-sidebar-premium {
            padding-right: 20px;
        }

        .sidebar-widget {
            background: #fff;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            border: 1px solid #f1f5f9;
        }

        .widget-title {
            font-size: 20px;
            font-weight: 800;
            color: #1b305c;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #ff9600;
            display: block;
        }

        .cat-list-premium {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .cat-list-premium li {
            margin-bottom: 8px;
        }

        .cat-list-premium li a {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 18px;
            background: #f8fafc;
            border-radius: 12px;
            color: #475569;
            font-weight: 600;
            text-decoration: none !important;
            transition: 0.3s;
            border: 1px solid transparent;
        }

        .cat-list-premium li span {
            font-size: 12px;
            background: #e2e8f0;
            padding: 2px 10px;
            border-radius: 50px;
            color: #64748b;
            transition: 0.3s;
        }

        .cat-list-premium li:hover a,
        .cat-list-premium li.active a {
            background: #1b305c;
            color: #fff;
            border-color: #1b305c;
        }

        .cat-list-premium li:hover span,
        .cat-list-premium li.active span {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        .sidebar-promo-card {
            background: linear-gradient(rgba(27, 48, 92, 0.9), rgba(27, 48, 92, 0.9)), url('https://placehold.co/400x500?text=Promo');
            background-size: cover;
            border-radius: 20px;
            padding: 40px 30px;
            color: #fff;
            text-align: center;
        }

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

        .promo-content h3 {
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .promo-content p {
            font-size: 15px;
            opacity: 0.9;
            margin-bottom: 25px;
        }

        .btn-promo {
            display: inline-block;
            background: #ff9600;
            color: #fff;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 700;
            text-decoration: none !important;
            transition: 0.3s;
        }

        .btn-promo:hover {
            background: #fff;
            color: #1b305c;
        }

        /* --- Toolbar --- */
        .courses-toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            padding: 20px 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.03);
            border: 1px solid #f1f5f9;
        }

        .results-count {
            color: #64748b;
            font-weight: 600;
        }

        .results-count span {
            color: #1b305c;
            font-weight: 800;
        }

        .active-cat-badge {
            background: #f0f7ff;
            color: #1b305c;
            padding: 8px 18px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 10px;
            border: 1px solid #dbeafe;
        }

        .active-cat-badge a {
            color: #ef4444;
            transition: 0.3s;
        }

        .active-cat-badge a:hover {
            transform: scale(1.2);
        }

        /* --- Modern Course Card V2 --- */
        .modern-course-card-v2 {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: 0.4s;
            height: 100%;
            display: flex;
            flex-direction: column;
            border: 1px solid #f1f5f9;
        }

        .modern-course-card-v2:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(27, 48, 92, 0.1);
        }

        .course-thumb {
            position: relative;
            height: 220px;
            overflow: hidden;
        }

        .course-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.6s;
        }

        .modern-course-card-v2:hover .course-thumb img {
            transform: scale(1.1);
        }

        .course-tag {
            position: absolute;
            top: 20px;
            left: 20px;
            background: #ff9600;
            color: #fff;
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 5px 15px rgba(255, 150, 0, 0.3);
        }

        .course-info-premium {
            padding: 30px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .course-meta {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }

        .course-meta span {
            font-size: 12px;
            color: #94a3b8;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .course-meta i {
            color: #ff9600;
        }

        .course-info-premium h3 {
            font-size: 22px;
            color: #1b305c;
            font-weight: 800;
            margin-bottom: 12px;
            line-height: 1.3;
        }

        .course-desc {
            font-size: 14px;
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 25px;
            flex-grow: 1;
        }

        .course-card-footer {
            padding-top: 20px;
            border-top: 1px solid #f1f5f9;
        }

        .btn-view-details {
            color: #1b305c;
            font-weight: 800;
            text-decoration: none !important;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: 0.3s;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
        }

        .btn-view-details:hover {
            color: #ff9600;
            padding-left: 5px;
        }

        /* --- Pagination Refinement --- */
        .pagination-wrapper-premium .pagination {
            display: inline-flex;
            gap: 8px;
            border: none;
            margin-top: 50px;
        }

        .pagination-wrapper-premium .pagination li a,
        .pagination-wrapper-premium .pagination li span {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px !important;
            border: 1px solid #e2e8f0;
            background: #fff;
            color: #1b305c;
            font-weight: 700;
            transition: 0.3s;
        }

        .pagination-wrapper-premium .pagination li.active span {
            background: #1b305c;
            color: #fff;
            border-color: #1b305c;
        }

        .pagination-wrapper-premium .pagination li:hover a {
            background: #ff9600;
            color: #fff;
            border-color: #ff9600;
        }

        .empty-state-v2 {
            padding: 80px 40px;
            background: #fff;
            border-radius: 30px;
            border: 2px dashed #e2e8f0;
        }

        .empty-state-v2 h3 {
            color: #94a3b8;
            margin-top: 20px;
        }
    </style>
@endsection