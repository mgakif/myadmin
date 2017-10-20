<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Porto - Responsive HTML5 Template 5.7.2</title>
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="Porto - Responsive HTML5 Template">
        <meta name="author" content="okler.net">
        <!-- Favicon -->
        <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="/img/apple-touch-icon.png">
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
        <!-- Vendor CSS -->
        <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/vendor/animate/animate.min.css">
        <link rel="stylesheet" href="/vendor/simple-line-icons/css/simple-line-icons.min.css">
        <link rel="stylesheet" href="/vendor/owl.carousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="/vendor/owl.carousel/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="/vendor/magnific-popup/magnific-popup.min.css">
        <!-- Theme CSS -->
        <link rel="stylesheet" href="/css/theme.css">
        <link rel="stylesheet" href="/css/theme-elements.css">
        <link rel="stylesheet" href="/css/theme-blog.css">
        <link rel="stylesheet" href="/css/theme-shop.css">
        <!-- Current Page CSS -->
        <link rel="stylesheet" href="/vendor/rs-plugin/css/settings.css">
        <link rel="stylesheet" href="/vendor/rs-plugin/css/layers.css">
        <link rel="stylesheet" href="/vendor/rs-plugin/css/navigation.css">
        <link rel="stylesheet" href="/vendor/circle-flip-slideshow/css/component.css">
        <!-- Skin CSS -->
        <link rel="stylesheet" href="/css/skins/default.css">
        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="/css/custom.css">
        <!-- Head Libs -->
        <script src="/vendor/modernizr/modernizr.min.js"></script>
    </head>
    <body>
        <div class="body">
            <header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 57, 'stickySetTop': '-57px', 'stickyChangeLogo': true}">
                <div class="header-body">
                    <div class="header-container container">
                        <div class="header-row">
                            <div class="header-column">
                                <div class="header-logo">
                                    <a href="/">
                                    <img alt="Porto" width="111" height="54" data-sticky-width="82" data-sticky-height="40" data-sticky-top="33" src="/img/logo.png">
                                    </a>
                                </div>
                            </div>
                            <div class="header-column">
                                <div class="header-row">
                                    <div class="header-search hidden-xs">
                                        <form id="searchForm" action="page-search-results.html" method="get">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="q" id="q" placeholder="Search..." required>
                                                <span class="input-group-btn">
                                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                    <nav class="header-nav-top">
                                        <ul class="nav nav-pills">
                                            <li class="hidden-xs">
                                                <a href="about-us.html"><i class="fa fa-angle-right"></i> About Us</a>
                                            </li>
                                            <li class="hidden-xs">
                                                <a href="contact-us.html"><i class="fa fa-angle-right"></i> Contact Us</a>
                                            </li>
                                            <li>
                                                <span class="ws-nowrap"><i class="fa fa-phone"></i> (123) 456-789</span>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="header-row">
                                    <div class="header-nav">
                                        <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
                                        <i class="fa fa-bars"></i>
                                        </button>
                                        <ul class="header-social-icons social-icons hidden-xs">
                                            <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                            <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                            <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                        <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
                                            <nav>
                                                <ul class="nav nav-pills" id="mainNav">
                                                    @foreach ($context['parent_pages'] as $page)
                                                    @if (array_key_exists($page->id, $context['pages']) and count($context['pages'][$page->id]) > 0)
                                                    <li class="dropdown">
                                                        <a lang="tr" class="dropdown-toggle" href="{{ $page->get_absolute_url() }}">
                                                            <div>{{ $page->name }}</div>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            @foreach ($context['pages'][$page->id] as $sub_page)
                                                            <li class="">
                                                                <a lang="tr" href="{{ $sub_page->get_absolute_url() }}">
                                                                    <div>{{ $sub_page->name }}</div>
                                                                </a>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                    @else
                                                    <li>
                                                        <a lang="tr" href="{{ $page->get_absolute_url() }}">
                                                            <div>{{ $page->name }}</div>
                                                        </a>
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            @yield('content')
        </div>
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-ribbon">
                        <span>Get in Touch</span>
                    </div>
                    <div class="col-md-3">
                        <div class="newsletter">
                            <h4>Newsletter</h4>
                            <p>Keep up on our always evolving product features and technology. Enter your e-mail and subscribe to our newsletter.</p>
                            <div class="alert alert-success hidden" id="newsletterSuccess">
                                <strong>Success!</strong> You've been added to our email list.
                            </div>
                            <div class="alert alert-danger hidden" id="newsletterError"></div>
                            <form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST">
                                <div class="input-group">
                                    <input class="form-control" placeholder="Email Address" name="newsletterEmail" id="newsletterEmail" type="text">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">Go!</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h4>Latest Tweets</h4>
                        <div id="tweet" class="twitter" data-plugin-tweets data-plugin-options="{'username': '', 'count': 2}">
                            <p>Please wait...</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-details">
                            <h4>Contact Us</h4>
                            <ul class="contact">
                                <li>
                                    <p><i class="fa fa-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name, United States</p>
                                </li>
                                <li>
                                    <p><i class="fa fa-phone"></i> <strong>Phone:</strong> (123) 456-789</p>
                                </li>
                                <li>
                                    <p><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h4>Follow Us</h4>
                        <ul class="social-icons">
                            <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-1">
                            <a href="/" class="logo">
                            <img alt="Porto Website Template" class="img-responsive" src="img/logo-footer.png">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <p>© Copyright 2017. All Rights Reserved.</p>
                        </div>
                        <div class="col-md-4">
                            <nav id="sub-menu">
                                <ul>
                                    <li><a href="page-faq.html">FAQ's</a></li>
                                    <li><a href="sitemap.html">Sitemap</a></li>
                                    <li><a href="contact-us.html">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        </div>
        <!-- Vendor -->
        <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/jquery.appear/jquery.appear.min.js"></script>
        <script src="/vendor/jquery.easing/jquery.easing.min.js"></script>
        <script src="/vendor/jquery-cookie/jquery-cookie.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="/vendor/common/common.min.js"></script>
        <script src="/vendor/jquery.validation/jquery.validation.min.js"></script>
        <script src="/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
        <script src="/vendor/jquery.gmap/jquery.gmap.min.js"></script>
        <script src="/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
        <script src="/vendor/isotope/jquery.isotope.min.js"></script>
        <script src="/vendor/owl.carousel/owl.carousel.min.js"></script>
        <script src="/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
        <script src="/vendor/vide/vide.min.js"></script>
        <!-- Theme Base, Components and Settings -->
        <script src="js/theme.js"></script>
        <!-- Current Page Vendor and Views -->
        <script src="/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script src="/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
        <script src="/vendor/circle-flip-slideshow/js/jquery.flipshow.min.js"></script>
        <script src="/js/views/view.home.js"></script>
        <!-- Theme Custom -->
        <script src="/js/custom.js"></script>
        <!-- Theme Initialization Files -->
        <script src="/js/theme.init.js"></script>
        <!-- Examples -->
        <script src="/js/examples/examples.demos.js"></script>
        @yield('javascript')
        <!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
            <script>
            	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            
            	ga('create', 'UA-12345678-1', 'auto');
            	ga('send', 'pageview');
            </script>
             -->
    </body>
</html>