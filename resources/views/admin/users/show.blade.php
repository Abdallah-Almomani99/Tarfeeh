@extends('layouts.base')

@section('title', 'Dashboard Users')
@section('user-active', 'active')

@section('content')


    <div class="bg-light rounded h-100 p-4">
        <div class="row">
            <!-- Sidebar with profile image and basic details -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="{{ asset('assets/img/download.jfif') }}" alt="User Image"
                            class="rounded-circle img-thumbnail mb-3" style="width: 150px; height: 150px;">
                        <h5 class="card-title mb-1">{{ $data->user_name }}</h5>
                        <p class="text-muted">{{ $data->first_name }} {{ $data->last_name }}</p>
                        <p class="text-muted">Bay Area, San Francisco, CA</p>
                    </div>
                </div>

                <!-- Links -->
            </div>

            <!-- Main content with user details -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">User Details</h5>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Full Name</th>
                                    <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $data->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $data->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Birthday</th>
                                    <td>{{ $data->birthday }}</td>
                                </tr>
                                <tr>
                                    <th>Points</th>
                                    <td>{{ $data->point }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $data->status }}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $data->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $data->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Placeholder for additional content -->

            </div>
        </div>
    </div>




@endsection('content')
