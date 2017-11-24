<header id="header" class="navbar-static-top">
    {{-- <div class="topnav hidden-xs">
        <div class="container">
            <ul class="quick-menu pull-left">
                <li><a href="{{ url('/admin') }}">Painel Admin</a></li>
                <li class="ribbon">
                    <a href="#">English</a>
                    <ul class="menu mini">
                        <li><a href="#" title="Dansk">Dansk</a></li>
                        <li><a href="#" title="Deutsch">Deutsch</a></li>
                        <li class="active"><a href="#" title="English">English</a></li>
                        <li><a href="#" title="Español">Español</a></li>
                        <li><a href="#" title="Français">Français</a></li>
                        <li><a href="#" title="Italiano">Italiano</a></li>
                        <li><a href="#" title="Magyar">Magyar</a></li>
                        <li><a href="#" title="Nederlands">Nederlands</a></li>
                        <li><a href="#" title="Norsk">Norsk</a></li>
                        <li><a href="#" title="Polski">Polski</a></li>
                        <li><a href="#" title="Português">Português</a></li>
                        <li><a href="#" title="Suomi">Suomi</a></li>
                        <li><a href="#" title="Svenska">Svenska</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="quick-menu pull-right">

                <!-- Authentication Links -->
                @guest
                    <li><a href="#travelo-login" class="soap-popupbox">LOGIN</a></li>
                    <li><a href="#travelo-signup" class="soap-popupbox">SIGNUP</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest

                <li class="ribbon currency">
                    <a href="#" title="">USD</a>
                    <ul class="menu mini">
                        <li><a href="#" title="AUD">AUD</a></li>
                        <li><a href="#" title="BRL">BRL</a></li>
                        <li class="active"><a href="#" title="USD">USD</a></li>
                        <li><a href="#" title="CAD">CAD</a></li>
                        <li><a href="#" title="CHF">CHF</a></li>
                        <li><a href="#" title="CNY">CNY</a></li>
                        <li><a href="#" title="CZK">CZK</a></li>
                        <li><a href="#" title="DKK">DKK</a></li>
                        <li><a href="#" title="EUR">EUR</a></li>
                        <li><a href="#" title="GBP">GBP</a></li>
                        <li><a href="#" title="HKD">HKD</a></li>
                        <li><a href="#" title="HUF">HUF</a></li>
                        <li><a href="#" title="IDR">IDR</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
     --}}
    <div class="main-header">
        
        <a href="#mobile-menu-01" data-toggle="collapse" class="mobile-menu-toggle">
            Mobile Menu Toggle
        </a>

        <div class="container">
            <h1 class="logo navbar-brand">
                <a href="{{ route('site.home.index') }}" title="Albatroz - home">
                    <img src="{{ asset('app/images/logo.png') }}" alt="Albatroz - Language & Travel" />
                </a>
            </h1>
            
            <nav id="main-menu" role="navigation">
                <ul class="menu">
                    <li class="menu-item-has-children">
                        <a href="{{ route('site.home.index') }}">Home</a>
                    </li>
                    <li class="menu-item-has-children">
                        <a>Destinations</a>
                        <ul>
                            @inject('destinations','App\Models\Country')
                            @foreach($destinations->take(5)->get() as $destination)
                            <li><a href="{{ route('site.destination.country',$destination->slug) }}">{{ $destination->name }}</a></li>
                            @endforeach
                            <li><a href="{{ route('site.destination.index') }}">See All</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has children">
                        <a href="{{ route('site.school.index') }}">Schools</a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="{{ route('site.blog.index') }}">About Us</a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="{{ route('site.blog.index') }}">Blog</a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="{{ route('site.contact.index') }}">Contact</a>
                    </li>
                </ul>
            </nav>
        </div>
        
        <nav id="mobile-menu-01" class="mobile-menu collapse">
            <ul id="mobile-primary-menu" class="menu">

                <li class="menu-item-has-children">
                    <a href="{{ route('site.home.index') }}">Home</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="hotel-index.html">Hotels</a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('site.blog.index') }}">Blog</a>
                </li>
                <li class="menu-item">
                    <a href="#">Contact</a>
                </li>

            </ul>
            
            <ul class="mobile-topnav container">
                <li><a href="#">MY ACCOUNT</a></li>
                <li class="ribbon language menu-color-skin">
                    <a href="#" data-toggle="collapse">ENGLISH</a>
                    <ul class="menu mini">
                        <li><a href="#" title="Dansk">Dansk</a></li>
                        <li><a href="#" title="Deutsch">Deutsch</a></li>
                        <li class="active"><a href="#" title="English">English</a></li>
                        <li><a href="#" title="Español">Español</a></li>
                        <li><a href="#" title="Français">Français</a></li>
                        <li><a href="#" title="Italiano">Italiano</a></li>
                        <li><a href="#" title="Magyar">Magyar</a></li>
                        <li><a href="#" title="Nederlands">Nederlands</a></li>
                        <li><a href="#" title="Norsk">Norsk</a></li>
                        <li><a href="#" title="Polski">Polski</a></li>
                        <li><a href="#" title="Português">Português</a></li>
                        <li><a href="#" title="Suomi">Suomi</a></li>
                        <li><a href="#" title="Svenska">Svenska</a></li>
                    </ul>
                </li>
                <li><a href="#travelo-login" class="soap-popupbox">LOGIN</a></li>
                <li><a href="#travelo-signup" class="soap-popupbox">SIGNUP</a></li>
                <li class="ribbon currency menu-color-skin">
                    <a href="#">USD</a>
                    <ul class="menu mini">
                        <li><a href="#" title="AUD">AUD</a></li>
                        <li><a href="#" title="BRL">BRL</a></li>
                        <li class="active"><a href="#" title="USD">USD</a></li>
                        <li><a href="#" title="CAD">CAD</a></li>
                        <li><a href="#" title="CHF">CHF</a></li>
                        <li><a href="#" title="CNY">CNY</a></li>
                        <li><a href="#" title="CZK">CZK</a></li>
                        <li><a href="#" title="DKK">DKK</a></li>
                        <li><a href="#" title="EUR">EUR</a></li>
                        <li><a href="#" title="GBP">GBP</a></li>
                        <li><a href="#" title="HKD">HKD</a></li>
                        <li><a href="#" title="HUF">HUF</a></li>
                        <li><a href="#" title="IDR">IDR</a></li>
                    </ul>
                </li>
            </ul>
            
        </nav>
    </div>

    @include('layouts.modals.login')
    @include('layouts.modals.signup')

</header>