@extends('layouts.base')

@section('title', 'Dashboard Contacts')
@section('contact-active', 'active')

@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <div class="mb-2 d-flex justify-content-between align-items-center">
                <h6 class="m-2">Message Table</h6>
            </div>
            <div class="table-responsive">
                <table class="table" id="usersTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Show</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $index => $message)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $message->user->user_name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->message }}</td>
                                <td><a href="{{ route('contacts.show', $message->message_id) }}"
                                        class="btn btn-outline-primary" data-bs-toggle="tooltip" title="View Message">
                                        <i class="bi bi-eye-fill"></i>
                                    </a></td>
                                <!-- Status Dropdown -->
                                <td class="text-center">
                                    <form action="{{ route('contacts.update-status', $message->message_id) }}"
                                        method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')

                                        @if ($message->status === 'Pending')
                                            <button type="submit" name="status" value="Working" class="btn btn-warning">
                                                Open
                                            </button>
                                        @elseif($message->status === 'Working')
                                            <button type="submit" name="status" value="Resolved" class="btn btn-primary">
                                                Working
                                            </button>
                                        @else
                                            {{ $message->status }}
                                        @endif
                                    </form>

                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No messages found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
