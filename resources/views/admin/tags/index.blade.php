@extends('layouts.base')

@section('title', 'Dashboard Tags')
@section('tag-active', 'active')

<!-- Blank Start -->
@section('content')

    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <div class="mb-2 d-flex justify-content-between align-items-center">
                <h6 class="m-2">Tag Table</h6>
                <a href="{{ route('tags.create') }}" class="btn btn-primary m-2">
                    Add New Tag
                </a>
            </div>
            <div class="table-responsive">
                <table class="table" id="usersTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tag Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($data as $tag)
                            <tr>
                                <th scope="row">{{ $counter++ }}</th>
                                <td>{{ $tag->tag_name }}</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <!-- Edit Button -->
                                        <a href="{{ route('tags.edit', $tag->tag_id) }}" class="btn btn-outline-warning"
                                            data-bs-toggle="tooltip" title="Edit Tag">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <!-- Delete Form -->
                                        <form action="{{ route('tags.destroy', $tag->tag_id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip"
                                                title="Delete Tag" onclick="confirmDelete(this)">
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
