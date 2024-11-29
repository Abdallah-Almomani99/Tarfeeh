<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tarfeeh') }} Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('layouts.partials.head')
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <!-- Sign In -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <a href="/login" class="navbar-brand mx-4 mb-3 " style="font-family: Nunito, sans-serif;">
                            <h1 class="text-primary text-center d-flex display-2 fw-bold"><img class="pb-2"
                                    width="56px" height="82px" src="{{ asset('assets/img/Tarfeh.png') }}"
                                    alt=""><b>arfeeh</b></h1>
                        </a>

                        <h3 class="text-center">Sign In</h3>


                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.partials.scripts')
</body>

</html>
