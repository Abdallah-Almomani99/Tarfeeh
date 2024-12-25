@extends('layouts.base')

@section('title', 'Booking Details')
@section('booking-active', 'active')

@section('content')
    <div class="bg-light rounded h-100 p-4">
        <div class="row">
            <!-- Main content with booking details -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Booking Details</h5>

                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>User</th>
                                    <td>{{ $booking->user->first_name }} {{ $booking->user->last_name }}</td>
                                </tr>
                                <tr>
                                    <th>Venue</th>
                                    <td>{{ $booking->venue->name }}</td>
                                </tr>
                                <tr>
                                    <th>Activity</th>
                                    <td>{{ $booking->activity->name }}</td>
                                </tr>
                                <tr>
                                    <th>Booking Date</th>
                                    <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('F j, Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Booking Time</th>
                                    <td>{{ \Carbon\Carbon::parse($booking->booking_time)->format('h:i A') }}</td>
                                </tr>
                                <tr>
                                    <th>Companions</th>
                                    <td>{{ $booking->companions }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        {{-- @dd($booking->status) --}}
                                        @if ($booking->status == 'Confirmed')
                                            <span class="badge bg-success">Confirmed</span>
                                        @elseif($booking->status == 'Pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @else
                                            <span class="badge bg-danger">Cancelled</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $booking->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $booking->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Action buttons for updating or deleting booking -->
                        <div class="d-flex justify-content-start gap-2">
                            <a href="{{ route('bookings.edit', $booking->booking_id) }}" class="btn btn-outline-warning"
                                data-bs-toggle="tooltip" title="Edit Booking">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>

                            <form action="{{ route('bookings.destroy', $booking->booking_id) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Are you sure you want to delete this booking?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger" data-bs-toggle="tooltip"
                                    title="Delete Booking">
                                    <i class="bi bi-trash-fill"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
