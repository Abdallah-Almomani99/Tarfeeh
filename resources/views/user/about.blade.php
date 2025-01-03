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
                        <h1 class="entry-title">Elements.</h1>
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
                            What is Agenda and why choose our services?
                        </h2>
                    </header>

                    <div class="entry-content">
                        <p>
                            Vestibulum eget lacus at mauris sagittis varius. Etiam ut
                            venenatis dui. Nullam tellus risus, pellentesque at facilisis
                            et, scelerisque sit amet metus. Duis vel semper turpis, ac
                            tempus libero. Maecenas id ultrices risus. Aenean nec ornare
                            ipsum, lacinia volutpat urna. Maecenas ut aliquam purus, quis
                            sodales dolor.
                        </p>
                    </div>

                    <footer class="entry-footer">
                        <a href="#" class="btn gradient-bg">Read More</a>
                        <a href="#" class="btn dark">Register Now</a>
                    </footer>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row elements-wrap">
            <div class="col-12">
                <header class="entry-header elements-heading">
                    <h2 class="entry-title">Buttons</h2>
                </header>

                <div class="entry-content elements-container">
                    <a href="#" class="btn gradient-bg">Buy Tikets</a>
                    <a href="#" class="btn dark-purple">Buy Tikets</a>
                    <a href="#" class="btn">Buy Tikets</a>
                    <a href="#" class="btn gradient">Buy Tikets</a>
                    <a href="#" class="btn dark">Buy Tikets</a>
                </div>
            </div>
        </div>

        <div class="row elements-wrap">
            <div class="col-12">
                <header class="entry-header elements-heading">
                    <h2 class="entry-title">Accordion & Tabs</h2>
                </header>

                <div class="entry-content elements-container">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="accordion-wrap type-accordion">
                                <h3 class="entry-title flex justify-content-between align-items-center active">
                                    Sed ac mi commodo, pellentesque erat eget<span class="arrow-r"></span>
                                </h3>

                                <div class="entry-content">
                                    <p>
                                        Vestibulum eget lacus at mauris sagittis varius. Etiam ut
                                        venenatis dui. Nullam tellus risus, pellentesque at
                                        facilisis et, scelerisque sit amet metus. Duis vel semper
                                        turpis, ac tempus libero. Maecenas id ultrices risus.
                                    </p>
                                </div>

                                <h3 class="entry-title flex justify-content-between align-items-center">
                                    Orci varius natoque penatibus et magnis<span class="arrow-r"></span>
                                </h3>

                                <div class="entry-content">
                                    <p>
                                        Vestibulum eget lacus at mauris sagittis varius. Etiam ut
                                        venenatis dui. Nullam tellus risus, pellentesque at
                                        facilisis et, scelerisque sit amet metus. Duis vel semper
                                        turpis, ac tempus libero. Maecenas id ultrices risus.
                                    </p>
                                </div>

                                <h3 class="entry-title flex justify-content-between align-items-center">
                                    Pellentesque consequat tellus non tortor tempus<span class="arrow-r"></span>
                                </h3>

                                <div class="entry-content">
                                    <p>
                                        Vestibulum eget lacus at mauris sagittis varius. Etiam ut
                                        venenatis dui. Nullam tellus risus, pellentesque at
                                        facilisis et, scelerisque sit amet metus. Duis vel semper
                                        turpis, ac tempus libero. Maecenas id ultrices risus.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="tabs">
                                <ul class="tabs-nav flex">
                                    <li class="tab-nav flex justify-content-center align-items-center"
                                        data-target="#tab_details">
                                        Details
                                    </li>
                                    <li class="tab-nav flex justify-content-center align-items-center"
                                        data-target="#tab_venue">
                                        Venue
                                    </li>
                                    <li class="tab-nav flex justify-content-center align-items-center"
                                        data-target="#tab_organizers">
                                        Organizers
                                    </li>
                                </ul>

                                <div class="tabs-container">
                                    <div id="tab_details" class="tab-content">
                                        <p>
                                            Vestibulum eget lacus at mauris sagittis varius. Etiam
                                            ut venenatis dui. Nullam tellus risus, pellentesque at
                                            facilisis et, scelerisque sit amet metus. Duis vel
                                            semper turpis, ac tempus libero. Maecenas id ultrices
                                            risus. Aenean nec ornare ipsum, lacinia volutpat urna.
                                            Maecenas ut aliquam purus, quis sodales dolor.
                                        </p>
                                    </div>

                                    <div id="tab_venue" class="tab-content">
                                        <p>
                                            Nullam dictum felis eu pede mollis pretium. Integer
                                            tincidunt. Cras dapibus. Vivamus elementum semper nisi.
                                            Aenean vulputate eleifend tellus. Aenean leo ligula,
                                            porttitor eu, consequat vitae, eleifend ac, enim.
                                            Aliquam lorem ante, dapibus in, viverra quis, feugiat a,
                                            tellus. Phasellus viverra nulla ut metus varius laoreet.
                                            Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi
                                            vel augue. Curabitur ullamcorper ultricies nisi. Nam
                                            eget dui.
                                        </p>
                                    </div>

                                    <div id="tab_organizers" class="tab-content">
                                        <p>
                                            Etiam rhoncus. Maecenas tempus, tellus eget condimentum
                                            rhoncus, sem quam semper libero, sit amet adipiscing sem
                                            neque sed ipsum. Nam quam nunc, blandit vel, luctus
                                            pulvinar, hendrerit id, lorem. Maecenas nec odio et ante
                                            tincidunt tempus. Donec vitae sapien ut libero venenatis
                                            faucibus. Nullam quis ante. Etiam sit amet orci eget
                                            eros faucibus tincidunt. Duis leo. Sed fringilla mauris
                                            sit amet nibh. Donec sodales sagittis magna.
                                        </p>
                                    </div>
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
                    <h2 class="entry-title">Loaders</h2>
                </header>

                <div class="entry-content elements-container">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="circular-progress-bar">
                                <div class="circle" id="festivals">
                                    <strong></strong>
                                </div>

                                <h3 class="entry-title">Festivals</h3>
                                <p>Maecenas id ultrices</p>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="circular-progress-bar">
                                <div class="circle" id="concerts">
                                    <strong></strong>
                                </div>

                                <h3 class="entry-title">Concerts</h3>
                                <p>Sancenas diultrices</p>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="circular-progress-bar">
                                <div class="circle" id="conference">
                                    <strong></strong>
                                </div>

                                <h3 class="entry-title">Conference</h3>
                                <p>Maecenas id ultrices</p>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="circular-progress-bar">
                                <div class="circle" id="new_artists">
                                    <strong></strong>
                                </div>

                                <h3 class="entry-title">New artists</h3>
                                <p>Sancenas diultrices</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row elements-wrap">
            <div class="col-12">
                <header class="entry-header elements-heading">
                    <h2 class="entry-title">Milestones</h2>
                </header>

                <div class="entry-content elements-container">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="counter-box">
                                <div class="flex justify-content-center align-items-center">
                                    <img src="{{ asset('assets/user_assets/') }}/images/mic-icon.png" alt="" />
                                </div>

                                <div class="entry-content">
                                    <div class="start-counter" data-to="149" data-speed="2000">
                                        5555
                                    </div>

                                    <h3 class="entry-title">Concerts/Year</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="counter-box">
                                <div class="flex justify-content-center align-items-center">
                                    <img src="{{ asset('assets/user_assets/') }}/images/bulb-icon.png" alt="" />
                                </div>

                                <div class="entry-content">
                                    <div class="start-counter" data-to="2391" data-speed="2000">
                                        5555
                                    </div>

                                    <h3 class="entry-title">Concerence stpeackers</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="counter-box">
                                <div class="flex justify-content-center align-items-center">
                                    <img src="{{ asset('assets/user_assets/') }}/images/diomond-icon.png"
                                        alt="" />
                                </div>

                                <div class="entry-content">
                                    <div class="start-counter" data-to="245" data-speed="2000">
                                        5555
                                    </div>

                                    <h3 class="entry-title">Amazing Ideas</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="counter-box">
                                <div class="flex justify-content-center align-items-center">
                                    <img src="{{ asset('assets/user_assets/') }}/images/calendar-icon.png"
                                        alt="" />
                                </div>

                                <div class="entry-content">
                                    <div class="start-counter" data-to="128" data-speed="2000">
                                        5555
                                    </div>

                                    <h3 class="entry-title">Calendar Events</h3>
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
                    <h2 class="entry-title">Icon Boxes</h2>
                </header>

                <div class="entry-content elements-container">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="icon-box">
                                <div class="flex justify-content-between align-items-center">
                                    <figure>
                                        <img src="{{ asset('assets/user_assets/') }}/images/icon-1.png" alt="" />
                                    </figure>

                                    <header class="entry-header">
                                        <h3 class="entry-title">Ultra Music Miami</h3>

                                        <div class="date">Saturday <span>Jan 27, 2018</span></div>
                                    </header>
                                </div>

                                <div class="entry-content">
                                    <p>
                                        Lacus at mauris sagittis varius. Etiam ut venenatis dui.
                                        Nullam tellus risus, pellentesque at facili.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="icon-box">
                                <div class="flex justify-content-between align-items-center">
                                    <figure>
                                        <img src="{{ asset('assets/user_assets/') }}/images/icon-2.png" alt="" />
                                    </figure>

                                    <header class="entry-header">
                                        <h3 class="entry-title">Dance & Music</h3>

                                        <div class="date">Saturday <span>Jan 27, 2018</span></div>
                                    </header>
                                </div>

                                <div class="entry-content">
                                    <p>
                                        Lacus at mauris sagittis varius. Etiam ut venenatis dui.
                                        Nullam tellus risus, pellentesque at facili.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="icon-box">
                                <div class="flex justify-content-between align-items-center">
                                    <figure>
                                        <img src="{{ asset('assets/user_assets/') }}/images/icon-3.png" alt="" />
                                    </figure>

                                    <header class="entry-header">
                                        <h3 class="entry-title">Online Conference</h3>

                                        <div class="date">Saturday <span>Jan 27, 2018</span></div>
                                    </header>
                                </div>

                                <div class="entry-content">
                                    <p>
                                        Lacus at mauris sagittis varius. Etiam ut venenatis dui.
                                        Nullam tellus risus, pellentesque at facili.
                                    </p>
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
