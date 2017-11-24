<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html lang="{{ app()->getLocale() }}"> <!--<![endif]-->
<head>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Page Title -->
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="keywords" content="Travel, World, Language, Tour" />
    <meta name="description" content="Albatroz - Travel and Language">
    <meta name="author" content="Albatroz - Travel and Language">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    
    <!-- Theme Styles -->
    <link rel="stylesheet" href="{{ asset('app/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app/css/font-awesome.min.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('app/css/animate.min.css') }}">
    
    <!-- Current Page Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('app/components/revolution_slider/css/settings.css') }}" media="screen" />
    <!-- RS5.0 Layers and Navigation Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('app/components/revolution_slider/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/components/revolution_slider/css/navigation.css') }}"> 

    <link rel="stylesheet" type="text/css" href="{{ asset('app/components/revolution_slider/css/style.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('app/components/jquery.bxslider/jquery.bxslider.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('app/components/flexslider/flexslider.css') }}" media="screen" />
    
    <!-- Main Style -->
    <link id="main-style" rel="stylesheet" href="{{ asset('app/css/style.css') }}">
    
    <!-- Updated Styles -->
    <link rel="stylesheet" href="{{ asset('app/css/updates.css') }}">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('app/css/custom.css') }}">
    
    <!-- Responsive Styles -->
    <link rel="stylesheet" href="{{ asset('app/css/responsive.css') }}">

    

    
    <!-- CSS for IE -->
    <!--[if lte IE 9]>
        <link rel="stylesheet" type="text/css" href="css/ie.css" />
    <![endif]-->
    
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->

    <!-- Javascript Page Loader -->
    {{-- <script type="text/javascript" src="{{ asset('app/js/pace.min.js') }}" data-pace-options='{ "ajax": false }'></script>
    <script type="text/javascript" src="{{ asset('app/js/page-loading.js') }}"></script> --}}
</head>
<body>
    <div id="page-wrapper">

        @include('layouts.menu')
        @yield('slideshow')

        @yield('breadcrumb')

               

        <section id="content">

            <div class="container">
                @yield('content')
            </div>
        </section>
        

        <footer id="footer">
            <div class="footer-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <h2>Discover</h2>
                            <ul class="discover triangle hover row">
                                <li class="col-xs-6"><a href="#">Safety</a></li>
                                <li class="col-xs-6"><a href="#">About</a></li>
                                <li class="col-xs-6"><a href="#">Albatroz Picks</a></li>
                                <li class="col-xs-6"><a href="#">Latest Jobs</a></li>
                                <li class="active col-xs-6"><a href="#">Mobile</a></li>
                                <li class="col-xs-6"><a href="#">Press Releases</a></li>
                                <li class="col-xs-6"><a href="#">Why Host</a></li>
                                <li class="col-xs-6"><a href="#">Blog Posts</a></li>
                                <li class="col-xs-6"><a href="#">Social Connect</a></li>
                                <li class="col-xs-6"><a href="#">Help Topics</a></li>
                                <li class="col-xs-6"><a href="#">Site Map</a></li>
                                <li class="col-xs-6"><a href="#">Policies</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <h2>Travel News</h2>
                            <ul class="travel-news">
                                @inject('posts', 'App\Models\BlogPost')
                                @foreach($posts->latest()->take(2)->get() as $post)
                                <li>
                                    <div class="thumb">
                                        <a href="{{ route('site.blog.post.show',[$post->id,$post->slug]) }}" title="">
                                            <div class="cover" style="background-image: url('{{ $post->cover }}'); width: 60px;height: 60px;background-size: cover;background-position: center center";></div>
                                        </a>
                                    </div>
                                    <div class="description">
                                        <h5 class="s-title"><a href="#">{{ $post->title }}</a></h5>
                                        <span class="date">{{ $post->created_at->format('d M, Y') }}</span>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <h2>Mailing List</h2>
                            <p>Sign up for our mailing list to get latest updates and offers.</p>
                            <br />
                            <div class="icon-check">
                                <input type="text" class="input-text full-width" placeholder="your email" />
                            </div>
                            <br />
                            <span>We respect your privacy</span>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <h2>About Albatroz</h2>
                            <p>Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massaidp nequetiam lore elerisque.</p>
                            <br />
                            <address class="contact-details">
                                <span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span>
                                <br />
                                <a href="#" class="contact-email">help@albatroz.com</a>
                            </address>
                            <ul class="social-icons clearfix">
                                <li class="youtube"><a title="Youtube" href="#" data-toggle="tooltip"><i class="soap-icon-youtube"></i></a></li>
                                <li class="facebook"><a title="Facebook" href="#" data-toggle="tooltip"><i class="soap-icon-facebook"></i></a></li>
                                <li class="linkedin"><a title="Linkedin" href="#" data-toggle="tooltip"><i class="soap-icon-linkedin"></i></a></li>
                                <li class="googleplus"><a title="Google Plus" href="#" data-toggle="tooltip"><i class="soap-icon-googleplus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom gray-area">
                <div class="container">
                    <div class="logo pull-left">
                        <a href="index.html" title="Albatroz - home">
                            <img src="{{ asset('app/images/logo.png') }}" width="150" alt="Albatroz - Language & Travel" />
                        </a>
                    </div>
                    <div class="pull-right">
                        <a id="back-to-top" href="#" class="animated" data-animation-type="bounce"><i class="soap-icon-longarrow-up circle"></i></a>
                    </div>
                    <div class="copyright pull-right">
                        <p>&copy; {{ Carbon::now()->year }} Albatroz</p>
                    </div>
                </div>
            </div>
        </footer>

    </div>

<!-- Javascript -->
<script type="text/javascript" src="{{ asset('app/js/jquery-1.11.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/jquery.noconflict.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/modernizr.2.7.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/jquery-migrate-1.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/jquery.placeholder.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/jquery-ui.1.10.4.min.js') }}"></script>
    
<!-- Twitter Bootstrap -->
<script type="text/javascript" src="{{ asset('app/js/bootstrap.js') }}"></script>
    
<!-- load revolution slider scripts -->
<script type="text/javascript" src="{{ asset('app/components/revolution_slider/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/components/revolution_slider/js/jquery.themepunch.revolution.min.js') }}"></script>

<!-- Flex Slider -->
<script type="text/javascript" src="{{ asset('app/components/flexslider/jquery.flexslider-min.js') }}"></script>
    
<!-- load BXSlider scripts -->
<script type="text/javascript" src="{{ asset('app/components/jquery.bxslider/jquery.bxslider.min.js') }}"></script>

<!-- Google Map Api -->
<script type='text/javascript' src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
<script type="text/javascript" src="{{ asset('app/js/gmap3.min.js') }}"></script>

<!-- parallax -->
<script type="text/javascript" src="{{ asset('app/js/jquery.stellar.min.js') }}"></script>
    
<!-- waypoint -->
<script type="text/javascript" src="{{ asset('app/js/waypoints.min.js') }}"></script>

    <!-- load page Javascript -->
<script type="text/javascript" src="{{ asset('app/js/theme-scripts.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/js/scripts.js') }}"></script>
<script>
    enableChaser = 0;
</script>
    
@yield('js')

    
</body>
</html>
