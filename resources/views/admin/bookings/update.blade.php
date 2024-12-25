@extends('layouts.base')

@section('title', 'Update Booking')

@section('content')

    <div class="col-sm-12 col-xl-8">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Update Booking</h6>
            <form action="{{ route('bookings.update', $booking->booking_id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="row mb-3">
                    <label for="user_id" class="col-sm-2 col-form-label">User</label>
                    <div class="col-sm-10">
                        <select name="user_id" class="form-control">
                            <option value="" disabled>Select a User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $booking->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->user_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="venue_id" class="col-sm-2 col-form-label">Venue</label>
                    <div class="col-sm-10">
                        <select name="venue_id" class="form-control">
                            <option value="" disabled>Select a Venue</option>
                            @foreach ($venues as $venue)
                                <option value="{{ $venue->venue_id }}"
                                    {{ $booking->venue_id == $venue->venue_id ? 'selected' : '' }}>
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
                    <label for="activity_id" class="col-sm-2 col-form-label">Activity</label>
                    <div class="col-sm-10">
                        <select name="activity_id" class="form-control">
                            <option value="" disabled>Select an Activity</option>
                            @foreach ($activities as $activity)
                                <option value="{{ $activity->activity_id }}"
                                    {{ $booking->activity_id == $activity->activity_id ? 'selected' : '' }}>
                                    {{ $activity->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('activity_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="booking_date" class="col-sm-2 col-form-label">Booking Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="booking_date"
                            value="{{ old('booking_date', $booking->booking_date) }}">
                    </div>
                    @error('booking_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="booking_time" class="col-sm-2 col-form-label">Booking Time</label>
                    <div class="col-sm-10">
                        <input type="time" class="form-control" name="booking_time"
                            value="{{ old('booking_time', $booking->booking_time) }}">
                    </div>
                    @error('booking_time')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="companions" class="col-sm-2 col-form-label">Companions</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="companions"
                            value="{{ old('companions', $booking->companions) }}" min="0"
                            placeholder="Number of companions">
                    </div>
                    @error('companions')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select name="status" class="form-control">
                            <option value="" disabled>Select a Status</option>
                            <option value="Pending" {{ $booking->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Confirmed" {{ $booking->status == 'Confirmed' ? 'selected' : '' }}>Confirmed
                            </option>
                            <option value="Cancelled" {{ $booking->status == 'Cancelled' ? 'selected' : '' }}>Cancelled
                            </option>
                        </select>
                    </div>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Update Booking</button>
            </form>
        </div>
    </div>

@endsection
