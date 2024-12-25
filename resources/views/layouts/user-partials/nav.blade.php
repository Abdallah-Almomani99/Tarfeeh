<header class="site-header">
    <div class="header-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-10 col-lg-2 order-lg-1">
                    <div class="site-branding">
                        <div class="site-title">
                            <a href="#"><img src="{{ asset('assets/user_assets/images/logo.png') }}"
                                    alt="logo" /></a>
                        </div>
                        <!-- .site-title -->
                    </div>
                    <!-- .site-branding -->
                </div>
                <!-- .col -->

                <div class="col-2 col-lg-7 order-3 order-lg-2">
                    <nav class="site-navigation">
                        <div class="hamburger-menu d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <!-- .hamburger-menu -->

                        <ul>
                            <li><a href="./home">Home</a></li>
                            <li><a href="./about">About us</a></li>
                            <li><a href="./venues">Venues</a></li>
                            <li><a href="./contact">Contact</a></li>
                        </ul>
                    </nav>
                    <!-- .site-navigation -->
                </div>
                <!-- .col -->
                @guest
                    <div class="col-lg-3 d-none d-lg-block order-2 order-lg-3">
                        <div class="buy-tickets">
                            <a class="btn gradient-bg" href={{ route('login') }}>Sign In / Up</a>
                        </div>
                        <!-- .buy-tickets -->
                    </div>
                    <!-- .col -->
                @else
                    <div class="col-lg-3 d-none d-lg-block order-2 order-lg-3">
                        <div class="buy-tickets">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn gradient-bg" type="submit">Log Out</button>
                            </form>

                        </div>
                        <!-- .buy-tickets -->
                    </div>
                @endguest
            </div>
            <!-- .row -->
        </div>
        <!-- .container-fluid -->
    </div>
    <!-- .header-bar -->
