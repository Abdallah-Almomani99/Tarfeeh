@extends('layouts.base')

@section('title', 'Dashboard Contacts')
@section('contact-active', 'active')

@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <div class="mb-2 d-flex justify-content-between align-items-center">
                {{-- <h6 class="m-2">Contact Case</h6> --}}
                <h1>Message Details</h1>
            </div>

            <div class="card">
                <div class="card-header">
                    <strong>{{ $message->subject }}</strong>
                </div>
                <div class="card-body">
                    <p><strong>From:</strong> {{ $message->email }}</p>
                    <p><strong>Status:</strong> {{ $message->status }}</p>
                    <p><strong>Message:</strong></p>
                    <p>{{ $message->message }}</p>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('contacts.index') }}" class="btn btn-secondary mt-3 ">Back to Contacts</a>
            </div>
        </div>
    </div>
@endsection
