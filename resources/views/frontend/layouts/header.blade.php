<!-- ==============================================
    ** Header **
    =================================================== -->
<header>
    <!-- Start Header top Bar -->
    <div class="header-top">
        <div class="container clearfix">
            <div class="welcome-msg">
                Welcome to <strong>{{ get_setting('site_title', 'Step Up Master IT') }}</strong>
            </div>
            <div class="right-block clearfix">
                <ul class="follow-us">
                    <li><a href="{{ get_setting('twitter_url', '#') }}" target="_blank"><i class="fa fa-twitter"
                                aria-hidden="true"></i></a></li>
                    <li><a href="{{ get_setting('facebook_url', '#') }}" target="_blank"><i class="fa fa-facebook"
                                aria-hidden="true"></i></a></li>
                    <li><a href="{{ get_setting('linkedin_url', '#') }}" target="_blank"><i class="fa fa-linkedin"
                                aria-hidden="true"></i></a></li>
                    <li><a href="{{ get_setting('youtube_url', '#') }}" target="_blank"><i class="fa fa-youtube-play"
                                aria-hidden="true"></i></a></li>
                    <li><a href="{{ get_setting('instagram_url', '#') }}" target="_blank"><i class="fa fa-instagram"
                                aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Header top Bar -->
    <!-- Start Header Middle -->
    <div class="container header-middle">
        <div class="row flex-header">
            <div class="col-xs-12 col-sm-4 logo-column">
                <a href="{{ url('/') }}">
                    <img src="{{ get_logo() }}" class="img-responsive site-logo" alt="{{ get_setting('site_title') }}">
                </a>
            </div>
            <div class="col-xs-12 col-sm-8 contact-column">
                <div class="contact-wrapper">
                    <div class="contact-item hidden-xs">
                        <div class="icon-box">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="text-box">
                            <span class="contact-label">Address</span>
                            <span class="value">{{ get_setting('contact_address') }}</span>
                        </div>
                    </div>
                    <div class="contact-item hidden-xs">
                        <div class="icon-box">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <div class="text-box">
                            <span class="contact-label">Email</span>
                            <a href="mailto:{{ get_setting('contact_email') }}"
                                class="value">{{ get_setting('contact_email') }}</a>
                        </div>
                    </div>
                    <div class="contact-item hidden-xs">
                        <div class="icon-box">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="text-box">
                            <span class="contact-label">Toll Free</span>
                            <span class="value">{{ get_setting('contact_phone') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Middle -->

    <style>
        .header-middle {
            padding: 8px 0;
            background: #fff;
        }

        .flex-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .site-logo {
            max-height: 115px;
            width: auto;
            transition: transform 0.3s ease;
        }

        .site-logo:hover {
            transform: scale(1.05);
        }

        .contact-wrapper {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 25px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 12px;
            max-width: 250px;
        }

        .contact-item .icon-box {
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            background: #f8f9fa;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1b305c;
            font-size: 16px;
            border: 1px solid #edf2f7;
            transition: all 0.3s ease;
        }

        .contact-item:hover .icon-box {
            background: #1b305c;
            color: #fff;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(27, 48, 92, 0.2);
        }

        .contact-item .text-box {
            display: flex;
            flex-direction: column;
        }

        .contact-item .contact-label {
            display: block;
            font-size: 10px;
            text-transform: uppercase;
            color: #8a99a0;
            font-weight: 700;
            letter-spacing: 0.5px;
            line-height: 1.2;
            margin-bottom: 3px;
            padding: 0;
            background: none;
            border-radius: 0;
        }

        .contact-item .value {
            font-size: 14px;
            color: #2d3748;
            font-weight: 600;
            line-height: 1.3;
            text-decoration: none !important;
        }

        /* Mobile Adjustments */
        @media (max-width: 1199px) {
            .contact-wrapper {
                gap: 20px;
            }

            .contact-item {
                max-width: 200px;
            }
        }

        @media (max-width: 991px) {
            .contact-wrapper {
                gap: 15px;
            }

            .contact-item .value {
                font-size: 12px;
            }
        }

        @media (max-width: 767px) {
            .flex-header {
                flex-direction: column;
                text-align: center;
            }

            .logo-column {
                margin-bottom: 5px;
                width: 100%;
            }

            .contact-wrapper {
                flex-direction: column;
                justify-content: center;
                gap: 15px;
            }

            .contact-item {
                max-width: 100%;
                justify-content: center;
                text-align: left;
            }

            .site-logo {
                max-height: 105px;
                margin: 0 auto;
                padding: 5px 0;
            }
        }

        /* --- Header Top Refinements --- */
        .header-top {
            background: #162544;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .header-top .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        @media (max-width: 767px) {
            .header-top .container {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }

            .header-top .right-block .follow-us {
                justify-content: center;
            }
        }

        /* Override clearfix for flex layout */
        .header-top .container::before,
        .header-top .container::after {
            display: none;
        }

        .welcome-msg {
            color: rgba(255, 255, 255, 0.7);
            font-size: 13px;
            margin: 0;
            line-height: 1;
        }

        .welcome-msg strong {
            color: #ff9600;
        }

        .header-top .right-block .follow-us {
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 15px;
            line-height: 1;
        }

        .header-top .right-block .follow-us li {
            padding: 0;
            margin: 0;
            display: inline-flex;
            font-size: 16px;
        }

        .header-top .right-block .follow-us li a {
            color: rgba(255, 255, 255, 0.55);
            transition: color 0.3s ease;
        }

        .header-top .right-block .follow-us li a:hover {
            color: #ff9600;
        }

        /* --- Sticky Header --- */
        header.sticky {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 9999;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            animation: slideDown 0.4s ease-out;
            background: #fff;
        }

        header.sticky .header-top {
            display: none;
            /* Hide top bar on scroll for better space */
        }

        @keyframes slideDown {
            from {
                transform: translateY(-100%);
            }

            to {
                transform: translateY(0);
            }
        }

        /* Prevent content jump */
        body.sticky-active {
            padding-top: 180px;
            /* Approximate height of full header */
        }
    </style>

    <!-- Start Navigation -->
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse"
                    class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <div class="navbar-collapse collapse" id="navbar">

                <ul class="nav navbar-nav">
                    <li> <a href="{{ url('/') }}">Home</a></li>
                    <li> <a href="{{ route('about') }}">About</a></li>
                    <li class="dropdown"> <a data-toggle="dropdown" href="{{ route('courses') }}">Our Courses <i
                                class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('courses') }}">All Courses</a></li>
                            @php
                                $headerCategories = \App\Models\CourseCategory::where('status', 'active')->orderBy('name')->get();
                            @endphp
                            @foreach($headerCategories as $cat)
                                <li><a href="{{ route('category.courses', $cat->slug) }}">{{ $cat->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li> <a href="{{ route('services') }}">Services</a></li>
                    <li> <a href="{{ route('campus') }}">Campus</a></li>
                    <li> <a href="{{ route('gallery') }}">Gallery</a></li>
                    <li> <a href="{{ route('faq') }}">FAQ</a></li>
                    <li> <a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navigation -->
</header>

@push('scripts')
    <script>
        $(document).ready(function () {
            var $header = $('header');
            var threshold = 150; // Scroll distance before making sticky

            function updateSticky() {
                if ($(window).scrollTop() > threshold) {
                    $header.addClass('sticky');
                    $('body').addClass('sticky-active');
                } else {
                    $header.removeClass('sticky');
                    $('body').removeClass('sticky-active');
                }
            }

            $(window).on('scroll', updateSticky);
            updateSticky();
        });
    </script>
@endpush