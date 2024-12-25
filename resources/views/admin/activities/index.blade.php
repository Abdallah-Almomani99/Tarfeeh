@extends('layouts.base')

@section('title', 'Dashboard Activities')
@section('activity-active', 'active')
<!-- Blank Start -->
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <div class="mb-2 d-flex justify-content-between align-items-center">
                <h6 class="m-2">Activity Table</h6>
                <a href="{{ route('activities.create') }}" class="btn btn-primary m-2">
                    Add New Activity
                </a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Activity Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Allowed Age</th>
                            <th scope="col">Capacity</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($data as $activity)
                            <tr>
                                <th scope="row">{{ $counter++ }}</th>
                                <td>{{ $activity->name }}</td>
                                <td>{{ $activity->description }}</td>
                                <td>{{ $activity->price }}</td>
                                <td>{{ ucfirst($activity->gender) }}</td>
                                <td>{{ $activity->duration }}</td>
                                <td>{{ $activity->allowed_age }}</td>
                                <td>{{ $activity->capacity }}</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <!-- View Button -->
                                        <a href="{{ route('activities.show', $activity->activity_id) }}"
                                            class="btn btn-outline-primary" data-bs-toggle="tooltip" title="View Venue">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                        <!-- Edit Button -->
                                        <a href="{{ route('activities.edit', $activity->activity_id) }}"
                                            class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Edit Venue">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <!-- Delete Form -->
                                        <form action="{{ route('activities.destroy', $activity->activity_id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip"
                                                title="Delete Venue" onclick="confirmDelete(this)">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
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
