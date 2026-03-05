@extends('frontend.layouts.master')
@section('title', 'Gallery')

@section('meta_title', get_setting('gallery_meta_title', get_setting('site_title')))
@section('meta_description', get_setting('gallery_meta_description', get_setting('site_description')))
@section('meta_keywords', get_setting('gallery_meta_keywords', get_setting('site_keywords')))
@section('content')

    <!-- ==============================================
                ** Inner Banner / Breadcrumb **
                =================================================== -->
    <section class="inner-banner"
        style="background: url('{{ get_setting_image('gallery_banner_image', 'https://placehold.co/1920x400?text=Our+Gallery') }}') no-repeat center center / cover;">
        <div class="container">
            <div class="contents">
                <h1>{{ get_setting('gallery_banner_heading', 'Our Gallery') }}</h1>
                <div class="banner-subheading-wrap">
                    <p>{{ get_setting('gallery_banner_subheading', 'Moments of success and learning at Step Up Master IT.') }}
                    </p>
                </div>
                <ul class="breadcrumb-custom">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Gallery</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- ==============================================
                ** Gallery Section **
                =================================================== -->
    <section class="gallery-section padding-lg">
        <div class="container">
            <div class="section-header text-center mb-60">
                <span class="sub-badge">Captured Moments</span>
                <h2>{!! get_setting('gallery_section_heading', 'Glimpse of <span>Our Campus Life</span>') !!}</h2>
                <div class="header-line"></div>
                <p>{{ get_setting('gallery_section_subheading', 'Explore the vibrant atmosphere, modern classrooms, and successful student projects that define our institution.') }}</p>
            </div>

            <div class="row gallery-grid">
                @forelse($galleries as $gallery)
                    <div class="col-md-4 col-sm-6 mb-30">
                        <div class="gallery-item-wrap">
                            <div class="gallery-img">
                                <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title }}" class="img-responsive">
                                <div class="gallery-overlay">
                                    <div class="overlay-content">
                                        <a href="{{ asset($gallery->image) }}" class="zoom-btn gallery-popup"
                                            title="{{ $gallery->title }}">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                        <h3>{{ $gallery->title }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-sm-12 text-center">
                        <div class="empty-state">
                            <i class="fa fa-picture-o"></i>
                            <p>Our gallery is being updated. Please check back later.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <style>
        /* --- Inner Banner Styles (Same as other pages) --- */
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

        /* Suppress theme watermarks */
        .inner-banner h1::before,
        .inner-banner h1::after,
        .inner-banner .contents::before,
        .inner-banner .contents::after,
        .inner-banner .container::before,
        .inner-banner .container::after {
            display: none !important;
            content: none !important;
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

        /* --- Gallery Styles --- */
        .gallery-section {
            background: #fbfcfe;
        }

        .gallery-grid {
            margin-top: 40px;
        }

        .gallery-item-wrap {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
            background: #fff;
            transition: all 0.4s ease;
        }

        .gallery-item-wrap:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.1);
        }

        .gallery-img {
            position: relative;
            line-height: 0;
        }

        .gallery-img img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            transition: all 0.5s ease;
        }

        .gallery-item-wrap:hover .gallery-img img {
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(27, 48, 92, 0.85);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.4s ease;
        }

        .gallery-item-wrap:hover .gallery-overlay {
            opacity: 1;
        }

        .overlay-content {
            text-align: center;
            color: #fff;
            padding: 20px;
            transform: translateY(20px);
            transition: all 0.4s ease 0.1s;
        }

        .gallery-item-wrap:hover .overlay-content {
            transform: translateY(0);
        }

        .zoom-btn {
            width: 50px;
            height: 50px;
            background: #ff9600;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            margin: 0 auto 15px;
            transition: 0.3s;
        }

        .zoom-btn:hover {
            background: #fff;
            color: #ff9600;
        }

        .overlay-content h3 {
            font-size: 18px;
            font-weight: 700;
            margin: 0;
            color: #fff;
        }

        .empty-state {
            padding: 100px 0;
            color: #a0aec0;
        }

        .empty-state i {
            font-size: 64px;
            margin-bottom: 20px;
        }

        .empty-state p {
            font-size: 18px;
        }
    </style>

    @push('scripts')
        <script>
            $(document).ready(function () {
                $('.gallery-grid').magnificPopup({
                    delegate: '.gallery-popup',
                    type: 'image',
                    gallery: {
                        enabled: true
                    }
                });
            });
        </script>
    @endpush

@endsection