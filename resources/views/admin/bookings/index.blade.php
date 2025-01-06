@extends('layouts.base')

@section('title', 'Dashboard Bookings')
@section('booking-active', 'active')

<!-- Blank Start -->
@section('content')

    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <div class="mb-2 d-flex justify-content-between align-items-center">
                <h6 class="m-2">Booking Table</h6>
                {{-- <a href="{{ route('bookings.create') }}" class="btn btn-primary m-2">
                    Add New Booking
                </a> --}}
            </div>
            <div class="table-responsive">
                <table class="table" id="usersTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User</th>
                            <th scope="col">Venue</th>
                            <th scope="col">Activity</th>
                            <th scope="col">Companions</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col">Show</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($bookings as $booking)
                            <tr>
                                <th scope="row">{{ $counter++ }}</th>
                                <td>{{ $booking->user->first_name }} {{ $booking->user->last_name }}</td>
                                <td>{{ $booking->venue->name }}</td>
                                <td>{{ $booking->activity->name }}</td>
                                <td class="text-center">{{ $booking->companions }}</td>

                                <!-- Status Dropdown -->
                                <td class="text-center">

                                    {{-- {{ $booking->status }} --}}
                                    <form action="{{ route('bookings.update-status', $booking->booking_id) }}"
                                        method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" class="form-select" onchange="this.form.submit()">
                                            <option value="Pending" {{ $booking->status === 'Pending' ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="Confirmed"
                                                {{ $booking->status === 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            <option value="Decline" {{ $booking->status === 'Decline' ? 'selected' : '' }}>
                                                Decline</option>
                                            <option value="Cancelled"
                                                {{ $booking->status === 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </form>
                                </td>


                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <!-- View Button -->
                                        <a href="{{ route('bookings.show', $booking->booking_id) }}"
                                            class="btn btn-outline-primary" data-bs-toggle="tooltip" title="View Booking">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                        {{-- <!-- Edit Button -->
                                        <a href="{{ route('bookings.edit', $booking->booking_id) }}"
                                            class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Edit Booking">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <!-- Delete Form -->
                                        <form action="{{ route('bookings.destroy', $booking->booking_id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip"
                                                title="Delete Booking" onclick="confirmDelete(this)">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form> --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection('content')
<!-- Blank End -->
