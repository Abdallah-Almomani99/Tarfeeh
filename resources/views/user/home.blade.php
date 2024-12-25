@extends('layouts.user-base')

@section('title', 'Tarfeeh Home-Page')

{{-- @section('dashboard-active', 'active') --}}
<!-- Blank Start -->
@section('content')
    <div class="swiper-container hero-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide" data-date="2018/05/01"
                style="
      background: url('{{ asset('assets/user_assets') }}/images/home-2.jpg') no-repeat;
      background-size: cover;
    ">
                <div class="hero-content">
                    <div class="container">
                        <div class="row">
                            <div class="col flex flex-column justify-content-center">
                                <div class="entry-header">
                                    <div class="countdown flex align-items-center">
                                        <div class="countdown-holder flex align-items-baseline">
                                            <span class="dday"></span>
                                            <label>Days</label>
                                        </div>
                                        <!-- .countdown-holder -->

                                        <div class="countdown-holder flex align-items-baseline">
                                            <span class="dhour"></span>
                                            <label>Hours</label>
                                        </div>
                                        <!-- .countdown-holder -->

                                        <div class="countdown-holder flex align-items-baseline">
                                            <span class="dmin"></span>
                                            <label>Minutes</label>
                                        </div>
                                        <!-- .countdown-holder -->

                                        <div class="countdown-holder flex align-items-baseline">
                                            <span class="dsec"></span>
                                            <label>Seconds</label>
                                        </div>
                                        <!-- .countdown-holder -->
                                    </div>
                                    <!-- .countdown -->

                                    <h2 class="entry-title">
                                        1 We have the best events. <br />Get your tiket now!
                                    </h2>
                                </div>
                                <!--- .entry-header -->

                                <div class="entry-footer">
                                    <a class="btn gradient-bg" href="#">Order here</a>
                                </div>
                                <!-- .entry-footer" -->
                            </div>
                            <!-- .col -->
                        </div>
                        <!-- .container -->
                    </div>
                    <!-- .hero-content -->
                </div>
                <!-- .swiper-slide -->
            </div>
            <!-- .swiper-wrapper -->

            <div class="swiper-slide" data-date="2024/12/20"
                style="
      background: url('{{ asset('assets/user_assets') }}/images/home-1.jpg') no-repeat;
      background-size: cover;
    ">
                <div class="hero-content">
                    <div class="container">
                        <div class="row">
                            <div class="col flex flex-column justify-content-center">
                                <div class="entry-header">
                                    <div class="countdown flex align-items-center">
                                        <div class="countdown-holder flex align-items-baseline">
                                            <span class="dday"></span>
                                            <label>Days</label>
                                        </div>
                                        <!-- .countdown-holder -->

                                        <div class="countdown-holder flex align-items-baseline">
                                            <span class="dhour"></span>
                                            <label>Hours</label>
                                        </div>
                                        <!-- .countdown-holder -->

                                        <div class="countdown-holder flex align-items-baseline">
                                            <span class="dmin"></span>
                                            <label>Minutes</label>
                                        </div>
                                        <!-- .countdown-holder -->

                                        <div class="countdown-holder flex align-items-baseline">
                                            <span class="dsec"></span>
                                            <label>Seconds</label>
                                        </div>
                                        <!-- .countdown-holder -->
                                    </div>
                                    <!-- .countdown -->

                                    <h2 class="entry-title">
                                        2 We have the best events. <br />Get your tiket now!
                                    </h2>
                                </div>
                                <!--- .entry-header -->

                                <div class="entry-footer">
                                    <a class="btn gradient-bg" href="#">Order here</a>
                                </div>
                                <!-- .entry-footer" -->
                            </div>
                            <!-- .col -->
                        </div>
                        <!-- .container -->
                    </div>
                    <!-- .hero-content -->
                </div>
                <!-- .swiper-slide -->
            </div>
            <!-- .swiper-wrapper -->

            <div class="swiper-slide" data-date="2020/05/01"
                style="
      background: url('{{ asset('assets/user_assets') }}/images/home-4.jpg') no-repeat;
      background-size: cover;
    ">
                <div class="hero-content">
                    <div class="container">
                        <div class="row">
                            <div class="col flex flex-column justify-content-center">
                                <div class="entry-header">
                                    <div class="countdown flex align-items-center">
                                        <div class="countdown-holder flex align-items-baseline">
                                            <span class="dday"></span>
                                            <label>Days</label>
                                        </div>
                                        <!-- .countdown-holder -->

                                        <div class="countdown-holder flex align-items-baseline">
                                            <span class="dhour"></span>
                                            <label>Hours</label>
                                        </div>
                                        <!-- .countdown-holder -->

                                        <div class="countdown-holder flex align-items-baseline">
                                            <span class="dmin"></span>
                                            <label>Minutes</label>
                                        </div>
                                        <!-- .countdown-holder -->

                                        <div class="countdown-holder flex align-items-baseline">
                                            <span class="dsec"></span>
                                            <label>Seconds</label>
                                        </div>
                                        <!-- .countdown-holder -->
                                    </div>
                                    <!-- .countdown -->

                                    <h2 class="entry-title">
                                        3 We have the best events. <br />Get your tiket now!
                                    </h2>
                                </div>
                                <!--- .entry-header -->

                                <div class="entry-footer">
                                    <a class="btn gradient-bg" href="#">Order here</a>
                                </div>
                                <!-- .entry-footer" -->
                            </div>
                            <!-- .col -->
                        </div>
                        <!-- .container -->
                    </div>
                    <!-- .hero-content -->
                </div>
                <!-- .swiper-slide -->
            </div>
            <!-- .swiper-wrapper -->
        </div>

        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>

        <!-- Add Arrows -->
        <div class="swiper-button-next flex justify-content-center align-items-center">
            <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1171 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z" />
                </svg></span>
        </div>

        <div class="swiper-button-prev flex justify-content-center align-items-center">
            <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1203 544q0 13-10 23l-393 393 393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z" />
                </svg></span>
        </div>
    </div>
    <!-- .swiper-container -->
    </header>
    <!-- .site-header -->

    <div class="homepage-info-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-5">
                    <figure>
                        <img src="{{ asset('assets/user_assets/images/logo-2.png') }}" alt="logo" />
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

    <div class="homepage-featured-events">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="featured-events-wrap flex flex-wrap justify-content-between">
                        @foreach ($categories as $index => $category)
                            <div class="event-content-wrap positioning-event-{{ $index + 1 }}">

                                <figure>
                                    <a href="#">
                                        @if ($category->image)
                                            <img class="rounded" src="{{ asset('storage/' . $category->image) }}"
                                                alt="{{ $category->name }}" />
                                        @else
                                            <img src="{{ asset('assets/user_assets/images/placeholder.jpg') }}"
                                                alt="Default Image" />
                                        @endif
                                    </a>
                                </figure>
                                @if ($index < 11)
                                    {{-- Add title and date for the first 9 items --}}
                                    <header class="entry-header">
                                        <h3 class="entry-title">{{ $category->name }}</h3>
                                    </header>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="homepage-next-events">
        <div class="container">
            <div class="row">
                <div class="next-events-section-header">
                    <h2 class="entry-title">Venues</h2>
                    <p>
                        Vestibulum eget lacus at mauris sagittis varius. Etiam ut
                        venenatis dui. Nullam tellus risus, pellentesque at facilisis et,
                        scelerisque sit amet metus. Duis vel semper turpis, ac tempus
                        libero. Maecenas id ultrices risus. Aenean nec ornare ipsum,
                        lacinia.
                    </p>
                </div>
            </div>

            <div class="row">
                @foreach ($venues as $venue)
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="next-event-wrap pb-3" style="border: 2px solid lightgray">
                            <figure>
                                {{-- Display the first image associated with the venue --}}
                                <a href="#"><img
                                        src="{{ $venue->images->first() ? asset('storage/' . $venue->images->first()->image) : asset('assets/user_assets/images/default.jpg') }}"
                                        alt="{{ $venue->name }}" /></a>
                            </figure>

                            <header class="entry-header">
                                {{-- Display the venue name --}}
                                <h3 class="entry-title">{{ $venue->name }}</h3>

                                {{-- Display the work time --}}
                                <div class="posted-date">
                                    Work Time: <span>{{ $venue->open_time }} - {{ $venue->close_time }}</span>
                                </div>
                            </header>

                            <div class="entry-content">
                                {{-- Display the venue description --}}
                                <p>{{ $venue->description }}</p>
                            </div>

                            <footer class="entry-footer">
                                {{-- Link to a booking page or functionality --}}
                                <a href="{{ route('bookings.create', ['venue_id' => $venue->id]) }}">Book Now</a>
                            </footer>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <div class="homepage-regional-events">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header
                        class="regional-events-heading entry-header flex flex-wrap justify-content-between align-items-center">
                        <h2 class="entry-title">Events in New York</h2>

                        <div class="select-location">
                            <select>
                                <option>New York</option>
                                <option>California</option>
                                <option>South Carolina</option>
                            </select>
                        </div>
                    </header>

                    <div class="swiper-container homepage-regional-events-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <figure>
                                    <img src= "{{ asset('assets/user_assets/images') }}/event-slider-1.jpg"
                                        alt="" />

                                    <a class="event-overlay-link flex justify-content-center align-items-center"
                                        href="#">+</a>
                                </figure>
                                <!-- .hero-image -->

                                <div class="entry-header">
                                    <h2 class="entry-title">U2 Concert</h2>
                                </div>
                                <!--- .entry-header -->

                                <div class="entry-footer">
                                    <div class="posted-date">
                                        Saturday <span>Jan 27, 2018</span>
                                    </div>
                                </div>
                                <!-- .entry-footer" -->
                            </div>
                            <!-- .swiper-slide -->

                            <div class="swiper-slide">
                                <figure>
                                    <img src= "{{ asset('assets/user_assets/images') }}/event-slider-2.jpg"
                                        alt="" />

                                    <a class="event-overlay-link flex justify-content-center align-items-center"
                                        href="#">+</a>
                                </figure>
                                <!-- .hero-image -->

                                <div class="entry-header">
                                    <h2 class="entry-title">Broadway Hit</h2>
                                </div>
                                <!--- .entry-header -->

                                <div class="entry-footer">
                                    <div class="posted-date">
                                        Saturday <span>Jan 27, 2018</span>
                                    </div>
                                </div>
                                <!-- .entry-footer" -->
                            </div>
                            <!-- .swiper-slide -->

                            <div class="swiper-slide">
                                <figure>
                                    <img src= "{{ asset('assets/user_assets/images') }}/event-slider-3.jpg"
                                        alt="" />

                                    <a class="event-overlay-link flex justify-content-center align-items-center"
                                        href="#">+</a>
                                </figure>
                                <!-- .hero-image -->

                                <div class="entry-header">
                                    <h2 class="entry-title">Gallery Exibition</h2>
                                </div>
                                <!--- .entry-header -->

                                <div class="entry-footer">
                                    <div class="posted-date">
                                        Saturday <span>Jan 27, 2018</span>
                                    </div>
                                </div>
                                <!-- .entry-footer" -->
                            </div>
                            <!-- .swiper-slide -->

                            <div class="swiper-slide">
                                <figure>
                                    <img src= "{{ asset('assets/user_assets/images') }}/event-slider-4.jpg"
                                        alt="" />

                                    <a class="event-overlay-link flex justify-content-center align-items-center"
                                        href="#">+</a>
                                </figure>
                                <!-- .hero-image -->

                                <div class="entry-header">
                                    <h2 class="entry-title">Art Gallery</h2>
                                </div>
                                <!--- .entry-header -->

                                <div class="entry-footer">
                                    <div class="posted-date">
                                        Saturday <span>Jan 27, 2018</span>
                                    </div>
                                </div>
                                <!-- .entry-footer" -->
                            </div>
                            <!-- .swiper-slide -->

                            <div class="swiper-slide">
                                <figure>
                                    <img src= "{{ asset('assets/user_assets/images') }}/event-slider-5.jpg"
                                        alt="" />

                                    <a class="event-overlay-link flex justify-content-center align-items-center"
                                        href="#">+</a>
                                </figure>
                                <!-- .hero-image -->

                                <div class="entry-header">
                                    <h2 class="entry-title">Music Concert</h2>
                                </div>
                                <!--- .entry-header -->

                                <div class="entry-footer">
                                    <div class="posted-date">
                                        Saturday <span>Jan 27, 2018</span>
                                    </div>
                                </div>
                                <!-- .entry-footer" -->
                            </div>
                            <!-- .swiper-slide -->

                            <div class="swiper-slide">
                                <figure>
                                    <img src= "{{ asset('assets/user_assets/images') }}/event-slider-6.jpg"
                                        alt="" />

                                    <a class="event-overlay-link flex justify-content-center align-items-center"
                                        href="#">+</a>
                                </figure>
                                <!-- .hero-image -->

                                <div class="entry-header">
                                    <h2 class="entry-title">EDM Festival</h2>
                                </div>
                                <!--- .entry-header -->

                                <div class="entry-footer">
                                    <div class="posted-date">
                                        Saturday <span>Jan 27, 2018</span>
                                    </div>
                                </div>
                                <!-- .entry-footer" -->
                            </div>
                            <!-- .swiper-slide -->

                            <div class="swiper-slide">
                                <figure>
                                    <img src= "{{ asset('assets/user_assets/images') }}/event-slider-1.jpg"
                                        alt="" />

                                    <a class="event-overlay-link flex justify-content-center align-items-center"
                                        href="#">+</a>
                                </figure>
                                <!-- .hero-image -->

                                <div class="entry-header">
                                    <h2 class="entry-title">U2 Concert</h2>
                                </div>
                                <!--- .entry-header -->

                                <div class="entry-footer">
                                    <div class="posted-date">
                                        Saturday <span>Jan 27, 2018</span>
                                    </div>
                                </div>
                                <!-- .entry-footer" -->
                            </div>
                            <!-- .swiper-slide -->
                        </div>
                        <!-- .swiper-wrapper -->

                        <!-- Add Arrows -->
                        <div class="swiper-button-next flex justify-content-center align-items-center">
                            <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1171 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z" />
                                </svg></span>
                        </div>

                        <div class="swiper-button-prev flex justify-content-center align-items-center">
                            <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1203 544q0 13-10 23l-393 393 393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z" />
                                </svg></span>
                        </div>
                    </div>
                    <!-- .swiper-container -->

                    <div class="events-partners">
                        <header class="entry-header">
                            <h2 class="entry-title">Partners</h2>
                        </header>

                        <div class="events-partners-logos flex flex-wrap justify-content-between align-items-center">
                            <div class="event-partner-logo">
                                <a href="#"><img src= "{{ asset('assets/user_assets/images') }}/pixar.png"
                                        alt="" /></a>
                            </div>

                            <div class="event-partner-logo">
                                <a href="#"><img src= "{{ asset('assets/user_assets/images') }}/the-pirate.png"
                                        alt="" /></a>
                            </div>

                            <div class="event-partner-logo">
                                <a href="#"><img src= "{{ asset('assets/user_assets/images') }}/himalayas.png"
                                        alt="" /></a>
                            </div>

                            <div class="event-partner-logo">
                                <a href="#"><img src= "{{ asset('assets/user_assets/images') }}/sa.png"
                                        alt="" /></a>
                            </div>

                            <div class="event-partner-logo">
                                <a href="#"><img src= "{{ asset('assets/user_assets/images') }}/south-porth.png"
                                        alt="" /></a>
                            </div>

                            <div class="event-partner-logo">
                                <a href="#"><img src= "{{ asset('assets/user_assets/images') }}/himalayas.png"
                                        alt="" /></a>
                            </div>

                            <div class="event-partner-logo">
                                <a href="#"><img src= "{{ asset('assets/user_assets/images') }}/sa.png"
                                        alt="" /></a>
                            </div>

                            <div class="event-partner-logo">
                                <a href="#"><img src= "{{ asset('assets/user_assets/images') }}/south-porth.png"
                                        alt="" /></a>
                            </div>

                            <div class="event-partner-logo">
                                <a href="#"><img src= "{{ asset('assets/user_assets/images') }}/pixar.png"
                                        alt="" /></a>
                            </div>

                            <div class="event-partner-logo">
                                <a href="#"><img src= "{{ asset('assets/user_assets/images') }}/the-pirate.png"
                                        alt="" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="newsletter-subscribe">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h2 class="entry-title">
                            Subscribe to our newsletter to get the latest trends & news
                        </h2>
                        <p>Join our database NOW!</p>
                    </header>

                    <div class="newsletter-form">
                        <form class="flex flex-wrap justify-content-center align-items-center">
                            <div class="col-md-12 col-lg-3">
                                <input type="text" placeholder="Name" />
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <input type="email" placeholder="Your e-mail" />
                            </div>

                            <div class="col-md-12 col-lg-3">
                                <input class="btn gradient-bg" type="submit" value="Subscribe" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('content')
