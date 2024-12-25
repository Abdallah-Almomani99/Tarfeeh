@extends('layouts.base')
@section('title', 'Create Category')

@section('content')
    <div class="col-sm-12 col-xl-8">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Add New Category</h6>
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Category Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                            placeholder="Enter Category Name">
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="image" accept="image/*">
                    </div>
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Create New Category</button>
            </form>
        </div>
    </div>
@endsection
