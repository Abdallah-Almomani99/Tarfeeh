@extends('layouts.base')
@section('title', 'Edit Venue')

@section('content')
    <div class="col-sm-12 col-xl-8">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Edit Venue</h6>
            <form action="{{ route('venues.update', $data->venue_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Venue</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="{{ $data->name }}"
                            placeholder="Venue Name">
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="description" value="{{ $data->description }}">
                    </div>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="male" value="male"
                                {{ $data->type == 'male' ? 'checked' : '' }}>
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="female" value="female"
                                {{ $data->type == 'female' ? 'checked' : '' }}>
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="both" value="both"
                                {{ $data->type == 'both' ? 'checked' : '' }}>
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
                            pattern="07[7-9][0-9]{7}" value="{{ $data->phone }}" required>
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="open_time" class="col-sm-2 col-form-label">Open</label>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" name="open_time" value="{{ $data->open_time }}">
                    </div>
                    <label for="close_time" class="col-sm-2 col-form-label">Close</label>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" name="close_time" value="{{ $data->close_time }}">
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

                <div class="row mb-3">
                    <label for="images" class="col-sm-2 col-form-label">Images</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="images[]" accept="image/*" multiple>
                    </div>
                    @error('images')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="longitude" class="col-sm-2 col-form-label">Longitude</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="longitude" value="{{ $data->longitude }}">
                    </div>
                    <label for="latitude" class="col-sm-2 col-form-label">Latitude</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="latitude" value="{{ $data->latitude }}">
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tagsModal">
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
                                                value="{{ $tag->tag_id }}" id="tag-{{ $tag->tag_id }}"
                                                {{ in_array($tag->tag_id, $attachedTags) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="tag-{{ $tag->tag_id }}">
                                                {{ $tag->tag_name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" id="saveTags" class="btn btn-primary">Save Tags</button>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">Update Venue</button>
            </form>
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
                    // Parse value to integer before pushing to the array
                    selectedTags.push(parseInt(checkbox.value, 10));
                });

                // Update hidden input field with selected tag IDs
                selectedTagsInput.value = JSON.stringify(selectedTags);

                console.log(selectedTags);
                // Close modal
                const tagsModal = bootstrap.Modal.getInstance(document.getElementById('tagsModal'));
                tagsModal.hide();
            });
        });
    </script>
@endsection
