<!--header-->
<header id="site-header" class="fixed-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg stroke">

            <!-- LOGO -->
            <a class="navbar-brand mr-lg-5" href="{{ route('front.index') }}">
                <img src="{{ asset('assets-front-auth/assets/img/favicon/Logo.png') }}" alt="Your Logo"
                    style="height: 70px;width: auto;max-width: 250px">
            </a>


            <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto">

                    <!-- HOME -->
                    <li class="nav-item @yield('home-active')">
                        <a class="nav-link" href="{{ route('front.index') }}">Home <span
                                class="sr-only">(current)</span></a>
                    </li>

                    <!-- ABOUT -->
                    <li class="nav-item @yield('about-active')">
                        <a class="nav-link" href="{{ route('front.about') }}">About</a>
                    </li>

                    <!-- DESTINATIONS -->
                    <li class="nav-item @yield('destinations-active')">
                        <a class="nav-link" href="{{ route('front.destination') }}">Destinations</a>
                    </li>

                    <!-- CONTACT -->
                    <li class="nav-item @yield('contact-active')">
                        <a class="nav-link" href="{{ route('front.contact') }}">Contact</a>
                    </li>

                    <!-- RESERVATION -->
                    @if (Auth::check())
                        <li class="nav-item @yield('reservation-active')">
                            <a class="nav-link" href="{{ route('reservations.index') }}">My Reservation</a>
                        </li>
                    @endif


                </ul>
            </div>

            <!-- LOGIN -->
            <div class="d-lg-block d-none">
                @if (!Auth::check())
                    <a href="{{ route('login') }}" class="btn btn-style btn-secondary">Login</a>
                @else
                    <span class="btn btn-style btn-secondary">{{ Auth::user()->name }}</span>
                @endif
            </div>
            <!-- END LOGIN -->

            <!-- LOGOUT -->
            @if (Auth::check())
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link"
                        style="background: none; border: none; padding: 0; color: inherit; cursor: pointer;">
                        Logout
                    </button>
                </form>
            @endif
            <!-- END LOGOUT -->

            <!-- toggle switch for light and dark theme -->
            <div class="mobile-position">
                <nav class="navigation">
                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox">
                            <div class="mode-container">
                                <i class="gg-sun"></i>
                                <i class="gg-moon"></i>
                            </div>
                        </label>
                    </div>
                </nav>
            </div>
            <!-- //toggle switch for light and dark theme -->
        </nav>
    </div>
</header>
<!-- //header -->
