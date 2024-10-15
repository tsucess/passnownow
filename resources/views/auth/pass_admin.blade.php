<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Register Here</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Fontawesome icons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/css/fontawesome.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/fonts/css/solid.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/fonts/css/brands.css') }} ">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- SWIPER JS  --}}
    <link rel="stylesheet" href="{{ 'assets/css/swiper-bundle.min.css' }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsiveness.css') }}">

</head>

<body class="">
    <main class="container-fluid wrapper container__register">
        <div class="row  m-0 p-0">
            <div class="col-12 col-md-6 side-bg">
                <div class="content">
                        <h1>Take control of your
                            Education Anytime, Anywhere
                        </h1>
                        <p>
                            Super simple self studying, peer to peer collaborative learning both for teachers and students
                        </p>
                </div>
            </div>
            <div class="col-12 col-md-6 form__section">
                <div class="row m-0 p-0">
                    <div class="col-12 p-0 m-0 p-2 navigate-back">
                        <a href="{{ url('/') }}"><i class="fa-solid fa-arrow-left-long"></i></a>
                    </div>
                    <div class="col-12 p-0 m-0 my-3 text-center">
                        <img src="{{ asset('assets/images/logo-2.png') }}" alt="Passnownow Logo" class="logo-alt">
                    </div>
                    <div class="col-12 heading p-0 text-center">
                            <h6>Register as Admin on Passnownow</h6>
                    </div>
                    <div class="col-12 mb-3">
                        <form method="POST" action="{{ route('pass_admin') }}">
                            @csrf

                            <div class="mb-3">
                                <x-text-input type="hidden" id="role" class="form-control" name="role" value="admin" />
                                <x-text-input type="hidden" id="unique_id" class="form-control" name="unique_id" value="{{ rand(time(), 10000000);}}" />
                                <x-input-label for="fname" :value="__('Enter First Name')" />
                                <x-text-input type="text" id="fname" class="form-control" name="fname" :value="old('fname')" aria-describedby="textBlock" placeholder="First Name" required />
                                <x-input-error :messages="$errors->get('fname')" class="mt-2 text-danger" />
                            </div>
                            <div class="mb-3">
                                <x-input-label for="fname" :value="__('Enter Last Name')" />
                                <x-text-input type="text" id="lname" class="form-control" name="lname" :value="old('lname')" aria-describedby="textBlock" placeholder="Last Name" required />
                                <x-input-error :messages="$errors->get('lname')" class="mt-2 text-danger" />
                            </div>
                            <div class="mb-3">
                                <x-input-label for="username" :value="__('Enter User Name')" />
                                <x-text-input type="text" id="username" class="form-control" name="username" :value="old('username')" aria-describedby="textBlock" placeholder="User Name" required />
                                <x-input-error :messages="$errors->get('username')" class="mt-2 text-danger" />
                            </div>
                            <div class="mb-3">
                                <x-input-label for="email" :value="__('Enter Email Address')" />
                                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" aria-describedby="emailBlock" placeholder="example@email.com" required />
                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                            </div>
                            <div class="mb-3">
                                <x-input-label for="inputPassword" :value="__('Enter Password')" />
                                <x-text-input type="password" id="inputPassword" class="form-control" :value="old('password')" name="password" aria-describedby="passwordBlock" placeholder="password"  required/>
                                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                                <div id="passwordHelpBlock" class="form-text">
                                        <p>
                                            Your password must be 8-20 characters long, contain letters, numbers and special characters.
                                        </p>
                                    </div>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="cPassword" :value="__('Confirm Password')" />
                                <x-text-input type="password" id="cPassword" class="form-control" :value="old('password_confirmation ')" name="password_confirmation" aria-describedby="passwordBlock" placeholder="Repeat Password" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />         
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" name="terms" class="form-check-input" id="check_terms" />
                                <label class="form-check-label" for="check_terms">Agreed to out terms and conditions</label>
                                <x-input-error :messages="$errors->get('terms')" class="mt-2" />
                            </div>
                            <x-primary-button type="submit" class="btn btn-primary w-100 submit-btn"> {{ __('Register') }}</x-primary-button>
                        </form>
                    </div>
                    <div class="col-12 mb-5 text-center account-ask">
                        <p>Already have an account? &nbsp;<span><a href="{{ url('/login')}}" class="fw-bold">Login Here</a></span></p>
                    </div>
                    <div class="col-12 mt-3 text-center">
                        <p>&copy; Copyright 2023 All Rights Reserved.</p>
                        <p><a href="#">Term & Condition</a> | <a href="#">Privacy & Policy</a></p>
                    </div>
                </div>
            </div>
        </div>
        @yield('modal')
    </main>
    </div>
</body>

</html>
