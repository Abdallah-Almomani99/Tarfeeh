@extends('layouts.base')

@section('title', 'Activity Details')
@section('activity-active', 'active')

@section('content')
    <div class="bg-light rounded h-100 p-4">
        <div class="row">
            <!-- Main content with activity details -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Activity Details</h5>

                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $activity->name }}</td>
                                    <th></th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Venue</th>
                                    <td>{{ $activity->venue->name }}</td>
                                    <th></th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>{{ $activity->category->name }}</td>
                                    <th></th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $activity->description }}</td>
                                    <th></th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>{{ $activity->price }}</td>
                                    <th></th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>{{ ucfirst($activity->gender) }}</td>
                                    <th></th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Duration</th>
                                    <td>{{ $activity->duration }} minutes</td>
                                    <th></th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Allowed Age</th>
                                    <td>{{ $activity->allowed_age }} years</td>
                                    <th></th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Capacity</th>
                                    <td>{{ $activity->capacity }}</td>
                                    <th></th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $activity->created_at }}</td>
                                    <th>Updated At</th>
                                    <td>{{ $activity->updated_at }}</td>
                                </tr>

                            </tbody>
                        </table>

                        <!-- Action buttons for updating or deleting activity -->
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('activities.edit', $activity->activity_id) }}" class="btn btn-outline-warning"
                                data-bs-toggle="tooltip" title="Edit Activity">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>

                            <form action="{{ route('activities.destroy', $activity->activity_id) }}" method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this activity?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger" data-bs-toggle="tooltip"
                                    title="Delete Activity">
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
