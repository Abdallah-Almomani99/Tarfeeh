@extends('layouts.base')

@section('title', 'Dashboard Bookings')
@section('booking-active', 'active')
<!-- Blank Start -->
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <div class="mb-2 d-flex justify-content-between align-items-center">
                <h6 class="m-2">Booking Table</h6>
                <a href="{{ route('users.create') }}" class="btn btn-primary m-2">
                    Add New Booking
                </a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Password</th>
                            <th scope="col">Point</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Abdallah</td>
                            <td>Almomani</td>
                            <td>Female</td>
                            <td>Abdalla@email.com</td>
                            <td>079-9999999</td>
                            <td>Password</td>
                            <td>1,204</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-success"><i class="bi bi-eye-fill"></i></button>
                                    <button type="button" class="btn btn-warning"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection('content')
<!-- Blank End -->
