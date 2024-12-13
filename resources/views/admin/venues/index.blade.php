@extends('layouts.base')

@section('title', 'Dashboard Venues')
@section('venue-active', 'active')
<!-- Blank Start -->
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <div class="mb-2 d-flex justify-content-between align-items-center">
                <h6 class="m-2">Venues Table</h6>
                <a href="{{ route('venues.create') }}" class="btn btn-primary m-2">
                    Add New Venues
                </a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Type</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Longitude</th>
                            <th scope="col">Latitude</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($data as $venue)
                            <tr>
                                <th scope="row">{{ $counter++ }}</th>
                                <td>{{ $venue['name'] }}</td>
                                <td>{{ $venue['description'] }}</td>
                                <td>{{ $venue['type'] }}</td>
                                <td>{{ $venue['phone'] }}</td>
                                <td>{{ $venue['longitude'] }}</td>
                                <td>{{ $venue['latitude'] }}</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <!-- View Button -->
                                        <a href="{{ route('venues.show', $venue->venue_id) }}"
                                            class="btn btn-outline-primary" data-bs-toggle="tooltip" title="View Venue">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                        <!-- Edit Button -->
                                        <a href="{{ route('venues.edit', $venue->venue_id) }}"
                                            class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Edit Venue">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <!-- Delete Form -->
                                        <form action="{{ route('venues.destroy', $venue->venue_id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip"
                                                title="Delete Venue" onclick="confirmDelete(this)">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection('content')
<!-- Blank End -->
