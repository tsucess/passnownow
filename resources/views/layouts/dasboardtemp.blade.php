<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript">
        BASE_URL = "<?php echo url(''); ?>"
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}" />


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Fontawesome icons -->
    <link rel="stylesheet" href="{{ asset('fonts/css/fontawesome.css') }} ">
    <link rel="stylesheet" href="{{ asset('fonts/css/solid.css') }} ">
    <link rel="stylesheet" href="{{ asset('fonts/css/brands.css') }} ">
    <link rel="stylesheet" href="{{ asset('fonts/css/regular.css') }} ">
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <!-- Datatables  -->
    <link rel="stylesheet" href="{{ asset('css/table/dataTables.bootstrap5.min.css') }} ">

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsiveness.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Chart.js -->
    <script src="{{ asset('js/chart/chart.min.js') }}"></script>

    <!-- <script type="text/javascript" src="./bootstrap-5/js/bootstrap.js"></script>  -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}

    <link rel="stylesheet" href="{{ asset('css/ckeditor5.css') }}" />



    <style>
        @media (min-width: 768px) {
            /* .bd-placeholder-img-lg {
            font-size: 3.5rem;
          } */
        }

        .profit {
            padding: 6px;
        }

        .profit:hover {
            background-color: #1A69AF;
            color: #fff;
        }


        .profit:hover a {
            color: #fff !important;
        }


        .profit:hover span {
            color: #fff;
        }



        .detailedstat:hover {
            background-color: #1A69AF;
            color: #fff;
            border-radius: 10px;
        }


        .detailedstat {
            color: #1A69AF;
            font-weight: 600;
            padding: 6px;
        }

        .product:hover {
            background-color: #1A69AF;
            color: #fff;
            border-radius: 10px;
            padding: 6px;
        }

        .order:hover {
            background-color: #1A69AF;
            color: #fff;
            border-radius: 10px;
            padding: 6px;
        }

        /* @media only screen and (max-width: 320px) { */
        /* .show {
                margin-left: 0;
                background: red;
            }
        }

        */
        .sub:hover {
            background-color: #1A69AF;
        }

        /* Smooth animation for buttons */
        .sub {
            transition: background-color 0.3s, transform 0.3s;
        }

        /* Hover effect for buttons */
        .sub:hover {
            background-color: #0056b3;
            color: #fff;
            transform: scale(1.1);
        }

        /* Applying animation to the cards */
        .sty {
            animation: fadeIn 0.8s ease-in-out;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        /* Hover effect on the card */
        .sty:hover {
            transform: scale(1.03);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Apply the animation to the div */
        /* .sty {}
  animation: slideInFromRight 1s ease-out; /* 1s duration, ease-out timing */
        */
    </style>
</head>

<body>



    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3  col-xl-2 d-md-block bg-white sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ url('/') }}">
                                <img src="{{ asset('images/logo.png') }}" alt="">
                            </a>
                        </li>
                        <li class="nav-item">
                            <x-sidebar-link active="{{ request()->is('dashboard') }}" href="/dashboard">
                                <i class="fa-solid fa-table-list"></i>
                                Dashboard
                            </x-sidebar-link>
                        </li>
                        @if (Auth::user()->role === 'user')
                            {{-- <li class="nav-item">
                                <x-sidebar-link active="{{ request()->is('classes') || request()->is('subject') }}"
                                    href="/classes">
                                    <i class="fa-solid fa-layer-group"></i>
                                    Classes
                                </x-sidebar-link>
                            </li> --}}
                            <li class="nav-item">
                                <x-sidebar-link active="{{ request()->is('adexams') }}" href="/adexams">
                                    <i class="fa-solid fa-list"></i>
                                    Exams
                                </x-sidebar-link>
                            </li>
                            <li class="nav-item">
                                <x-sidebar-link active="{{ request()->is('exam_taken') }}" href="/exam_taken">
                                    <i class="fa-solid fa-list"></i>
                                    Exams Completed
                                </x-sidebar-link>
                            </li>
                            <li class="nav-item">
                                <x-sidebar-link active="{{ request()->is('subscriptiondetails') }}"
                                    href="/subscriptiondetails">
                                    <i class="fa-solid fa-credit-card"></i>
                                    Subscription
                                </x-sidebar-link>
                            </li>
                            <li class="nav-item effect">
                                <x-sidebar-link active="{{ request()->is('checkoutdetails') }}"
                                    href="/checkoutdetails">
                                    <span class = "me-2"
                                        style = "font-size: 20px; color:rgba(35, 33, 33, 0.774);">&#x20A6;</span>
                                    Subscribe
                                </x-sidebar-link>
                            </li>
                        @else
                            @if (Auth::user()->role === 'sadmin')
                                <li class="nav-item">
                                    <x-sidebar-link active="{{ request()->is('admins') }}" href="/admins">
                                        <i class="fa-solid fa-user-tie"></i>
                                        Admin
                                    </x-sidebar-link>
                                </li>
                            @endif
                            <li class="nav-item">
                                <x-sidebar-link active="{{ request()->is('users') }}" href="/users">
                                    <i class="fa-regular fa-user"></i>
                                    Candidate
                                </x-sidebar-link>
                            </li>
                            {{-- <li class="nav-item">
                                <x-sidebar-link active="{{ request()->is('classes') || request()->is('subject') }}"
                                    href="/classes">
                                    <i class="fa-solid fa-layer-group"></i>
                                    Classes
                                </x-sidebar-link>
                            </li> --}}
                            <li class="nav-item">
                                <x-sidebar-link active="{{ request()->is('adexams') }}" href="/adexams">
                                    <i class="fa-solid fa-list"></i>
                                    Exams
                                </x-sidebar-link>
                            </li>
                            <li class="nav-item">
                                <x-sidebar-link active="{{ request()->is('adsubjects') }}" href="/adsubjects">
                                    <i class="fa-solid fa-swatchbook"></i>
                                    Subjects
                                </x-sidebar-link>
                            </li>

                            {{-- <li class="nav-item">
                            <a class="nav-link" href="{{url('adpastquestions')}}">
                                <i class="fa-solid fa-list"></i>
                                Pass Questions
                            </a>
                        </li> --}}
                            <li class="nav-item">
                                <x-sidebar-link active="{{ request()->is('subscriptionhistory') }}"
                                    href="/subscriptionhistory">
                                    {{-- <i class="fa-solid fa-hand-holding-dollar"></i> --}}
                                    <i class="fa-solid fa-credit-card"></i>
                                    Subscription History
                                </x-sidebar-link>
                            </li>
                            {{-- <li class="nav-item">
                                <x-sidebar-link active="{{ request()->is('subscription') }}" href="/subscription">
                                    <i class="fa-solid fa-dollar"></i>
                                    Pricing
                                </x-sidebar-link>
                            </li> --}}
                            {{-- <li class="nav-item">
                            <x-sidebar-link active="{{ request()->is('#') }}" href="#">
                                <i class="fa-solid fa-clock-rotate-left"></i>
                                History
                            </x-sidebar-link>
                        </li> --}}
                            {{-- <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                Signout
                            </a>
                        </li> --}}
                            <li class="nav-item">
                                <x-sidebar-link active="{{ request()->is('servicesubscription') }}"
                                    href="/servicesubscription">
                                    {{-- <i class="fa-solid fa-hand-holding-dollar"></i> --}}
                                    <i class="fas fa-camera"></i>
                                    Service Subscription
                                </x-sidebar-link>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-xl-10 ">
                <header class="navbar sticky-top bg-white flex-md-nowrap
                p-1 g-1 shadow pe-md-3">
                    <button class="navbar-toggler position-absolute d-md-none collapsed mt-2" type="button"
                        data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon fa fa-bars"></span>
                    </button>
                    <div></div>
                    {{-- <input class="form-control form-control-dark" type="text" placeholder="Search"
                        aria-label="Search" /> --}}
                    <div class="navbar-nav">
                        {{-- <span class="top_icon">
                            <i class="fa-regular fa-bell"></i>
                        </span>
                        <span class="top_icon">
                            <i class="fa-solid fa-globe"></i>
                        </span> --}}
                        <div class="nav-item text-nowrap py-1">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle profile" href="#" id="dropdown01"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('images/profile.png') }}" alt="">
                                </a>
                                <ul class="dropdown-menu w-50" aria-labelledby="dropdown01">
                                    <li><a class="dropdown-item" href="{{ url('dashboard') }}">Dashboard</a>
                                    <li><a class="dropdown-item" href="{{ url('profile') }}">Profile</a>
                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                    <li>
                                        <x-dropdown-link class="dropdown-item ps-3" :href="route('logout')"
                                            onclick="event.preventDefault();                                              this.closest('form').submit();">
                                            {{ __('Signout') }}
                                        </x-dropdown-link>
                                    </li>
                                    </form>
                                </ul>
                            </li>
                        </div>
                    </div>
                </header>

                @yield('admincontent')

                <section class="container-fluid footer__container">
                    <div class="row">
                        <div class="col-12 col-md-5 col-lg-6 mb-2">&copy; Copyright Passnownow 2024, All Right
                            Reserverd</div>
                        {{-- <div class="col-12 col-md-2 col-lg-4"></div> --}}
                        <div class="col-12 col-md-5 col-lg-6 text-lg-end">
                            <a href="3">Terms and conditions</a> &nbsp;
                            <a href="3">Privacy policy</a> &nbsp;
                            <a href="#">Support</a>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
