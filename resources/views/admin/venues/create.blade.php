@extends('layouts.base')
@section('title', 'Create Venue')

@section('content')
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
    @endif --}}

    <div class="col-sm-12 col-xl-8">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Add New Venue</h6>
            <form action="{{ route('venues.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Venue</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ old('name') }}" name="name"
                            placeholder="Venue Name">
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ old('description') }}" name="description">
                    </div>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="male" value="male"
                                {{ old('type') == 'male' ? 'checked' : '' }}>
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="female" value="female"
                                {{ old('type') == 'female' ? 'checked' : '' }}>
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="both" value="both"
                                {{ old('type') == 'both' ? 'checked' : '' }}>
                            <label class="form-check-label" for="both">
                                Both
                            </label>
                        </div>
                        @error('type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </fieldset>


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

                <div class="row mb-3">
                    <label for="open_time" class="col-sm-2 col-form-label">Open</label>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" name="open_time" value="{{ old('open_time') }}">
                    </div>
                    <label for="close_time" class="col-sm-2 col-form-label">Close</label>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" name="close_time" value="{{ old('close_time') }}">
                    </div>
                    <div class="row col-ms-8">
                        <div class="col-sm-6">
                            @error('open_time')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            @error('close_time')
                                <span class="text-danger ms-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="longitude" class="col-sm-2 col-form-label">Longitude</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="longitude" value="{{ old('longitude') }}">
                    </div>
                    <label for="latitude" class="col-sm-2 col-form-label">Latitude</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="latitude" value="{{ old('latitude') }}">
                    </div>
                    <div class="row col-ms-8">
                        <div class="col-sm-6">
                            @error('longitude')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            @error('latitude')
                                <span class="text-danger ms-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary w-100">Create New Venu</button>
            </form>
        </div>
    </div>
@endsection
