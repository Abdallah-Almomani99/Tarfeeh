@extends('layouts.venue-base')
@section('title', 'Edit Activity')

@section('content')
    <div class="page-header single-event-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">Edit Activity Details</h1>
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
        <div class="row">
            <div class="col-md-12">
                <div class="event-content-wrap">
                    <header class="entry-header align-items-end">
                        <div class="single-event-heading">
                            <h2 class="entry-title center-the-title">Activity Details</h2>
                        </div>
                    </header>
                    <div class="mb-3">
                        <form action="{{ route('venue.update.activity', $activity->activity_id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Activity Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ old('name', $activity->name) }}"
                                        name="name" placeholder="Activity Name">
                                </div>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="description" rows="3">{{ old('description', $activity->description) }}</textarea>
                                </div>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label for="category" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select name="category_id" class="form-control">
                                        <option value="" disabled
                                            {{ old('category_id', $activity->category_id) ? '' : 'selected' }}>Select a
                                            Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->category_id }}"
                                                {{ old('category_id', $activity->category_id) == $category->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label for="price" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="price"
                                        value="{{ old('price', $activity->price) }}" placeholder="Price">
                                </div>
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                                <div class="col-sm-10">
                                    @foreach (['male', 'female', 'all'] as $gender)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                value="{{ $gender }}" id="{{ $gender }}"
                                                {{ old('gender', $activity->gender) == $gender ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="{{ $gender }}">{{ ucfirst($gender) }}</label>
                                        </div>
                                    @endforeach
                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </fieldset>

                            <div class="row mb-3">
                                <label for="duration" class="col-sm-2 col-form-label">Duration (minutes)</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="duration"
                                        value="{{ old('duration', $activity->duration) }}">
                                </div>
                                @error('duration')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label for="allowed_age" class="col-sm-2 col-form-label">Allowed Age</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="allowed_age"
                                        value="{{ old('allowed_age', $activity->allowed_age) }}">
                                </div>
                                @error('allowed_age')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label for="capacity" class="col-sm-2 col-form-label">Capacity</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="capacity"
                                        value="{{ old('capacity', $activity->capacity) }}">
                                </div>
                                @error('capacity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn gradient-bg w-100">Update Activity</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
