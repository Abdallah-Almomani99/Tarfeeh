@extends('layouts.user-base')

@section('title', 'Tarfeeh Home-Page')

{{-- @section('dashboard-active', 'active') --}}
<!-- Blank Start -->
@section('content')
    @php
        $slides = App\Models\HeroSlide::all();
    @endphp

    <div class="swiper-container hero-slider" style="height: 100vh">
        <div class="swiper-wrapper">
            @foreach ($slides as $slide)
                <div class="swiper-slide" data-date="{{ $slide->date }}"
                    style="background: url('{{ asset('storage/' . $slide->image_path) }}') no-repeat; background-size: cover;">
                    <div class="hero-content">
                        <div class="container">
                            <div class="row">
                                <div class="col flex flex-column justify-content-center">
                                    <div class="entry-header">
                                        @if ($slide->date)
                                            <div class="countdown flex align-items-center">
                                                <div class="countdown-holder flex align-items-baseline">
                                                    <span class="dday">0</span>
                                                    <label>Days</label>
                                                </div>
                                                <!-- .countdown-holder -->

                                                <div class="countdown-holder flex align-items-baseline">
                                                    <span class="dhour">0</span>
                                                    <label>Hours</label>
                                                </div>
                                                <!-- .countdown-holder -->

                                                <div class="countdown-holder flex align-items-baseline">
                                                    <span class="dmin">0</span>
                                                    <label>Minutes</label>
                                                </div>
                                                <!-- .countdown-holder -->

                                                <div class="countdown-holder flex align-items-baseline">
                                                    <span class="dsec">0</span>
                                                    <label>Seconds</label>
                                                </div>
                                                <!-- .countdown-holder -->
                                            </div>
                                        @endif
                                        <h2 class="entry-title">{{ $slide->title }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
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
                            Tarfeeh is your ultimate destination for discovering and booking entertainment, sports, and
                            tourist venues. Whether you’re looking for a fun day at an entertainment center, exploring new
                            tourist spots, or booking sports facilities, Tarfeeh makes it easy to browse, view photos, and
                            check prices. With flexible booking options, you can choose your preferred time and date,
                            ensuring a seamless and personalized experience. Choose Tarfeeh for a hassle-free way to enjoy
                            the best activities and services in your area!
                        </p>
                    </div>

                    <footer class="entry-footer">
                        <a href="{{ route('user.about') }}" class="btn gradient-bg">Read More</a>
                        @guest
                            <a href="/login" class="btn dark">Register Now</a>
                        @endguest
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
                                    <a href="{{ route('venue.category', ['id' => $category->category_id]) }}">
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
                                        src="{{ $venue->images->random() ? asset('storage/' . $venue->images->random()->image) : asset('assets/user_assets/images/default.jpg') }}"
                                        alt="{{ $venue->name }}" /></a>
                            </figure>

                            <header class="entry-header">
                                {{-- Display the venue name --}}
                                <h3 class="entry-title">{{ $venue->name }}</h3>

                                {{-- Display the work time --}}
                                <div class="posted-date">
                                    Work Time: <span>{{ \Carbon\Carbon::parse($venue->open_time)->format('h:i A') }} -
                                        {{ \Carbon\Carbon::parse($venue->close_time)->format('h:i A') }}</span>
                                </div>
                            </header>

                            <div class="entry-content">
                                {{-- Display the venue description --}}
                                <p>{{ $venue->description }}</p>
                            </div>

                            <footer class="entry-footer">
                                {{-- Link to a booking page or functionality --}}
                                <a href="{{ route('show.venue', $venue->venue_id) }}">Book Now</a>
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
                        <h2 class="entry-title">Random Activities</h2>
                    </header>

                    <div class="swiper-container homepage-regional-events-slider">
                        <div class="swiper-wrapper">
                            @foreach ($activities as $activity)
                                <div class="swiper-slide">
                                    <figure>
                                        <img class="activity-image" src="{{ asset('storage/' . $activity->venue->image) }}"
                                            alt="{{ $activity->name }}" />
                                        <a class="event-overlay-link flex justify-content-center align-items-center"
                                            href="{{ route('show.venue', $activity->venue->venue_id) }}">+</a>
                                    </figure>
                                    <div class="entry-header">
                                        <h2 class="entry-title">{{ $activity->name }}</h2>
                                    </div>
                                    <div class="entry-footer">
                                        <div class="posted-date">
                                            Venue: <span>{{ $activity->venue->name ?? 'Unknown Venue' }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
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
                                        d="M1203 544q0 13-10 23l-393 393 393 393q10 10 10 23t-10 23l-50-50q-10-10-23-10t-23-10l-466-466q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z" />
                                </svg></span>
                        </div>
                    </div>

                    <!-- .swiper-container -->

                    <div class="events-partners">
                        <header class="entry-header">
                            <h2 class="entry-title">Partners</h2>
                        </header>

                        <div class="events-partners-logos flex flex-wrap justify-content-between align-items-center">
                            <div class="event-partner-logo ">
                                <a href="#"><img src= "{{ asset('assets/user_assets/images') }}/p1-logo.png"
                                        alt="" /></a>
                            </div>

                            <div class="event-partner-logo">
                                <a href="#"><img style="max-width: 58%"
                                        src= "{{ asset('assets/user_assets/images') }}/p2-logo.jpg" alt="" /></a>
                            </div>

                            <div class="event-partner-logo">
                                <a href="#"><img src= "{{ asset('assets/user_assets/images') }}/p3-logo.png"
                                        alt="" /></a>
                            </div>

                            <div class="event-partner-logo">
                                <a href="#"><img src= "{{ asset('assets/user_assets/images') }}/p4-logo.png"
                                        alt="" /></a>
                            </div>

                            <div class="event-partner-logo">
                                <a href="#"><img src= "{{ asset('assets/user_assets/images') }}/p5-logo.png"
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


@endsection('content')
