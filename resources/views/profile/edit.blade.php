@extends('layouts.base')
@section('title', 'Edit Profile')

@section('content')
    <div class="col-sm-12 col-xl-8">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Edit Profile</h6>
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <!-- User Name Input -->
                <div class="row mb-3">
                    <label for="user_name" class="col-sm-2 col-form-label">User Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="user_name" value="{{ auth()->user()->user_name }}">
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
                            value="{{ auth()->user()->first_name }}">
                    </div>

                    <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="last_name" value="{{ auth()->user()->last_name }}">
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
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                                {{ auth()->user()->gender == 'male' ? 'checked' : '' }}>
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female"
                                {{ auth()->user()->gender == 'female' ? 'checked' : '' }}>
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>
                        @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </fieldset>

                <!-- Birthday -->
                <div class="row mb-3">
                    <label for="birthday" class="col-sm-2 col-form-label">Birthday</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="birthday" value="{{ auth()->user()->birthday }}">
                        @error('birthday')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Email -->
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>




                <!-- Phone -->
                <div class="row mb-3">
                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" name="phone" placeholder="Phone Number"
                            pattern="07[7-9][0-9]{7}" value="{{ auth()->user()->phone }}" required>
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
                        @if (auth()->user()->image)
                            <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="Current Image"
                                class="img-fluid mt-2" style="width: 100px;">
                        @endif
                    </div>
                </div>
                <!-- Password -->
                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="col-sm-10">
                        <!-- Reset Password Button -->
                        <a href="{{ route('profile.passEdit') }}" class="btn btn-secondary w-100">Reset
                            Password</a>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Update Profile</button>
            </form>
        </div>
    </div>
@endsection
