
    <div class="top-nav" style="background-color:#E9AF64;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="tn-left">
                        <li><i style="color:black;" class="fa fa-phone"></i> 072 9090 230</li>
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
                        {{-- <a href="" class="bk-btn">Rezerva Acum</a> --}}
                        <div class="language-option">
                            {{-- <img src="/front/img/flag.jpg" alt=""> --}}


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
                                        <li><a href="{{ route('admin.panel') }}">Contul meu</a></li>
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
                            {{-- de facut logo --}}
                            <p style="color:#E9AF64; font-family: 'Water Brush', cursive; font-size: 35px;">Ajmal-JaiDam</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="nav-menu">
                        <nav class="mainmenu">
                            <ul>
                                <li class="{{ request()->routeIs('home') ? 'active' :'' }}"><a href="{{ route('home') }}">Acasa</a></li>
                                <li class="{{ request()->routeIs('rooms') ? 'active' :'' }}"><a href="{{ route('rooms') }}">Camere</a></li>
                                <li><a href="./about-us.html">Despre Noi</a></li>
                                <li><a href="./pages.html">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="./room-details.html">Room Details</a></li>
                                        <li><a href="./blog-details.html">Blog Details</a></li>
                                        <li><a href="#">Family Room</a></li>
                                        <li><a href="#">Premium Room</a></li>
                                    </ul>
                                </li>
                                <li><a href="./blog.html">Blogul Nostru</a></li>
                                <li><a href="./contact.html">Contact</a></li>
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


    {{-- @push('customCss')
    <style>
    p.logo{
        color:red;
        }

    </style>
    @endpush --}}
