@extends('frontend.layouts.master')
@section('title', 'Terms and Conditions')

@section('meta_title', get_setting('terms_meta_title', get_setting('site_title')))
@section('meta_description', get_setting('terms_meta_description', get_setting('site_description')))
@section('meta_keywords', get_setting('terms_meta_keywords', get_setting('site_keywords')))
@section('content')

    <!-- ==============================================
            ** Inner Banner / Breadcrumb **
            =================================================== -->
    <section class="inner-banner"
        style="background: url('{{ get_setting_image('terms_banner_image', 'https://placehold.co/1920x400?text=Terms+and+Conditions') }}') no-repeat center center / cover;">
        <div class="container">
            <div class="contents">
                <h1>{{ get_setting('terms_banner_heading', 'Terms & Conditions') }}</h1>
                <div class="banner-subheading-wrap">
                    <p>{{ get_setting('terms_banner_subheading', 'Please read these terms carefully before using our services.') }}
                    </p>
                </div>
                <ul class="breadcrumb-custom">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Terms & Conditions</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- ==============================================
            ** Terms Content Section **
            =================================================== -->
    <section class="legal-content-section padding-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="legal-card">
                        <div class="last-updated">Effective Date: March 2026</div>

                        <div class="legal-text">
                            @if(get_setting('terms_content'))
                                {!! get_setting('terms_content') !!}
                            @else
                                <h3>1. Agreement to Terms</h3>
                                <p>By accessing our website and using our services, you agree to be bound by these Terms and
                                    Conditions. If you disagree with any part of these terms, you may not access the service.
                                </p>

                                <h3>2. Intellectual Property</h3>
                                <p>The Service and its original content, features, and functionality are and will remain the
                                    exclusive property of Step Up Master IT and its licensors. Our trademarks and trade dress
                                    may not be used in connection with any product or service without the prior written consent
                                    of Step Up Master IT.</p>

                                <h3>3. User Accounts</h3>
                                <p>When you create an account with us, you must provide us information that is accurate,
                                    complete, and current at all times. Failure to do so constitutes a breach of the Terms,
                                    which may result in immediate termination of your account on our Service.</p>

                                <h3>4. Termination</h3>
                                <p>We may terminate or suspend your account immediately, without prior notice or liability, for
                                    any reason whatsoever, including without limitation if you breach the Terms.</p>

                                <h3>5. Limitation of Liability</h3>
                                <p>In no event shall Step Up Master IT, nor its directors, employees, partners, agents,
                                    suppliers, or affiliates, be liable for any indirect, incidental, special, consequential or
                                    punitive damages, including without limitation, loss of profits, data, use, goodwill, or
                                    other intangible losses.</p>

                                <h3>6. Governing Law</h3>
                                <p>These Terms shall be governed and construed in accordance with the laws of the country,
                                    without regard to its conflict of law provisions.</p>

                                <h3>7. Changes to Terms</h3>
                                <p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time.
                                    If a revision is material we will try to provide at least 30 days notice prior to any new
                                    terms taking effect.</p>

                                <h3>8. Contact Us</h3>
                                <p>If you have any questions about these Terms, please contact us at
                                    <strong>hr@stepupmasterit.com</strong>.</p>
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

        @media (max-width: 767px) {
            .legal-card {
                padding: 40px 25px;
            }
        }
    </style>

@endsection