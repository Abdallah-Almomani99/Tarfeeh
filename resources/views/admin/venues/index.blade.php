@extends('layouts.base')

@section('title', 'Dashboard Venues')
@section('venue-active', 'active')
<!-- Blank Start -->
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <div class="mb-2 d-flex justify-content-between align-items-center">
                <h6 class="m-2">Venues Table</h6>
                <a href="{{ route('venues.create') }}" class="btn btn-primary m-2">
                    Add New Venues
                </a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Type</th>
                            <th scope="col">Longitude</th>
                            <th scope="col">Latitude</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Price Range</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Alien</td>
                            <td>Video game Center</td>
                            <td>Both</td>
                            <td>33.213123</td>
                            <td>33.214321</td>
                            <td>079-9999999</td>
                            <td>5 - 10$</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-success"><i class="bi bi-eye-fill"></i></button>
                                    <button type="button" class="btn btn-warning"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection('content')
<!-- Blank End -->
