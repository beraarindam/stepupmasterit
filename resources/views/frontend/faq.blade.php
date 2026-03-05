@extends('frontend.layouts.master')
@section('title', 'Frequently Asked Questions')

@section('meta_title', get_setting('faq_meta_title', get_setting('site_title')))
@section('meta_description', get_setting('faq_meta_description', get_setting('site_description')))
@section('meta_keywords', get_setting('faq_meta_keywords', get_setting('site_keywords')))

@section('content')

    <!-- ==============================================
                    ** Inner Banner / Breadcrumb **
                    =================================================== -->
    <section class="inner-banner"
        style="background: url('{{ get_setting_image('faq_banner_image', 'https://placehold.co/1920x400?text=Frequently+Asked+Questions') }}') no-repeat center center / cover;">
        <div class="container">
            <div class="contents">
                <h1>{{ get_setting('faq_banner_heading', 'Frequently Asked Questions') }}</h1>
                <div class="banner-subheading-wrap">
                    <p>{{ get_setting('faq_banner_subheading', 'Find answers to common questions about our programs and success.') }}
                    </p>
                </div>
                <ul class="breadcrumb-custom">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>FAQ</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- ==============================================
                    ** FAQ Section **
                    =================================================== -->
    <section class="faq-section padding-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="section-header text-center mb-50">
                        <span class="sub-badge">Got Questions?</span>
                        <h2>{!! get_setting('faq_section_heading', 'We Have <span>Answers</span>') !!}</h2>
                        <div class="header-line"></div>
                        <p>{{ get_setting('faq_section_subheading', 'Most common questions about our platform and how we can help you accelerate your IT career.') }}
                        </p>
                    </div>

                    <div class="faq-accordion" id="accordion">
                        @forelse($faqs as $index => $faq)
                            <div class="faq-item {{ $index == 0 ? 'active' : '' }}">
                                <div class="faq-header" id="heading{{ $faq->id }}" data-toggle="collapse"
                                    data-target="#collapse{{ $faq->id }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                    aria-controls="collapse{{ $faq->id }}">
                                    <span class="faq-number">{{ sprintf('%02d', $index + 1) }}</span>
                                    <h3>{{ $faq->question }}</h3>
                                    <span class="faq-icon"><i class="fa {{ $index == 0 ? 'fa-minus' : 'fa-plus' }}"></i></span>
                                </div>

                                <div id="collapse{{ $faq->id }}" class="collapse {{ $index == 0 ? 'in' : '' }}"
                                    aria-labelledby="heading{{ $faq->id }}" data-parent="#accordion">
                                    <div class="faq-body">
                                        <div class="faq-content">
                                            {!! $faq->answer !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center no-faqs">
                                <i class="fa fa-question-circle-o"
                                    style="font-size: 64px; color: #cbd5e0; margin-bottom: 20px; display: block;"></i>
                                <p style="color: #718096; font-size: 18px;">No questions found at the moment. Please check back
                                    later.</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Contact Support Prompt -->
                    <div class="support-card mt-60 text-center animated fadeInUp">
                        <div class="support-icon-wrap">
                            <i class="fa fa-headphones"></i>
                        </div>
                        <h3>Still have questions?</h3>
                        <p>If you can't find an answer in our FAQ, you can always contact our support team.</p>
                        <a href="{{ route('contact') }}" class="btn-primary-custom">Contact Support</a>
                    </div>
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

        .section-header h2 {
            font-size: 42px;
            color: #1b305c;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .section-header h2 span {
            color: #ff9600;
        }

        .header-line {
            width: 80px;
            height: 4px;
            background: #ff9600;
            margin: 0 auto 25px;
            border-radius: 2px;
        }

        /* --- FAQ Accordion Settings --- */
        .faq-section {
            background-color: #fbfcfe;
        }

        .faq-accordion {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .faq-item {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #edf2f7;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .faq-item.active {
            border-color: #ff9600;
            box-shadow: 0 10px 20px rgba(255, 150, 0, 0.08);
        }

        .faq-header {
            padding: 22px 30px;
            display: flex;
            align-items: center;
            cursor: pointer;
            position: relative;
            background: #fff;
            transition: 0.3s;
        }

        .faq-header:hover {
            background: #fcfcfc;
        }

        .faq-number {
            font-size: 14px;
            font-weight: 800;
            color: #ff9600;
            margin-right: 20px;
            background: #fff8f0;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            flex-shrink: 0;
        }

        .faq-header h3 {
            font-size: 17px;
            font-weight: 700;
            color: #1b305c;
            margin: 0;
            flex: 1;
            padding-right: 20px;
            line-height: 1.5;
        }

        .faq-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1b305c;
            font-size: 12px;
            transition: all 0.3s ease;
        }

        .faq-item.active .faq-icon {
            background: #1b305c;
            color: #fff;
            transform: rotate(180deg);
        }

        .faq-body {
            background: #fff;
            padding: 0 30px 25px 86px;
        }

        .faq-content {
            font-size: 15px;
            line-height: 1.7;
            color: #4a5568;
            border-top: 1px solid #f1f5f9;
            padding-top: 15px;
        }

        /* Support Card */
        .support-card {
            background: #fff;
            border-radius: 20px;
            padding: 50px 30px;
            border: 1px dashed #cbd5e0;
            position: relative;
            margin-top: 80px;
        }

        .support-icon-wrap {
            width: 70px;
            height: 70px;
            background: #1b305c;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            margin: -85px auto 25px;
            box-shadow: 0 10px 20px rgba(27, 48, 92, 0.2);
            border: 5px solid #fbfcfe;
        }

        .support-card h3 {
            font-size: 24px;
            font-weight: 800;
            color: #1b305c;
            margin-bottom: 12px;
        }

        .support-card p {
            font-size: 16px;
            color: #718096;
            margin-bottom: 30px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Animation */
        .faq-item .collapse {
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        /* Mobile specific */
        @media (max-width: 767px) {
            .faq-header {
                padding: 15px 20px;
            }

            .faq-body {
                padding: 0 20px 20px 20px;
            }

            .faq-number {
                display: none;
            }

            .faq-header h3 {
                font-size: 15px;
            }
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
            color: #fff !important;
        }
    </style>

    @push('scripts')
        <script>
            $(document).ready(function () {
                $('.faq-header').on('click', function () {
                    var $parent = $(this).closest('.faq-item');
                    $('.faq-item').not($parent).removeClass('active');
                    $('.faq-item').not($parent).find('.faq-icon i').removeClass('fa-minus').addClass('fa-plus');

                    $parent.toggleClass('active');
                    if ($parent.hasClass('active')) {
                        $(this).find('.faq-icon i').removeClass('fa-plus').addClass('fa-minus');
                    } else {
                        $(this).find('.faq-icon i').removeClass('fa-minus').addClass('fa-plus');
                    }
                });
            });
        </script>
    @endpush

@endsection