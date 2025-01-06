@extends('layouts.user-base')

@section('title', 'Tarfeeh Home-Page')

{{-- @section('dashboard-active', 'active') --}}
<!-- Blank Start -->

@section('content')
    {{-- @dd($venue) --}}
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
    </header><!-- .site-header -->


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
                    </header>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="tabs">
                    <ul class="tabs-nav flex">
                        <li class="tab-nav flex justify-content-center align-items-center" data-target="#tab_details">
                            Details
                        </li>
                        @if ($venue->activities->count() > 0)
                            <li class="tab-nav flex justify-content-center align-items-center" data-target="#tab_venue">
                                Activities
                            </li>
                        @endif
                    </ul>

                    <div class="tabs-container mb-4">
                        <div id="tab_details" class="tab-content">
                            <div class="flex flex-wrap justify-content-between">
                                <div class="single-event-details">

                                    <div class="single-event-details-row">
                                        <label>Open:</label>
                                        <p>{{ \Carbon\Carbon::parse($venue->open_time)->format('h:i A') }}</p>
                                    </div>

                                    <div class="single-event-details-row">
                                        <label>End:</label>
                                        <p>{{ \Carbon\Carbon::parse($venue->close_time)->format('h:i A') }}</p>
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

                        <div id="tab_venue" class="tab-content">

                            <ul>
                                @foreach ($venue->activities as $activity)
                                    <li>
                                        <strong>{{ $activity->name }}</strong> - Price : ${{ $activity->price }} -
                                        Duration : {{ $activity->duration }} - Allowed Age : {{ $activity->allowed_age }}
                                        -
                                        Capacity : {{ $activity->capacity }} - Gender : {{ $activity->gender }} -
                                        Category : {{ $activity->category->name }} <br> Description :
                                        {{ $activity->description }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @if ($errors->all())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-danger">
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-12">
                @if ($venue->activities->count() > 0)
                    <div class="event-tickets">
                        @foreach ($venue->activities as $activity)
                            <div class="ticket-row flex flex-wrap justify-content-between align-items-center">
                                <div
                                    class="ticket-type flex justify-content-between align-items-center @if (auth()->check() && auth()->user()->user_type !== 'user') w-100 @endif">
                                    <h3 class="entry-title">
                                        <span>{{ $activity->name }}</span> <!-- Activity Name -->
                                    </h3>

                                    <div class="ticket-price">${{ $activity->price }}</div> <!-- Activity Price -->
                                </div>

                                @if (auth()->user() && auth()->user()->user_type === 'user')
                                    <!-- "Book Now" button to trigger the modal -->
                                    <div class="flex align-items-center">
                                        <form method="POST" action="{{ route('user.bookings') }}">
                                            @csrf
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="number-of-ticket flex justify-content-between align-items-center">
                                                    <span class="decrease-ticket">-</span>
                                                    <input type="number" name="companions" class="ticket-count"
                                                        value="1">
                                                    <span class="increase-ticket">+</span>
                                                </div>
                                                <div class="clear-ticket-count">Clear</div>
                                            </div>
                                    </div>
                                    <button type="button" class="btn gradient-bg" data-bs-toggle="modal"
                                        data-bs-target="#bookingModal">
                                        Book Now
                                    </button>

                                    <!-- Booking Modal -->
                                    <div class="modal fade" id="bookingModal" tabindex="-1"
                                        aria-labelledby="bookingModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="bookingModalLabel">Book Your Activity
                                                    </h5>
                                                    <!-- Bootstrap 5 close button -->
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Booking Form -->
                                                    {{-- <div class="d-flex align-items-center">
                                                            <div
                                                                class="number-of-ticket d-flex justify-content-between align-items-center">
                                                                <span class="decrease-ticket">-</span>
                                                                <input type="number" name="companions"
                                                                    class="ticket-count form-control" value="1"
                                                                    min="1" />
                                                                <span class="increase-ticket">+</span>
                                                            </div>

                                                            <div class="clear-ticket-count mt-2">Clear</div>
                                                        </div> --}}
                                                    <input type="hidden" name="venue_id"
                                                        value="{{ $venue->venue_id }}">
                                                    <input type="hidden" name="activity_id"
                                                        value="{{ $activity->activity_id }}">

                                                    <div class="form-group mt-3">
                                                        <label for="booking_date">Booking Date:</label>
                                                        <input type="date" name="booking_date" class="form-control"
                                                            required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="booking_time">Booking Time:</label>
                                                        <input type="time" name="booking_time" class="form-control"
                                                            required>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn dark"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn gradient-bg">Book
                                                            Now</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif (auth()->guest())
                                    <div class="flex align-items-center">
                                        <div class="number-of-ticket flex justify-content-between align-items-center">
                                            <span class="decrease-ticket">-</span>
                                            <input type="number" class="ticket-count" value="1" min="1" />
                                            <span class="increase-ticket">+</span>
                                        </div>

                                        <div class="clear-ticket-count">Clear</div>
                                    </div>

                                    <!-- Show "Book Now" button only for user_type "user" -->
                                    {{-- <input type="submit" class="btn gradient-bg" value="Book Now" /> --}}
                                    <a href="{{ route('login') }}" class="btn gradient-bg">Book Now</a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@endsection('content')
