@extends('layouts.base')

@section('title', 'Dashboard Users')
@section('user-active', 'active')

@section('admin-table', 'text-dark')
<!-- Blank Start -->
@section('content')

    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <div class="mb-2 d-flex justify-content-between align-items-center">
                <div class="d-flex">
                    <h6 class="m-2 "><a class="@yield ('admin-table')" href="{{ route('users.index') }}">User Table</a></h6>
                    <span>/</span>
                    <h6 class="m-2 "><a class="@yield ('admin-table')" href="{{ route('users.venue.index') }}">Venue
                            Table</a></h6>
                    <span>/</span>
                    <h6 class="m-2 "><a href="{{ route('users.admin.index') }}">Admin
                            Table</a></h6>
                </div>
                <a href="{{ route('users.create') }}" class="btn btn-primary m-2">
                    Add New Admin
                </a>
            </div>
            <div class="table-responsive">
                <table class="table" id="usersTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($data as $user)
                            <tr>
                                <th scope="row">{{ $counter++ }}</th>
                                <td>{{ $user['user_name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>{{ $user['phone'] }}</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <!-- View Button -->
                                        <a href="{{ route('users.show', $user['id']) }}" class="btn btn-outline-primary"
                                            data-bs-toggle="tooltip" title="View User">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                        <!-- Delete Form -->
                                        <form action="{{ route('users.destroy', $user['id']) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip"
                                                title="Delete User" onclick="confirmDelete(this)">
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
