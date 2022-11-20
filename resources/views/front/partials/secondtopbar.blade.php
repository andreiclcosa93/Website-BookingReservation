
    <div class="top-nav" style="background-color:#E9AF64;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="tn-left">
                        <li><i style="color:black;" class="fa fa-phone"></i> 072 0000 000</li>
                        <li><i style="color:black;" class="fa fa-envelope"></i> office.Ajmal@jaidam.com</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="tn-right">
                        <div class="top-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube"></i></a>

                        </div>

                        <div class="language-option">

                            <i class="fa fa-user fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;
                            <span>
                                @auth
                                {{ Auth::user()->name }}
                                 @endauth
                                @guest Guest @endguest


                                <i class="fa fa-angle-down"></i></span>
                            <div class="flag-dropdown">
                                <ul>
                                    @auth

                                    <li>
                                        <form method="POST" action="{{ route('logout') }}" id="logout-form" class="d-none">
                                            @csrf
                                        </form>
                                        <a onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="#">Delogare</a>
                                            @if(Auth::user()->role=='admin')
                                        <li><a href="{{ route('admin.panel') }}">Control Panel</a></li>
                                            @else
                                        <li><a href="{{ route('reservations.account') }}">Contul meu</a></li>
                                            @endif
                                    </li>

                                        @endauth
                                        @guest

                                    <li><a href="{{ route('login') }}">Logare</a></li>
                                    <li><a href="{{ route('register') }}">Inregistrare </a></li>
                                    @endguest

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="/">
                            <img src="" alt="">

                            <p style="color:#E9AF64; font-family: 'Water Brush', cursive; font-size: 35px;">Ajmal-JaiDam</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="nav-menu">
                        <nav class="mainmenu">
                            <ul>
                                <li class="{{ request()->routeIs('home') ? 'active' :'' }}"><a href="{{ route('home') }}">ACASA</a></li>
                                <li class="{{ request()->routeIs('about') ? 'active' :'' }}"><a  href="{{ route('about') }}">DESPRE NOI</a></li>
                                <li class="{{ request()->routeIs('rooms*') ? 'active' :'' }}"><a href="{{ route('rooms') }}">CAMERELE NOASTRE</a></li>

                                {{-- <li><a href="#">Servicii</a></li> --}}
                                <li class="{{ request()->routeIs('blog') ? 'active' :'' }}"><a href="{{ route('blog') }}">BLOG</a></li>
                                <li class="{{ request()->routeIs('contact') ? 'active' :'' }}"><a href="{{ route('contact') }}">CONTACT</a></li>
                            </ul>
                        </nav>
                        <div class="nav-right search-switch">
                            {{-- <i class="icon_search"></i> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('customCss')
    <style>


    </style>
    @endpush
