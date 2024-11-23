@extends('layouts.base')
@section('title', 'Create Venue')

@section('content')
    <div class="col-sm-12 col-xl-8">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Add New Venue</h6>
            <form>
                <div class="row mb-3">
                    <label for="venue_name" class="col-sm-3 col-form-label">Venue Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="venue_name">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="description" class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="description">
                    </div>
                </div>

                <fieldset class="col mb-3">
                    <legend class="col-form-label col-sm-3 pt-0">Gender</legend>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                            value="option1">
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                            value="option2">
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3"
                            value="option3">
                        <label class="form-check-label" for="inlineRadio3">Both</label>
                    </div>
                </fieldset>
                <div class="row mb-3">
                    <label for="inputLongitude" class="col-sm-3 col-form-label">Longitude</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputLongitude">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputLatitude" class="col-sm-3 col-form-label">Latitude</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputLatitude">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="first_name" class="col-sm-3 col-form-label">Phone Number</label>
                    <div class="col-sm-9">
                        <input type="tel" class="form-control" id="phone" placeholder="Phone Number"
                            pattern="07[7-9][0-9]{7}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPrice" class="col-sm-3 col-form-label">Price Range (0-50)</label>
                    <div class="col-sm-9">
                        <input type="range" min="0" max="50" step="5" class="form-control"
                            id="inputPrice">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">Add</button>
            </form>
        </div>
    </div>
@endsection
