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

    <div class="container single-event-page">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-end">
                    <a class="btn gradient-bg " href="{{ route('venue.create.activity') }}">Create Activity</a>
                </div>
                <div class="tabs">
                    <!-- Tabs Navigation -->
                    <ul class="tabs-nav flex">
                        @foreach ($venue->activities as $key => $activity)
                            <li class="tab-nav flex justify-content-center align-items-center"
                                data-target="#tab_activity_{{ $activity->activity_id }}">
                                {{ $activity->name }}
                            </li>
                        @endforeach
                    </ul>

                    <!-- Tabs Content -->
                    <div class="tabs-container mb-5">
                        @foreach ($venue->activities as $key => $activity)
                            <div id="tab_activity_{{ $activity->activity_id }}" class="tab-content">
                                <div class="flex flex-wrap justify-content-between">
                                    <div class="single-event-details w-100">
                                        <!-- Display Activity Details -->
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Field</th>
                                                        <th>Details</th>
                                                        <th>Field</th>
                                                        <th>Details</th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Name</td>
                                                        <td>{{ $activity->name }}</td>
                                                        <td>Description</td>
                                                        <td>{{ $activity->description }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Category</td>
                                                        <td>{{ $activity->category->name }}</td>
                                                        <td>Price</td>
                                                        <td>${{ $activity->price }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Gender</td>
                                                        <td>{{ ucfirst($activity->gender) }}</td>
                                                        <td>Duration</td>
                                                        <td>{{ $activity->duration }} minutes</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Allowed Age</td>
                                                        <td>{{ $activity->allowed_age }} years and above</td>
                                                        <td>Capacity</td>
                                                        <td>{{ $activity->capacity }} people</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="d-flex justify-content-end">

                                            <a href="{{ route('venue.edit.activity', $activity->activity_id) }}"
                                                class="btn dark-purple">Edit</a>
                                            <form action="{{ route('venue.activity.destroy', $activity->activity_id) }}"
                                                method="POST" class="ml-3">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" title="Delete Booking" onclick="confirmDelete(this)"
                                                    class="btn dark">Delete</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
