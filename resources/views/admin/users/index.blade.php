@extends('layouts.base')

@section('title', 'Dashboard Users')
@section('user-active', 'active')

@section('user-table', 'text-dark')


<!-- Blank Start -->
@section('content')


    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <div class="mb-2 d-flex justify-content-between align-items-center">
                <div class="d-flex">
                    <h6 class="m-2 "><a href="{{ route('users.index') }}">User Table</a></h6>
                    <span>/</span>
                    <h6 class="m-2"><a class="@yield ('user-table')" href="{{ route('users.venue.index') }}">Venue
                            Table</a></h6>
                    <span>/</span>
                    <h6 class="m-2"><a class="@yield ('user-table')" href="{{ route('users.admin.index') }}">Admin
                            Table</a></h6>
                </div>

            </div>
            <div class="table-responsive">
                <table class="table" id="usersTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Status</th>
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

                                <td class="text-center">
                                    <form action="{{ route('users.toggle-status', $user->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="btn btn-sm {{ $user->status === 'active' ? 'btn-success' : 'btn-danger' }}">
                                            {{ $user->status === 'active' ? 'Activate' : 'Deactivate' }}
                                        </button>
                                    </form>
                                </td>


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

    <script>
        fetch(`/admin/users/${id}/toggle-status`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({
                    status: newStatus
                }),
            })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    // Update button text and styling on success
                    button.textContent = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);
                    button.classList.toggle('btn-success', newStatus === 'active');
                    button.classList.toggle('btn-secondary', newStatus === 'inactive');
                } else {
                    alert('Failed to update status. Please try again.');
                }
            })
            .catch((error) => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
    </script>

@endsection('content')
<!-- Blank End -->
