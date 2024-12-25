@extends('layouts.base')
@section('title', 'Update Tag')

@section('content')
    <div class="col-sm-12 col-xl-8">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Update Tag</h6>
            <form action="{{ route('tags.update', $tag->tag_id) }}" method="POST">
                @csrf
                @method('PATCH') {{-- Required for HTTP PUT method --}}
                <div class="row mb-3">
                    <label for="tag_name" class="col-sm-2 col-form-label">Tag Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tag_name"
                            value="{{ old('tag_name', $tag->tag_name) }}" placeholder="Enter Tag Name">
                        @error('tag_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">Update Tag</button>
            </form>
        </div>
    </div>
@endsection
