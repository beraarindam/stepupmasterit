<!-- ==============================================
    ** Header **
    =================================================== -->
<header>
    <!-- Start Header top Bar -->
    <div class="header-top">
        <div class="container clearfix">
            <ul class="follow-us hidden-xs">
                <li><a href="{{ get_setting('twitter_url', '#') }}" target="_blank"><i class="fa fa-twitter"
                            aria-hidden="true"></i></a></li>
                <li><a href="{{ get_setting('facebook_url', '#') }}" target="_blank"><i class="fa fa-facebook-official"
                            aria-hidden="true"></i></a></li>
                <li><a href="{{ get_setting('linkedin_url', '#') }}" target="_blank"><i class="fa fa-linkedin"
                            aria-hidden="true"></i></a></li>
                <li><a href="{{ get_setting('youtube_url', '#') }}" target="_blank"><i class="fa fa-youtube-play"
                            aria-hidden="true"></i></a></li>
                <li><a href="{{ get_setting('instagram_url', '#') }}" target="_blank"><i class="fa fa-instagram"
                            aria-hidden="true"></i></a></li>
            </ul>
            <div class="right-block clearfix">
                <ul class="top-nav hidden-xs">
                    <li><a href="#">Register</a></li>
                    <li><a href="#">Apply Online</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">FAQs</a></li>
                </ul>
                <div class="lang-wrapper">
                    <div class="select-lang">
                        <select id="currency_select">
                            <option value="usd">USD</option>
                            <option value="aud">AUD</option>
                            <option value="gbp">GBP</option>
                        </select>
                    </div>
                    <div class="select-lang2">
                        <select class="custom_select">
                            <option value="en">English</option>
                            <option value="fr">French</option>
                            <option value="de">German</option>
                        </select>
                    </div>
                </div>
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
            padding: 18px 0;
            background: #fff;
        }

        .flex-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .site-logo {
            max-height: 95px;
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
            gap: 35px;
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
                margin-bottom: 25px;
            }

            .contact-wrapper {
                flex-direction: column;
                justify-content: center;
                gap: 15px;
            }

            .contact-item {
                max-width: 100%;
                text-align: left;
            }

            .site-logo {
                max-height: 75px;
                margin: 0 auto;
            }
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
                    <li> <a href="#">About</a></li>
                    <li class="dropdown"> <a data-toggle="dropdown" href="#">Our Courses <i class="fa fa-angle-down"
                                aria-hidden="true"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Course Listing</a></li>
                            <li><a href="#">MBA Marketing</a></li>
                            <li><a href="#">MBA General</a></li>
                            <li><a href="#">MBA Operations</a></li>
                        </ul>
                    </li>
                    <li> <a href="#">Gallery</a></li>
                    <li class="dropdown"> <a data-toggle="dropdown" href="#">Pages <i class="fa fa-angle-down"
                                aria-hidden="true"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Latest News</a></li>
                            <li><a href="#">Testimonials</a></li>
                            <li><a href="#">Coming Soon</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms of Use</a></li>
                        </ul>
                    </li>
                    <li> <a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navigation -->
</header>