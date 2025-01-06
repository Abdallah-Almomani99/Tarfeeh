@extends('layouts.venue-base')

@section('title', 'Venue Details')

@section('content')
    <div class="page-header single-event-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">{{ $venue->name }}</h1>
                    </header>
                </div>
            </div>
        </div>
    </div>

    <div class="entry-content elements-container">
        <div class="row">

            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="counter-box">
                    <div class="flex justify-content-center align-items-center h1 " style="color: #9a28d7;">
                        <i class="fa fa-book"></i>
                    </div>
                    <div class="entry-content">
                        <div class="start-counter" data-to="{{ $totalBookings }}" data-speed="2000">
                            {{ $totalBookings }}
                        </div>
                        <h3 class="entry-title">Total Booking</h3>
                    </div>
                </div>
            </div>


            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="counter-box">
                    <div class="flex justify-content-center align-items-center h1" style="color: #9a28d7;">
                        <i class="fa fa-check-circle"></i>
                    </div>
                    <div class="entry-content">
                        <div class="start-counter" data-to="{{ $totalBookingsConfirmed }}" data-speed="2000">
                            {{ $totalBookingsConfirmed }}
                        </div>
                        <h3 class="entry-title">Total Confirmed Booking</h3>
                    </div>
                </div>
            </div>




            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="counter-box">
                    <div class="flex justify-content-center align-items-center h1 " style="color: #9a28d7;">
                        <i class="fa fa-money"></i>
                    </div>
                    <div class="entry-content">
                        <div class="start-counter" data-to="{{ $totalBookingPrice }}" data-speed="2000">
                            {{ $totalBookingPrice }}
                        </div>
                        <h3 class="entry-title">Total Revenue</h3>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container single-event-page">
        <div class="row">
            <div class="col-12 single-event">
                <div class="event-content-wrap">
                    <header class="entry-header flex flex-wrap justify-content-between align-items-end">
                        <div class="single-event-heading">
                            <h2 class="entry-title">{{ $venue->name }}</h2>

                            <div class="event-location">
                                <a target="_blank"
                                    href="https://maps.google.com/maps?q={{ $venue->latitude }},{{ $venue->longitude }}">Click
                                    Here For Location</a>
                            </div>

                            <div class="event-date">
                                {{ $venue->description }}
                            </div>
                        </div>
                        <div class="buy-tickets flex justify-content-center align-items-center">
                            <a class="btn gradient-bg" href="{{ route('venue.edit.details') }}">Edit</a>
                        </div>
                    </header>
                    <figure class="events-thumbnail">
                        <img src="{{ asset('storage/' . $venue->image) }}" alt="">
                    </figure>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="tabs">
                    <!-- Tabs Navigation -->
                    <ul class="tabs-nav flex">
                        <li class="tab-nav flex justify-content-center align-items-center" data-target="#tab_details">
                            Details
                        </li>
                        <li class="tab-nav flex justify-content-center align-items-center" data-target="#tab_activities">
                            Activities
                        </li>
                    </ul>

                    <!-- Tabs Content -->
                    <div class="tabs-container mb-5">
                        <!-- Details Tab -->
                        <div id="tab_details" class="tab-content">
                            <div class="flex flex-wrap justify-content-between">
                                <div class="single-event-details">

                                    <div class="single-event-details-row">
                                        <label>Phone:</label>
                                        <p>{{ $venue->phone }}</p>
                                    </div>

                                    <div class="single-event-details-row">
                                        <div class="d-flex">
                                            <label>Open: <p>{{ \Carbon\Carbon::parse($venue->open_time)->format('h:i A') }}
                                                </p>
                                            </label>
                                            <label class="ml-5">End: <p>
                                                    {{ \Carbon\Carbon::parse($venue->close_time)->format('h:i A') }}
                                                </p></label>

                                        </div>
                                    </div>



                                    <div class="single-event-details-row">
                                        <label>Gender Type:</label>
                                        <p>{{ $venue->type }}</p>
                                    </div>

                                    <div class="single-event-details-row">
                                        <label>Categories:</label>
                                        @php
                                            $displayedCategories = [];
                                            $categories = []; // Collect unique categories
                                        @endphp

                                        @foreach ($venue->activities as $activity)
                                            @if (!in_array($activity->category->name, $categories))
                                                @php
                                                    $categories[] = $activity->category->name;
                                                @endphp
                                            @endif
                                        @endforeach

                                        @foreach ($categories as $key => $categoryName)
                                            <a href="#">{{ $categoryName }}</a>
                                            @if ($key < count($categories) - 1)
                                                ,
                                            @endif
                                        @endforeach

                                    </div>

                                    <div class="single-event-details-row">
                                        <label>Tags:</label>
                                        <p>
                                            @foreach ($venue->tags as $tag)
                                                <a href="#">{{ $tag->tag_name }}</a>
                                                @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        </p>
                                    </div>
                                </div>

                                <div class="single-event-map">
                                    @if ($venue->images->count() > 0)
                                        <div id="venueImageCarousel" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach ($venue->images as $key => $image)
                                                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                                        <img src="{{ asset('storage/' . $image->image) }}"
                                                            class="d-block w-100 rounded mb-3 img-fluid" alt="Venue Image"
                                                            style="object-fit: cover; height: 500px;">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <!-- Previous Button -->
                                            <a class="carousel-control-prev" href="#venueImageCarousel" role="button"
                                                data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <!-- Next Button -->
                                            <a class="carousel-control-next" href="#venueImageCarousel" role="button"
                                                data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    @else
                                        <img src="{{ asset('storage/default.png') }}" alt="Default Image"
                                            class="rounded mb-3" style="width: 100%; height: 300px; object-fit: cover;">
                                    @endif
                                </div>


                            </div>
                        </div>

                        <!-- Activities Tab -->
                        <div id="tab_activities" class="tab-content">
                            <ul>
                                @foreach ($venue->activities as $activity)
                                    <li>
                                        <strong>{{ $activity->name }}</strong> - ${{ $activity->price }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
