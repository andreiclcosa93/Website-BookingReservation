    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
        <p style="color:#E9AF64; font-family: 'Water Brush', cursive; font-size: 25px;">Ajmal-JaiDam</p>
        <div class="header-configure-area">
            {{-- === authentication === --}}

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
                            <a onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                            href="#">Delogare</a>
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
            {{-- === authentication === --}}
            <a href="{{ route('rooms') }}" class="bk-btn">Descopera Oferta</a>
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li class="{{ request()->routeIs('home') ? 'active' :'' }}"><a href="{{ route('home') }}">Acasa</a></li>
                <li class="{{ request()->routeIs('about') ? 'active' :'' }}"><a  href="{{ route('about') }}">Despre Noi</a></li>
                <li class="{{ request()->routeIs('rooms*') ? 'active' :'' }}"><a href="{{ route('rooms') }}">Camere</a></li>

                {{-- <li><a href="#">Servicii</a></li> --}}
                <li class="{{ request()->routeIs('blog') ? 'active' :'' }}"><a href="{{ route('blog') }}">Blogul Nostru</a></li>
                <li class="{{ request()->routeIs('contact') ? 'active' :'' }}"><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="top-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-youtube"></i></a>
        </div>
        <ul class="top-widget">
            <li><i style="color:black;" class="fa fa-phone"></i> 072 9090 230</li>
                <li><i style="color:black;" class="fa fa-envelope"></i> office.Ajmal@jaidam.com</li>
        </ul>
    </div>
    <!-- Offcanvas Menu Section End -->
