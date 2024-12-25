@extends('layouts.base')
@section('title', 'Update Category')

@section('content')
    <div class="col-sm-12 col-xl-8">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Update Category</h6>
            <form action="{{ route('categories.update', $category->category_id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH') {{-- Required for HTTP PUT method --}}

                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Category Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}"
                            placeholder="Enter Category Name">
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        {{-- Display the current image --}}
                        @if ($category->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $category->image) }}" alt="Current Image"
                                    class="img-fluid rounded" width="150">
                            </div>
                        @endif
                        <input type="file" class="form-control" name="image" accept="image/*">
                    </div>
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Update Category</button>
            </form>
        </div>
    </div>
@endsection
