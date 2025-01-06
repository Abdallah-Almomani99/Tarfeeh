@extends('layouts.user-base')

@section('title', 'Tarfeeh Venue-Page')

@section('content')

    <body class="events-list-page">
        <header class="site-header">
            <div class="page-header events-page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <header class="entry-header">
                                <h1 class="entry-title" id="category-title">{{ $category->name }}</h1>

                            </header>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- .site-header -->

        <form class="events-search" id="filters-form">
            <div class="container">
                <div class="row">

                    <!-- Tag Input -->
                    <div class="col-12 col-md-9">
                        <input class="rounded-pill" type="text" name="tag" id="tag" placeholder="Search Tag">
                    </div>

                    <!-- Search Button -->
                    <div class="col-12 col-md-3">
                        <button class="btn gradient-bg" type="button" id="apply-filters">Search Events</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="container">
            <div class="row events-list" id="venues-list">
                {{--  --}}
            </div>

            <div class="text-center mt-4">
                <button id="load-more" class="btn gradient-bg mb-5">Load More</button>
            </div>

        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const assetUrl = "{{ asset('storage') }}"; // Base URL for assets
                let allVenues = [];
                let offset = 0;
                const limit = 6;

                // Fetch venues based on user's location and pagination
                function fetchVenues(reset = false) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        const latitude = position.coords.latitude;
                        const longitude = position.coords.longitude;
                        const categoryId = window.location.pathname.split('/')
                            .pop(); // Get the category ID from the URL

                        fetch('/nearest-category', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                },
                                body: JSON.stringify({
                                    latitude,
                                    longitude,
                                    categoryId,
                                    offset,
                                    limit,
                                }),
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (reset) {
                                    allVenues = data;
                                    renderVenues(allVenues, true); // Reset and render
                                } else {
                                    allVenues = [...allVenues, ...data]; // Append new venues
                                    renderVenues(data, false); // Render more venues
                                }
                                offset += limit; // Update the offset for pagination
                            })
                            .catch(error => console.error('Error fetching venues:', error));
                    });
                }

                // Initial fetch of venues
                fetchVenues(true);

                // Load more venues on button click
                document.getElementById('load-more').addEventListener('click', function() {
                    fetchVenues(false);
                });

                // Apply filters based on selected type and tag
                document.getElementById('apply-filters').addEventListener('click', function() {
                    const tag = document.getElementById('tag').value.trim().toLowerCase();

                    navigator.geolocation.getCurrentPosition(function(position) {
                        const latitude = position.coords.latitude;
                        const longitude = position.coords.longitude;
                        const categoryId = window.location.pathname.split('/')
                            .pop();

                        fetch('/nearest-category', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                },
                                body: JSON.stringify({
                                    latitude,
                                    longitude,
                                    tag,
                                    categoryId,
                                    offset: 0, // Reset offset to 0 when filters are applied
                                    limit,
                                }),
                            })
                            .then(response => response.json())
                            .then(data => {
                                allVenues = data;
                                offset = limit; // Reset offset after applying filters
                                renderVenues(allVenues, true); // Render filtered venues
                            })
                            .catch(error => console.error('Error fetching venues:', error));
                    });
                });

                // Render the fetched venues on the page
                function renderVenues(venues, reset = false) {
                    const venuesList = document.getElementById('venues-list');
                    if (reset) venuesList.innerHTML = ''; // Clear the list when resetting

                    if (venues.length === 0 && reset) {
                        venuesList.innerHTML = '<p>No venues found matching your filters.</p>';
                        return;
                    }

                    venues.forEach(venue => {
                        const venueElement = document.createElement('div');
                        venueElement.classList.add('col-12', 'col-lg-4', 'single-event', 'visible');

                        venueElement.innerHTML = `
                            <figure class="events-thumbnail border border-secondary border-bottom-0">
                                <a href="/venue/${venue.venue_id}">
                                    <img style="height: 200px; width: 100%; object-fit: cover" 
                                         src="${assetUrl}/${venue.image ? venue.image : 'assets/user_assets/images/default.jpg'}" 
                                         alt="">
                                </a>
                            </figure>
                            <div class="event-content-wrap">
                                <header class="entry-header flex justify-content-between">
                                    <div>
                                        <h2 class="entry-title">
                                            <a href="/venue/${venue.venue_id}">${venue.name}</a>
                                        </h2>
                                        <div class="event-location">${venue.distance.toFixed(2)} km away</div>
                                        <div class="event-date">${formatTimeTo12Hour(venue.open_time)} - ${formatTimeTo12Hour(venue.close_time)}</div>
                                    </div>
                                </header>
                                <footer class="entry-footer">
                                    <a href="/venue/${venue.venue_id}">View Details</a>
                                </footer>
                            </div>
                        `;
                        venuesList.appendChild(venueElement);
                    });
                }
            });

            // Format time to 12-hour AM/PM format
            function formatTimeTo12Hour(time) {
                const [hours, minutes] = time.split(':');
                const ampm = hours >= 12 ? 'PM' : 'AM';
                const formattedHours = hours % 12 || 12; // Convert 0 to 12 for 12 AM
                return `${formattedHours}:${minutes} ${ampm}`;
            }
        </script>




    </body>

@endsection
