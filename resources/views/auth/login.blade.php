<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
 <!-- Session Status -->
 <x-auth-session-status class="mb-4" :status="session('status')" />
    <main class="container-fluid wrapper container__register container__login">

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
                    <div class="col-12 p-0 m-0 my-4 text-center">
                        <img src="{{ asset('assets/images/logo-2.png') }}" alt="Passnownow Logo" class="logo-alt">
                    </div>
                    <div class="col-12 heading p-0">
                        <h6>Let’s login to your Passnownow account</h6>
                    </div>
                    <div class="col-12 mb-2">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <x-input-label for="email_username" class="form-label" :value="__('Enter Email/Username')" />
                                <x-text-input id="email_username" class="form-control" type="text" name="email_username" :value="old('email_username')" autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                <x-input-error :messages="$errors->get('username')" class="mt-2" />
                            </div>
                            <div class="mb-3">

                                <x-input-label for="password" :value="__('Enter Password')" class="form-label" />
                                <span class="pass_hidden">
                                    <x-text-input id="password" class="form-control" aria-describedby="passwordBlock" type="password" name="password" placeholder="password" autocomplete="current-password" />
                                    <i class="fa-regular fa-eye-slash"></i>
                                </span>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="row check">
                                <div class="col mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                    <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
                                </div>
                                <div class="col mb-3 form-check text-end fw-bold account-ask p-0">
                                    <!-- Button trigger modal -->
                                    {{-- <button type="button" class="" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">Forget Password</button> --}}

                                        <a href="{{ url('/forgot-password')}}">Forget Password</a>
                                    {{-- <p><a href="{{ url('/register')}}">Forget Password</a></p> --}}
                                </div>
                            </div>
                            <x-primary-button>{{ __('Log in') }}</x-primary-button>
                        </form>
                    </div>
                    <div class="col-12 mb-5 text-center account-ask">
                        <p>Don’t have an account? &nbsp;<span><a href="{{ url('/register') }}" class="fw-bold">Register
                                    Here</a></span></p>
                    </div>
                    <div class="col-12 mt-2 text-center">
                        <p>&copy; Copyright 2023 All Rights Reserved.</p>
                        <p><a href="#">Term & Condition</a> | <a href="#">Privacy & Policy</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </div>


<script>
    const passwordField = document.querySelector("#password");
const showhide = document.querySelector(".pass_hidden > .fa-regular");

showhide.onclick = () => {
    let typeValue = passwordField.getAttribute("type");
    if (typeValue === "password") {
        showhide.classList.remove("fa-eye-slash");
        showhide.classList.add("fa-eye");
        passwordField.setAttribute("type", "text");
    }
    else
    {
        showhide.classList.add("fa-eye-slash");
        showhide.classList.remove("fa-eye");
        passwordField.setAttribute("type", "password");

    }

}
</script>



    {{-- Enter Email for Reset password Modal  --}}
    <div class="modal fade" id="staticBackdro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-2 p-md-5">
                <div class="modal-header">
                    <img src="{{ asset('assets/images/logo-2.png') }}" alt="Passnownow Logo" class="logo-alt">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 heading p-0">
                        <h6>Reset your Password</h6>
                        <p>Enter the email address associated with your account and we’ll send you a link to reset
                            your password.</p>
                    </div>
                    <div class="col-12 mb-2">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="email2" class="form-label">Enter Email</label>
                                <input type="email" id="email2" class="form-control"
                                    aria-describedby="emailBlock" placeholder="example@email.com" required>
                            </div>
                            <div class="row check">
                                <div class="col mb-3 form-check fw-bold account-ask p-0">
                                    <span><a href="{{ url('/register') }}" class="fw-bold">Return to
                                            login</a></span>

                                    {{-- <p><a href="{{ url('/register')}}">Forget Password</a></p> --}}
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 submit-btn">Continue</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Resend Code  --}}
    <div class="modal fade" id="staticBackdro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-2 p-md-5">
                <div class="modal-header">
                    <img src="{{ asset('assets/images/logo-2.png') }}" alt="Passnownow Logo" class="logo-alt">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 heading p-0">
                        <h6>Reset your Password</h6>
                        <p>An email has been sent to Winnereffiong@gmail.com. You’ll receive instructions on how to
                            set a new password.</p>
                    </div>
                    <div class="col-12 mb-2">
                        <form action="" method="POST">
                            <div class="mb-3">
                                {{-- <label for="email" class="form-label">Enter Email</label> --}}
                                <input type="hidden" name="email" id="email3" class="form-control"
                                    aria-describedby="emailBlock" placeholder="example@email.com" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 submit-btn">Resend Code</button>
                            <div class="row check mt-2">
                                <div class="col mb-3 form-check fw-bold account-ask p-0">
                                    <span><a href="{{ url('/register') }}" class="fw-bold">Return to
                                            login</a></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- Reset Password Modal  --}}
    <div class="modal fade" id="staticBackdro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-2 p-md-5">
                <div class="modal-header">
                    <img src="{{ asset('assets/images/logo-2.png') }}" alt="Passnownow Logo" class="logo-alt">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 heading p-0">
                        <h6>Reset your Password</h6>
                        <p>Enter the email address associated with your account and we’ll send you a link to reset
                            your password.</p>
                    </div>
                    <div class="col-12 mb-2">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="inputPassword6" class="form-label">Enter Password</label>
                                <span class="pass_hidden">
                                    <input type="password" id="inputPassword6" class="form-control"
                                        aria-describedby="passwordBlock" placeholder="password">
                                    <i class="fa-regular fa-eye-slash"></i>
                                </span>
                                {{-- <i class="fa-regular fa-eye"></i> --}}
                                <div id="passwordHelpBlock" class="form-text">
                                    <p>
                                        Your password must be 8-20 characters long, contain letters, numbers and
                                        special characters.
                                </div>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label for="cPassword" class="form-label">Confirm Password</label>
                                <span class="pass_hidden">
                                    <input type="password" id="cPassword" class="form-control"
                                        aria-describedby="passwordBlock" placeholder="Repeat Password">
                                    <i class="fa-regular fa-eye-slash"></i>
                                </span>
                            </div>
                            <div class="row check">
                                <div class="col mb-3 form-check fw-bold account-ask p-0">
                                    <span><a href="{{ url('/register') }}" class="fw-bold">Return to
                                            login</a></span>

                                    {{-- <p><a href="{{ url('/register')}}">Forget Password</a></p> --}}
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 submit-btn">Continue</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Back to Login Success Modal  --}}
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-2 p-md-5">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="{{ asset('assets/images/success.png') }}" alt="Passnownow Logo"
                        class="complete-image">
                    <div class="col-12 heading p-0">
                        <h6>You have successfully changed your password</h6>
                        <p>Please enter a new password. Your new password must be different from previous password.</p>
                    </div>
                    <div class="col-12 mb-2">
                        <form action="" method="POST">
                            <a href="{{ url('/login') }}" class="btn btn-primary w-100 submit-btn">Back to login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





</body>

</html>
