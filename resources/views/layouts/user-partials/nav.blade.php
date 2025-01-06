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
                            {{-- <li id="profile-link" hidden><a href="{{ route('user.profile.edit') }}">Profile</a></li> --}}
                            <li><a href="{{ route('show.category') }}">Home</a></li>
                            <li><a href="{{ route('user.about') }}">About us</a></li>
                            <li><a href="{{ route('venues.page') }}">Venues</a></li>
                            <li><a href="{{ route('user.contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                    <!-- .site-navigation -->
                </div>
                <!-- .col -->
                @guest
                    <div class="col-lg-3 d-none d-lg-block order-2 order-lg-3">
                        <div class="buy-tickets">
                            <a class="btn gradient-bg" href={{ route('login') }}>Start Now</a>
                        </div>
                        <!-- .buy-tickets -->
                    </div>
                    <!-- .col -->
                @else
                    <div class="col-lg-3 d-none d-lg-block order-2 order-lg-3">
                        <div class="buy-tickets">
                            <div class="d-flex">
                                <a href="{{ route('user.profile.edit') }}" class="btn gradient-bg"><i
                                        class="fa fa-user"></i></a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="btn gradient-bg ml-3" type="submit">Log Out</button>
                                </form>

                            </div>
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
