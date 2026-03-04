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
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <a href="{{ url('/') }}">
                    <img src="{{ get_logo() }}" class="img-responsive site-logo" alt="{{ get_setting('site_title') }}">
                </a>
            </div>
            <div class="col-xs-12 col-sm-8">
                <div class="contact clearfix">
                    <ul class="hidden-xs">
                        <li> <span>Email</span> <a
                                href="mailto:{{ get_setting('contact_email') }}">{{ get_setting('contact_email') }}</a>
                        </li>
                        <li> <span>Toll Free</span> {{ get_setting('contact_phone') }} </li>
                    </ul>
                    <a href="#" class="login">Student Login <span class="icon-more-icon"></span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Middle -->
    <!-- Start Navigation -->
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse"
                    class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <form class="navbar-form navbar-right">
                    <input type="text" placeholder="Search Now" class="form-control">
                    <button class="search-btn"><span class="icon-search-icon"></span></button>
                </form>
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