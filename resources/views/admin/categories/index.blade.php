@extends('layouts.base')

@section('title', 'Dashboard Categories')
@section('category-active', 'active')
<!-- Blank Start -->
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <div class="mb-2 d-flex justify-content-between align-items-center">
                <h6 class="m-2">Category Table</h6>
                <a href="{{ route('categories.create') }}" class="btn btn-primary m-2">
                    Add New Category
                </a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $counter++ }}</th>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if ($category->image)
                                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                                            style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <span>No Image</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <!-- Edit Button -->
                                        <a href="{{ route('categories.edit', $category->category_id) }}"
                                            class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Edit Tag">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <!-- Delete Form -->
                                        <form action="{{ route('categories.destroy', $category->category_id) }}"
                                            method="POST" class="d-inline">
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
