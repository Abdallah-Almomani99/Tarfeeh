@extends('layouts.venue-base')

@section('title', 'Venue Profile-Page')

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

        <!-- Additional Placeholder -->
        <div class="row">
            <div class="col-12 mb-5">
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
                            <div class="row">
                                <!-- Sidebar with Profile Image and Details -->
                                <div class="col-md-4">
                                    <div class="event-content-wrap text-center">
                                        
                                        <img src="{{ $user->image !== 'default.png' ? asset('storage/' . $user->image) : asset('storage/uploads/default.png') }}"
                                            alt="User Image" class="rounded-circle img-thumbnail mb-3"
                                            style="width: 150px; height: 150px; object-fit: cover;">
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
                                                        <th>User Name</th>
                                                        <td>{{ $user->user_name }}</td>
                                                    </tr>
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
                        </div>
                        <div id="tab_edit" class="tab-content">
                            <form action="{{ route('venue.profile.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="bg-light rounded h-100 p-4">

                                    <!-- User Name Input -->
                                    <div class="row mb-3">
                                        <label for="user_name" class="col-sm-2 col-form-label">User Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="user_name"
                                                value="{{ $user->user_name }}">
                                            @error('user_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- First Name & Last Name -->
                                    <div class="row mb-3">
                                        <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="first_name"
                                                value="{{ $user->first_name }}">
                                        </div>

                                        <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="last_name"
                                                value="{{ $user->last_name }}">
                                        </div>
                                    </div>

                                    <div class="row col-ms-8">
                                        <div class="col-sm-6">
                                            @error('first_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            @error('last_name')
                                                <span class="text-danger ms-2">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Gender -->
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="male"
                                                    value="male" {{ $user->gender == 'male' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="male">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="female"
                                                    value="female" {{ $user->gender == 'female' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="female">
                                                    Female
                                                </label>
                                            </div>
                                            @error('gender')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </fieldset>

                                    <!-- Email -->
                                    <div class="row mb-3">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email"
                                                value="{{ $user->email }}">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Birthday -->
                                    <div class="row mb-3">
                                        <label for="birthday" class="col-sm-2 col-form-label">Birthday</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="birthday"
                                                value="{{ auth()->user()->birthday }}">
                                            @error('birthday')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    <div class="row mb-3">
                                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="tel" class="form-control" name="phone"
                                                placeholder="Phone Number" pattern="07[7-9][0-9]{7}"
                                                value="{{ $user->phone }}" required>
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Profile Image Upload -->
                                    <div class="row mb-3">
                                        <label for="image" class="col-sm-2 col-form-label">Profile Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="image">
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            @if ($user->image)
                                                <img src="{{ asset('storage/' . $user->image) }}" alt="Current Image"
                                                    class="img-fluid mt-2" style="width: 100px;">
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Reset Password -->
                                    <div class="row mb-3">
                                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <!-- Reset Password Button -->
                                            <a href="{{ route('venue.profile.passEdit') }}" class="btn dark w-100">Reset
                                                Password</a>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn gradient-bg w-100">Save Changes</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
