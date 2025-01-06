@extends('layouts.venue-base')

@section('title', 'Venue Bookings')

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
                <h1 class="display-4 my-5">Activity Bookings</h1>

                @foreach ($venue->activities as $activity)
                    <h2 class="my-3">{{ $activity->name }}</h2>
                    @if ($activity->bookings->count() > 0)
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Companions</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach ($activity->bookings as $booking)
                                    <tr>

                                        <td>{{ $counter++ }}</td>

                                        <td>{{ $booking->booking_date }}</td>
                                        <td>{{ $booking->booking_time }}</td>
                                        <td>{{ $booking->companions }}</td>
                                        {{-- <td>{{ $booking->status }}</td> --}}
                                        <td>
                                            @if ($booking->status == 'Pending')
                                                <form
                                                    action="{{ route('venue.update-booking-status', $booking->booking_id) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="Confirmed">
                                                    <button type="submit" class="btn gradient-bg">Confirm</button>
                                                </form>

                                                <form
                                                    action="{{ route('venue.update-booking-status', $booking->booking_id) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="Decline">
                                                    <button type="submit" class="btn dark">Decline</button>
                                                </form>
                                            @else
                                                <p>{{ $booking->status }}</p>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No bookings found for this activity.</p>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
