@extends('layouts.base')

@section('title', 'Venue Details')
@section('venue-active', 'active')

@section('content')
    <div class="bg-light rounded h-100 p-4">
        <div class="row">
            <!-- Sidebar with venue image carousel -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <!-- Image Carousel -->
                        @if ($venue->images->count() > 0)
                            <div id="venueImageCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($venue->images as $key => $image)
                                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                            <img src="{{ asset('storage/' . $image->image) }}"
                                                class="d-block w-100 rounded mb-3" alt="Venue Image">
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#venueImageCarousel"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#venueImageCarousel"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        @else
                            <img src="{{ asset('storage/default.png') }}" alt="Default Image" class="rounded mb-3"
                                style="width: 100%; height: auto;">
                        @endif

                        <h5 class="card-title mb-1">{{ $venue->name }}</h5>
                        <p class="text-muted">{{ $venue->description }}</p>
                    </div>
                </div>
            </div>


            <!-- Main content with venue details -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-3">Venue Details</h5>
                            <!-- Button to trigger the modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#tagsModal">
                                Tags
                            </button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="tagsModal" tabindex="-1" aria-labelledby="tagsModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tagsModalLabel">Venue Tags</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @forelse ($venue->tags as $tag)
                                            <span class="badge bg-primary me-1">{{ $tag->tag_name }}</span>
                                        @empty
                                            <span class="text-muted">No tags available</span>
                                        @endforelse
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $venue->name }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $venue->description }}</td>
                                </tr>
                                <tr>
                                    <th>Type</th>
                                    <td>{{ ucfirst($venue->type) }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $venue->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Opening Time</th>
                                    <td>{{ $venue->open_time }}</td>
                                </tr>
                                <tr>
                                    <th>Closing Time</th>
                                    <td>{{ $venue->close_time }}</td>
                                </tr>
                                <tr>
                                    <th>Location</th>
                                    <td>Lat: {{ $venue->latitude }}, Long: {{ $venue->longitude }}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $venue->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $venue->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
