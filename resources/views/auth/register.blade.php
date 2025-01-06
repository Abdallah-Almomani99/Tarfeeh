<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login 10</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="{{ asset('assets/login_assets/css/style.css') }}" />
</head>

<body class="img js-fullheight" style="background-image: url({{ asset('assets/login_assets/images/bg.jpg') }}">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-8">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Register</h3>
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- Name -->
                            <div class="d-flex justify-content-between">
                                <div class="form-group w-25 mr-5">
                                    <x-input-label for="user_name" :value="__('Name')" />
                                    <x-text-input id="user_name" class="form-control" type="text" name="user_name"
                                        :value="old('user_name')" required autofocus autocomplete="user_name" />
                                    <x-input-error :messages="$errors->get('user_name')" class="mt-2" />
                                </div>

                                <!-- First Name -->
                                <div class="form-group w-25 mr-5">
                                    <x-input-label for="first_name" :value="__('First Name')" />
                                    <x-text-input id="first_name" class="form-control" type="text" name="first_name"
                                        :value="old('first_name')" required autofocus autocomplete="given-name" />
                                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                                </div>

                                <!-- Last Name -->
                                <div class="form-group w-25">
                                    <x-input-label for="last_name" :value="__('Last Name')" />
                                    <x-text-input id="last_name" class="form-control" type="text" name="last_name"
                                        :value="old('last_name')" required autocomplete="family-name" />
                                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                                </div>
                            </div>

                            <div class="d-flex">
                                <!-- Gender -->
                                <div class="form-group w-50 mr-3">
                                    <x-input-label for="gender" :value="__('Gender')" />
                                    <select id="gender" name="gender"
                                        class="form-control border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                        <option value="" class="text-light bg-dark" disabled selected>
                                            {{ __('Select Gender') }}</option>
                                        <option value="male" class="text-light bg-dark"
                                            {{ old('gender') == 'male' ? 'selected' : '' }}>
                                            {{ __('Male') }}</option>
                                        <option value="female" class="text-light bg-dark"
                                            {{ old('gender') == 'female' ? 'selected' : '' }}>
                                            {{ __('Female') }}</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                </div>

                                <!-- Birthday -->
                                <div class="form-group w-50">
                                    <x-input-label for="birthday" :value="__('Birthday')" />
                                    <x-text-input id="birthday" class="form-control" type="date" name="birthday"
                                        :value="old('birthday')" required autocomplete="bday" />
                                    <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
                                </div>
                            </div>
                            <div class="d-flex">
                                <!-- Phone -->
                                <div class="form-group w-50 mr-3">
                                    <x-input-label for="phone" :value="__('Phone')" />
                                    <x-text-input id="phone" class="form-control" type="text" name="phone"
                                        :value="old('phone')" required autocomplete="tel" />
                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                </div>


                                <!-- Email Address -->
                                <div class="form-group w-50">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="form-control" type="email" name="email"
                                        :value="old('email')" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>
                            <div class="d-flex ">
                                <!-- Password -->
                                <div class="form-group w-50 mr-3">
                                    <x-input-label for="password" :value="__('Password')" />

                                    <x-text-input id="password" class="form-control" type="password" name="password"
                                        required autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>


                                <!-- Confirm Password -->
                                <div class="form-group w-50">
                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                    <x-text-input id="password_confirmation" class="form-control" type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                                <div class="text-center d-flex align-items-center">
                                    <a href="{{ route('login') }}">Already have an account</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <x-primary-button class="form-control btn btn-primary submit px-3">
                                    {{ __('Register') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('assets/login_assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/login_assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/login_assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/login_assets/js/main.js') }}"></script>
</body>

</html>
{{-- 
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="user_name" :value="__('Name')" />
            <x-text-input id="user_name" class="block mt-1 w-full" type="text" name="user_name"
                :value="old('user_name')" required autofocus autocomplete="user_name" />
            <x-input-error :messages="$errors->get('user_name')" class="mt-2" />
        </div>

        <!-- First Name -->
        <div>
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                :value="old('first_name')" required autofocus autocomplete="given-name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="mt-4">
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                :value="old('last_name')" required autocomplete="family-name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Gender -->
        <div class="mt-4">
            <x-input-label for="gender" :value="__('Gender')" />
            <select id="gender" name="gender"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="" disabled selected>{{ __('Select Gender') }}</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>{{ __('Male') }}</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>{{ __('Female') }}</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Birthday -->
        <div class="mt-4">
            <x-input-label for="birthday" :value="__('Birthday')" />
            <x-text-input id="birthday" class="block mt-1 w-full" type="date" name="birthday" :value="old('birthday')"
                required autocomplete="bday" />
            <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                required autocomplete="tel" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>



        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
