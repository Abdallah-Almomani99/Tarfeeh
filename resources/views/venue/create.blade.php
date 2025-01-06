@extends('layouts.venue-base')
@section('title', 'Create Venue')

@section('content')
    <div class="page-header single-event-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">Fill Your Venue Details</h1>
                    </header>
                </div>
            </div>
        </div>
    </div>

    <div class="container single-event-page">
        <div class="row">
            <!-- Sidebar with Profile Image and Details -->

            <!-- Main Content -->
            <div class="col-md-12">
                <div class="event-content-wrap">
                    <header class="entry-header align-items-end">
                        <div class="single-event-heading">
                            {{-- @if ($errors->all())
                                <div>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li class="text-danger">
                                                {{ $error }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif --}}

                            <h2 class="entry-title center-the-title">Venue Details</h2>
                        </div>
                    </header>
                    <div class="mb-3">
                        <form action="{{ route('venue.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Venue Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ old('name') }}" name="name"
                                        placeholder="Venue Name">
                                </div>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Cover Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="image" accept="image/*">
                                </div>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ old('description') }}"
                                        name="description">
                                </div>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="male"
                                            value="male" {{ old('type') == 'male' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="male">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="female"
                                            value="female" {{ old('type') == 'female' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="female">
                                            Female
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="both"
                                            value="both" {{ old('type') == 'both' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="both">
                                            Both
                                        </label>
                                    </div>
                                    @error('type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </fieldset>

                            <div class="row mb-3">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="tel" class="form-control" name="phone" placeholder="Phone Number"
                                        pattern="07[7-9][0-9]{7}" required>
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="open_time" class="col-sm-2 col-form-label">Open</label>
                                <div class="col-sm-4">
                                    <input type="time" class="form-control" name="open_time"
                                        value="{{ old('open_time') }}">
                                </div>
                                <label for="close_time" class="col-sm-2 col-form-label">Close</label>
                                <div class="col-sm-4">
                                    <input type="time" class="form-control" name="close_time"
                                        value="{{ old('close_time') }}">
                                </div>
                                <div class="row col-ms-8">
                                    <div class="col-sm-6">
                                        @error('open_time')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        @error('close_time')
                                            <span class="text-danger ms-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- New input for multiple images -->
                            <div class="row mb-3">
                                <label for="images" class="col-sm-2 col-form-label">Images</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="images[]" accept="image/*"
                                        multiple>
                                </div>
                                @error('images')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label for="longitude" class="col-sm-2 col-form-label">Longitude</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="longitude"
                                        value="{{ old('longitude') }}">
                                </div>
                                <label for="latitude" class="col-sm-2 col-form-label">Latitude</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="latitude"
                                        value="{{ old('latitude') }}">
                                </div>
                                <div class="row col-ms-8">
                                    <div class="col-sm-6">
                                        @error('longitude')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        @error('latitude')
                                            <span class="text-danger ms-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 text-end">
                                <button type="button" class="btn dark-purple" data-bs-toggle="modal"
                                    data-bs-target="#tagsModal">
                                    Select Tags
                                </button>
                            </div>

                            <!-- Hidden Input to Store Selected Tags -->
                            <input type="hidden" name="tags[]" id="selectedTags">

                            <!-- Tags Modal -->
                            <div class="modal fade" id="tagsModal" tabindex="-1" aria-labelledby="tagsModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tagsModalLabel">Select Tags</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Search Bar -->
                                            <div class="mb-3">
                                                <input type="text" id="searchTags" class="form-control"
                                                    placeholder="Search tags...">
                                            </div>

                                            <!-- Tags Checklist -->
                                            <div id="tagsList">
                                                @foreach ($allTags as $tag)
                                                    <div class="form-check">
                                                        <input class="form-check-input tag-checkbox" type="checkbox"
                                                            value="{{ $tag->tag_id }}" id="tag-{{ $tag->tag_id }}">
                                                        <label class="form-check-label" for="tag-{{ $tag->tag_id }}">
                                                            {{ $tag->tag_name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn dark"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" id="saveTags" class="btn gradient-bg">Save
                                                Tags</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn gradient-bg w-100">Create New Venue</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchTags');
            const tagsList = document.getElementById('tagsList');
            const saveTagsButton = document.getElementById('saveTags');
            const selectedTagsInput = document.getElementById('selectedTags');

            // Search functionality
            searchInput.addEventListener('input', function() {
                const filter = searchInput.value.toLowerCase();
                const checkboxes = tagsList.querySelectorAll('.form-check');

                checkboxes.forEach((checkbox) => {
                    const label = checkbox.querySelector('.form-check-label').innerText
                        .toLowerCase();
                    checkbox.style.display = label.includes(filter) ? '' : 'none';
                });
            });

            // Save selected tags
            saveTagsButton.addEventListener('click', function() {
                const selectedTags = [];
                const checkboxes = tagsList.querySelectorAll('.tag-checkbox:checked');

                checkboxes.forEach((checkbox) => {
                    selectedTags.push(parseInt(checkbox.value, 10));
                });

                // Update hidden input field with selected tag IDs
                selectedTagsInput.value = JSON.stringify(selectedTags);

                const tagsModal = bootstrap.Modal.getInstance(document.getElementById('tagsModal'));
                tagsModal.hide();
            });
        });
    </script>

@endsection
