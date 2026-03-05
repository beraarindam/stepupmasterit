@extends('frontend.layouts.master')
@section('title', 'Privacy Policy')

@section('meta_title', get_setting('privacy_meta_title', get_setting('site_title')))
@section('meta_description', get_setting('privacy_meta_description', get_setting('site_description')))
@section('meta_keywords', get_setting('privacy_meta_keywords', get_setting('site_keywords')))
@section('content')

    <!-- ==============================================
                    ** Inner Banner / Breadcrumb **
                    =================================================== -->
    <section class="inner-banner"
        style="background: url('{{ get_setting_image('privacy_banner_image', 'https://placehold.co/1920x400?text=Privacy+Policy') }}') no-repeat center center / cover;">
        <div class="container">
            <div class="contents">
                <h1>{{ get_setting('privacy_banner_heading', 'Privacy Policy') }}</h1>
                <div class="banner-subheading-wrap">
                    <p>{{ get_setting('privacy_banner_subheading', 'Your privacy and data security are our top priorities.') }}
                    </p>
                </div>
                <ul class="breadcrumb-custom">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Privacy Policy</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- ==============================================
                    ** Privacy Content Section **
                    =================================================== -->
    <section class="legal-content-section padding-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="legal-card">
                        <div class="last-updated">Last Updated: March 2026</div>

                        <div class="legal-text">
                            @if(get_setting('privacy_content'))
                                {!! get_setting('privacy_content') !!}
                            @else
                                <h3>1. Introduction</h3>
                                <p>Welcome to Step Up Master IT. We value your privacy and are committed to protecting your
                                    personal data. This privacy policy informs you how we look after your personal data when you
                                    visit our website and tells you about your privacy rights.</p>

                                <h3>2. Data We Collect</h3>
                                <p>We may collect, use, store and transfer different kinds of personal data about you which we
                                    have grouped together as follows:</p>
                                <ul>
                                    <li><strong>Identity Data:</strong> includes first name, last name, username or similar
                                        identifier.</li>
                                    <li><strong>Contact Data:</strong> includes email address and telephone numbers.</li>
                                    <li><strong>Technical Data:</strong> includes internet protocol (IP) address, your login
                                        data, browser type and version.</li>
                                </ul>

                                <h3>3. How We Use Your Data</h3>
                                <p>We will only use your personal data when the law allows us to. Most commonly, we will use
                                    your personal data in the following circumstances:</p>
                                <ul>
                                    <li>Where we need to perform the contract we are about to enter into or have entered into
                                        with you.</li>
                                    <li>Where it is necessary for our legitimate interests.</li>
                                    <li>Where we need to comply with a legal obligation.</li>
                                </ul>

                                <h3>4. Data Security</h3>
                                <p>We have put in place appropriate security measures to prevent your personal data from being
                                    accidentally lost, used or accessed in an unauthorized way, altered or disclosed. In
                                    addition, we limit access to your personal data to those employees, agents, contractors and
                                    other third parties who have a business need to know.</p>

                                <h3>5. Your Legal Rights</h3>
                                <p>Under certain circumstances, you have rights under data protection laws in relation to your
                                    personal data, including the right to request access, correction, erasure, restriction,
                                    transfer, or to object to processing.</p>

                                <h3>6. Contact Us</h3>
                                <p>If you have any questions about this privacy policy or our privacy practices, please contact
                                    us at <strong>hr@stepupmasterit.com</strong>.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* --- Shared Inner Banner --- */
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

        /* --- Legal Content Styles --- */
        .legal-content-section {
            background: #f8fafc;
        }

        .legal-card {
            background: #fff;
            padding: 60px;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.05);
            border: 1px solid #edf2f7;
        }

        .last-updated {
            font-size: 13px;
            color: #ff9600;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f1f5f9;
            display: inline-block;
        }

        .legal-text h3 {
            font-size: 22px;
            font-weight: 800;
            color: #1b305c;
            margin: 40px 0 20px;
        }

        .legal-text h3:first-child {
            margin-top: 0;
        }

        .legal-text p {
            font-size: 16px;
            line-height: 1.8;
            color: #4a5568;
            margin-bottom: 20px;
        }

        .legal-text ul {
            margin-bottom: 25px;
            padding-left: 20px;
        }

        .legal-text ul li {
            font-size: 15px;
            color: #4a5568;
            margin-bottom: 12px;
            position: relative;
            list-style: none;
            padding-left: 25px;
        }

        .legal-text ul li i,
        .legal-text ul li::before {
            content: '\f058';
            font-family: 'FontAwesome';
            position: absolute;
            left: 0;
            color: #ff9600;
            font-size: 16px;
        }

        @media (max-width: 767px) {
            .legal-card {
                padding: 40px 25px;
            }

            .inner-banner h1 {
                font-size: 32px;
            }
        }
    </style>

@endsection