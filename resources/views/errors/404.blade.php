<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html lang="{{ app()->getLocale() }}"> <!--<![endif]-->
<head>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Page Title -->
    <title>{{ config('app.name', 'Laravel') }} - 404</title>
    
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
<body class="post-404page style2 body-blank">
    <div id="page-wrapper" class="wrapper-blank">
        <section id="content">
            <div class="container">
                <div id="main">
                    <h1 class="logo">
                        <a href="{{ route('site.home.index') }}" title="Albatroz - home">
                            <img src="{{ asset('app/images/logo2.png') }}" alt="Albatroz - Language & Travel" />
                        </a>
                    </h1>
                    <div class="error-message"><strong>Error 404:</strong> Page not found</div>
                    <div class="error-message-404">
                        <img src="{{ asset('app/images/404-style1.png') }}" alt="">
                    </div>
                    <a href="{{ route('site.home.index') }}" class="button go-back"><i class="soap-icon-longarrow-left circle"></i>GO BACK TO HOME</a>
                </div>
            </div>
        </section>
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

    
@yield('js')

    
</body>
</html>
