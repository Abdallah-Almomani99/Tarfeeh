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
                            <li><a href="{{ route('venue.details') }}">Details</a>
                            </li>
                            <li><a href="{{ route('venue.activities') }}">Activities</a></li>
                            <li><a href="{{ route('venue.bookings') }}">Bookings</a></li>
                        </ul>
                    </nav>
                    <!-- .site-navigation -->
                </div>
                <!-- .col -->

                <div class="col-lg-3 d-none d-lg-block order-2 order-lg-3">
                    <div class="buy-tickets">
                        <div class="d-flex">
                            <a href="{{ route('venue.profile.show', ['id' => auth()->user()->id]) }}"
                                class="btn gradient-bg"><i class="fa fa-user"></i></a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn gradient-bg ml-3" type="submit">Log Out</button>
                            </form>

                        </div>
                    </div>
                    <!-- .buy-tickets -->
                </div>
            </div>
            <!-- .row -->
        </div>
        <!-- .container-fluid -->
    </div>
    <!-- .header-bar -->
