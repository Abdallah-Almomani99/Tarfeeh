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
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Message</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $index => $message)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $message->user->user_name }}</td>
                                <td>{{ $message->message }}</td>

                                <!-- Status Dropdown -->
                                <td class="text-center">
                                    <form action="{{ route('contacts.update-status', $message->message_id) }}"
                                        method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" class="form-select" onchange="this.form.submit()">
                                            <option value="Pending" {{ $message->status === 'Pending' ? 'selected' : '' }}>
                                                Pending
                                            </option>
                                            <option value="Resolved"
                                                {{ $message->status === 'Resolved' ? 'selected' : '' }}>
                                                Resolved
                                            </option>
                                        </select>
                                    </form>
                                </td>

                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <!-- View Button -->
                                        <a href="{{ route('contacts.show', $message->message_id) }}"
                                            class="btn btn-outline-primary" data-bs-toggle="tooltip" title="View Message">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                        <!-- Delete Form -->
                                        <form action="{{ route('contacts.destroy', $message->message_id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" data-bs-toggle="tooltip"
                                                title="Delete Message">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </div>
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
