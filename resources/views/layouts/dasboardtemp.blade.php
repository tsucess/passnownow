<!DOCTYPE html>
<html lang="en">

<head>
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

     <link rel="stylesheet" href="{{ asset('css/ckeditor5.css')}}" />


    <style>

    </style>
</head>

<body>

    {{-- <div class="container-fluid sticky-top">
        <div class="row"> --}}

<div class="container-fluid sticky-top">
  <div class="row align-items-center">

        <!-- Logo (col-3) -->
        <div class="col-md-2 col-12 logo-box d-flex justify-content-between align-items-center">
        {{-- <a class="navbar-brand col-md-3 col-lg-2 me-5 px-3" href="{{ url('/') }}"> --}}
        <img src="{{ asset('images/logo.png') }}" alt="" class = "img-fluid mx-auto" style="max-height: 90px;">
        {{-- </a> --}}

    <!-- harmburger visible on small device -->
        {{-- <button class="navbar-toggler position-absolute d-md-none collapsed bg-primary " type="button"
            data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon fa fa-bars"></span>
        </button> --}}

         <button class="navbar-toggler d-md-none  ms-auto" type="button"
            data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon fa fa-bars"></span>
        </button>

    </div>

    <!-- Blue Top Section (col-9) -->
    {{-- <div class="col-md-10 col-12 d-flex justify-content-between align-items-center" style = "margin-top: -20px; background: #1A69AF;"> --}}
        <div class="col-12 col-md-10 d-flex flex-column flex-md-row justify-content-between align-items-center px-3 py-2" style="background: #1A69AF;">
        <form class="d-none d-md-block w-50">
        <input class="form-control mt-3 me-2" type="search" placeholder="Search" aria-label="Search"/>
      </form>


        <div class="dropdown">
            {{-- <div class = "nav-item text-nowrap py-1"> --}}

                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="dropdownProfile" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ asset('images/profile.png') }}" alt="" class="rounded-circle" width="32" height="32">
                    </a>

                    <ul class="dropdown-menu w-50" aria-labelledby="dropdown01">
                        <li><a class="dropdown-item" href="{{ url('dashboard') }}">Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{ url('profile') }}">Profile</a></li>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                        <li>
                            <x-dropdown-link class="dropdown-item ps-3" :href="route('logout')"
                                onclick="event.preventDefault();  this.closest('form').submit();">
                                {{ __('Signout') }}
                            </x-dropdown-link>
                        </li>
                        </form>
                    </ul>
            {{-- </div> --}}

    </div>
    </div>
    {{-- </div> --}}
    </div>
</div>  <!-- new sticky top div -->

    {{-- <div class="container-fluid"> --}}



    <div class="container-fluid">
        <div class="row position-relative">

            {{-- <div class="col-md-2 col-12 collapse d-md-block sidebar"> --}}
            {{-- <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block  sidebar collapse" > --}}
                    <nav id="sidebarMenu" class="col-md-2 col-12 collapse d-md-block sidebar">

                {{-- <div class="position-sticky"> --}}
                    <div class = "pt-5">
                    <ul class="nav flex-column pt-3">

                        {{-- <li class = "nav-item">
                        <a class="navbar-brand col-md-3 col-lg-2 me-5 px-3" href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="" class = "w-75">
                        </li> --}}

                        <li class="nav-item">
                            <x-sidebar-link active="{{ request()->is('dashboard') }}" href="/dashboard">
                                <i class="fa-solid fa-table-list"></i>
                                Dashboard
                            </x-sidebar-link>
                        </li>
                        @if (Auth::user()->role === 'user')
                            <li class="nav-item">
                                <x-sidebar-link active="{{ request()->is('classes') || request()->is('subject') }}"
                                    href="/classes">
                                    <i class="fa-solid fa-layer-group"></i>
                                    Classes
                                </x-sidebar-link>
                            </li>
                            <li class="nav-item">
                                <x-sidebar-link active="{{ request()->is('adexams') }}" href="/adexams">
                                    <i class="fa-solid fa-list"></i>
                                    Exams
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
                                    {{-- <i class="fa-solid fa-dollar"></i> --}}
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
                                    Candidates
                                </x-sidebar-link>
                            </li>

                             <li class="nav-item">
                                <x-sidebar-link active="{{ request()->is('users') }}" href="/examupload">
                                    <i class="fa-regular fa-list"></i>
                                    Examination Upload
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
                                <x-sidebar-link active="{{ request()->is('adsubjects') }}" href="/adsubjects">
                                    <i class="fa-solid fa-swatchbook"></i>
                                    Questions
                                </x-sidebar-link>
                            </li>
                            {{-- <li class="nav-item">
                                <x-sidebar-link active="{{ request()->is('adexams') }}" href="/adexams">
                                    <i class="fa-solid fa-list"></i>
                                    Exams
                                </x-sidebar-link>
                            </li> --}}

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
                                    Subscription
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
                                    History
                                </x-sidebar-link>
                            </li>
                        @endif
                    </ul>
                </div>
                </nav>

                <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4" style = "background: #f1f1f1">
                 {{-- <main class="col-md-10 col-12 py-4 px-4"> --}}
                 @yield('admincontent')


                <section class="container-fluid footer__container">
                    <div class="row">
                        <div class="col-12 col-md-5 col-lg-6 mb-2 myfooter">&copy; Copyright Passnownow 2024, All Right
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


             {{-- </div> --}}
            </div>
    </div>


    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
