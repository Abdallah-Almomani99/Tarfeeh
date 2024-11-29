@extends('layouts.base')
@section('title', 'Create User')

@section('content')
    <div class="col-sm-12 col-xl-8">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Add New User</h6>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                {{-- @if ($errors->all())
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
 --}}

                <div class="row mb-3">
                    <label for="user_name" class="col-sm-2 col-form-label">User Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="user_name" value="{{ old('user_name') }}">
                        @error('user_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
                    </div>
                    <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
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
                </div>

                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                                {{ old('gender') == 'male' ? 'checked' : '' }}>
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female"
                                {{ old('gender') == 'female' ? 'checked' : '' }}>
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>
                        @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </fieldset>

                <div class="row mb-3">
                    <label for="birthday" class="col-sm-2 col-form-label">Birthday</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="birthday" value="{{ old('birthday') }}">
                        @error('birthday')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" name="phone" placeholder="Phone Number"
                            pattern="07[7-9][0-9]{7}" value="{{ old('phone') }}" required>
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Add</button>
            </form>
        </div>
    </div>
@endsection
