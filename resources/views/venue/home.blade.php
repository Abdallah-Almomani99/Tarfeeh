@extends('layouts.venue-base')

@section('title', 'Venue Home-Page')

@section('content')
    <div class="page-header single-event-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">Profile</h1>
                    </header>
                </div>
            </div>
        </div>
    </div>

    <div class="container single-event-page">
        <div class="row">
            <!-- Sidebar with Profile Image and Details -->
            <div class="col-md-4">
                <div class="event-content-wrap text-center">
                    <img src="{{ asset('storage/uploads/' . $user->image) }}" alt="User Image"
                        class="rounded-circle img-thumbnail mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                    <h5 class="entry-title">{{ $user->user_name }}</h5>
                    <p class="text-muted">{{ $user->first_name }} {{ $user->last_name }}</p>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-8">
                <div class="event-content-wrap">
                    <header class="entry-header flex flex-wrap justify-content-between align-items-end">
                        <div class="single-event-heading">
                            <h2 class="entry-title">User Details</h2>
                        </div>
                    </header>
                    <div class="single-event-details">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Full Name</th>
                                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Birthday</th>
                                    <td>{{ $user->birthday }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Placeholder -->
        <div class="row">
            <div class="col-12">
                <div class="tabs">
                    <ul class="tabs-nav flex">
                        <li class="tab-nav flex justify-content-center align-items-center" data-target="#tab_details">
                            Details
                        </li>
                        <li class="tab-nav flex justify-content-center align-items-center" data-target="#tab_edit">
                            Edit Profile
                        </li>
                    </ul>
                    <div class="tabs-container">
                        <div id="tab_details" class="tab-content">
                            <p>Additional venue details or placeholders can go here.</p>
                        </div>
                        <div id="tab_edit" class="tab-content">
                            <form action="{{ route('venue.profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group mb-3">
                                    <label for="first_name">First Name</label>
                                    <input type="text" id="first_name" name="first_name" class="form-control"
                                        value="{{ $user->first_name }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control"
                                        value="{{ $user->last_name }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        value="{{ $user->email }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="text" id="phone" name="phone" class="form-control"
                                        value="{{ $user->phone }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="image">Profile Image</label>
                                    <input type="file" id="image" name="image" class="form-control">
                                </div>
                                <button type="submit" class="btn gradient-bg">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
