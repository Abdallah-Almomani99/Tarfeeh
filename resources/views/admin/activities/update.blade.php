@extends('layouts.base')

@section('title', 'Update Activity')

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
            <h6 class="mb-4">Update Activity</h6>
            <form action="{{ route('activities.update', $activity->activity_id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="row mb-3">
                    <label for="venue_id" class="col-sm-2 col-form-label">Venue</label>
                    <div class="col-sm-10">
                        <select name="venue_id" class="form-control">
                            <option value="" disabled>Select a Venue</option>
                            @foreach ($venues as $venue)
                                <option value="{{ $venue->venue_id }}"
                                    {{ old('venue_id', $activity->venue_id) == $venue->venue_id ? 'selected' : '' }}>
                                    {{ $venue->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('venue_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Activity Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ old('name', $activity->name) }}" name="name"
                            placeholder="Activity Name">
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ old('description', $activity->description) }}"
                            name="description" placeholder="Activity Description">
                    </div>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="price" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ old('price', $activity->price) }}"
                            name="price" placeholder="Activity Price">
                    </div>
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                                {{ old('gender', $activity->gender) == 'male' ? 'checked' : '' }}>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female"
                                {{ old('gender', $activity->gender) == 'female' ? 'checked' : '' }}>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="all" value="all"
                                {{ old('gender', $activity->gender) == 'all' ? 'checked' : '' }}>
                            <label class="form-check-label" for="all">All</label>
                        </div>
                        @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </fieldset>

                <div class="row mb-3">
                    <label for="duration" class="col-sm-2 col-form-label">Duration (minutes)</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="duration"
                            value="{{ old('duration', $activity->duration) }}" min="1"
                            placeholder="Enter duration in minutes">
                    </div>
                    @error('duration')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="allowed_age" class="col-sm-2 col-form-label">Allowed Age</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" value="{{ old('allowed_age', $activity->allowed_age) }}"
                            name="allowed_age" placeholder="Minimum Allowed Age">
                    </div>
                    @error('allowed_age')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="capacity" class="col-sm-2 col-form-label">Capacity</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" value="{{ old('capacity', $activity->capacity) }}"
                            name="capacity" placeholder="Maximum Capacity">
                    </div>
                    @error('capacity')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Update Activity</button>
            </form>
        </div>
    </div>

@endsection
