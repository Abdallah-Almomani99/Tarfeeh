@extends('layouts.user-base')

@section('title', 'Tarfeeh Home-Page')

{{-- @section('dashboard-active', 'active') --}}
<!-- Blank Start -->
@section('content')

    <div class="page-header elements-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">About Us.</h1>
                    </header>
                </div>
            </div>
        </div>
    </div>
    </header>
    <!-- .site-header -->

    <div class="homepage-info-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-5">
                    <figure>
                        <img src="{{ asset('assets/user_assets/') }}/images/logo-2.png" alt="logo" />
                    </figure>
                </div>

                <div class="col-12 col-md-8 col-lg-7">
                    <header class="entry-header">
                        <h2 class="entry-title">
                            What is Tarfeeh and why choose our services?
                        </h2>
                    </header>

                    <div class="entry-content">
                        <p>
                            Tarfeeh is your ultimate destination for discovering and booking entertainment, sports, and
                            tourist venues. Whether you’re looking for a fun day at an entertainment center, exploring new
                            tourist spots, or booking sports facilities, Tarfeeh makes it easy to browse, view photos, and
                            check prices. With flexible booking options, you can choose your preferred time and date,
                            ensuring a seamless and personalized experience. Choose Tarfeeh for a hassle-free way to enjoy
                            the best activities and services in your area!
                        </p>
                    </div>

                    <footer class="entry-footer">
                        @guest
                            <a href="/login" class="btn gradient-bg">Login</a>
                            <a href="/register" class="btn dark">Register Now</a>
                        @endguest
                    </footer>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row elements-wrap">
            <div class="col-12">
                <header class="entry-header elements-heading">
                    <h2 class="entry-title pb-5 display-4">FAQ</h2>
                </header>

                <div class="entry-content elements-container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-md-8 ">
                            <div class="accordion-wrap type-accordion">
                                <h3 class="entry-title flex justify-content-between align-items-center active">
                                    How do I book a venue on Tarfeeh?<span class="arrow-r"></span>
                                </h3>

                                <div class="entry-content">
                                    <p>
                                        To book a venue, simply browse through our list of available entertainment centers,
                                        tourist destinations, or sports venues. Select the one that suits your needs, choose
                                        your preferred date and time, and complete the booking process through our
                                        easy-to-use platform.

                                    </p>
                                </div>

                                <h3 class="entry-title flex justify-content-between align-items-center">
                                    How can I make a booking or reservation?<span class="arrow-r"></span>
                                </h3>

                                <div class="entry-content">
                                    <p>
                                        To make a booking or reservation, simply browse through the venues or activities
                                        available on our platform, select the one you’re interested in, and follow the steps
                                        to complete the booking process. You will need to provide your details, including
                                        the preferred time and date for the booking, and choose your payment method if
                                        applicable. Once your booking is confirmed, you will receive a confirmation email
                                        with all the details.
                                    </p>
                                </div>

                                <h3 class="entry-title flex justify-content-between align-items-center">
                                    How are the prices for services determined on Tarfeeh?<span class="arrow-r"></span>
                                </h3>

                                <div class="entry-content">
                                    <p>
                                        Prices for services on Tarfeeh are set by the individual venues and service
                                        providers. They depend on factors such as the type of venue, the time of booking,
                                        and any special services you select. You can view detailed pricing information on
                                        each venue’s page before making a reservation.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row elements-wrap">
            <div class="col-12">
                <header class="entry-header elements-heading">
                    <h2 class="entry-title pb-5 display-4 center-the-title">Milestones</h2>
                </header>

                <div class="entry-content elements-container">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="counter-box">
                                <div class="flex justify-content-center align-items-center h1" style="color: #9a28d7;">
                                    <i class="fa
                                    fa-users "></i>
                                </div>

                                <div class="entry-content">
                                    <div class="start-counter" data-to="{{ $totalUsers }}" data-speed="2000">
                                        5555
                                    </div>

                                    <h3 class="entry-title">Total User</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="counter-box">
                                <div class="flex justify-content-center align-items-center h1 " style="color: #9a28d7;">

                                    <i class="fa fa-globe"></i>
                                </div>

                                <div class="entry-content">
                                    <div class="start-counter" data-to="{{ $totalVenues }}" data-speed="2000">
                                        5555
                                    </div>

                                    <h3 class="entry-title">Total Venue</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="counter-box">
                                <div class="flex justify-content-center align-items-center h1" style="color: #9a28d7;">
                                    <i class="fa fa-gamepad"></i>
                                </div>

                                <div class="entry-content">
                                    <div class="start-counter" data-to="{{ $totalActivities }}" data-speed="2000">
                                        5555
                                    </div>

                                    <h3 class="entry-title">Total Activities</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div style="height: 120px"></div>
@endsection('content')
