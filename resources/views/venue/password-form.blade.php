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
    <div class="container">
        <div class="row elements-wrap">
            <div class="col-12">
                <header class="entry-header elements-heading">
                    <h2 class="entry-title pb-5 display-4">Reset Password</h2>
                </header>
                <div class="entry-content elements-container">
                    <div class="row d-flex justify-content-center mb-3">
                        <div class="col-12 col-md-8 ">
                            <div class="bg-light rounded h-100 p-4">
                                {{-- <h6 class="mb-4">Update Your Password</h6> --}}
                                <p class="text-muted mb-4">
                                    Ensure your account is using a long, random password to stay secure.
                                </p>
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
                                <form action="{{ route('password.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <!-- Current Password -->
                                    <div class="row mb-3">
                                        <label for="update_password_current_password"
                                            class="col-sm-3 col-form-label">Current
                                            Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control"
                                                id="update_password_current_password" name="current_password"
                                                autocomplete="current-password">
                                            @error('current_password', 'updatePassword')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- New Password -->
                                    <div class="row mb-3">
                                        <label for="update_password_password" class="col-sm-3 col-form-label">New
                                            Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="update_password_password"
                                                name="password" autocomplete="new-password">
                                        </div>
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="row mb-3">
                                        <label for="update_password_password_confirmation"
                                            class="col-sm-3 col-form-label">Confirm
                                            Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control"
                                                id="update_password_password_confirmation" name="password_confirmation"
                                                autocomplete="new-password">
                                            @error('password', 'updatePassword')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            @error('password_confirmation', 'updatePassword')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn gradient-bg w-100">Save</button>
                                        </div>
                                    </div>

                                    <!-- Success Message -->
                                    @if (session('status') === 'password-updated')
                                        <div class="mt-3 text-center text-success">
                                            {{ __('Password updated successfully.') }}
                                        </div>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
