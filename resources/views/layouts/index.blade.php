<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Passnownow</title>




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
    <div class="container-fluid wrapper">
        <section class="container-fluid top__section">
            <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
            &nbsp; <span>Rated 4.8/5 by parents & students</span>
        </section>
        <header class="container-fluid  container__header grid grid-cols-2 items-center  shadow py-10">
            <nav class="container navbar navbar-expand-lg">
                <a class="navbar-brand" href="/"><img src="{{ asset('assets/images/logo.png') }}" alt=""></a>
                    <button class="navbar-toggler"
                    type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item"><x-nav-link  href="/" active="{{ request()->is('/') }}">Home</x-nav-link></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown"
                                aria-expanded="false">About us</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown01">
                                <li><x-nav-link  type="drop" href="/about" active="{{ request()->is('about') }}">About Passnownow</x-nav-link></li>
                                <li><x-nav-link  type="drop" href="/contact" active="{{ request()->is('contact') }}">Contact us</x-nav-link></li>

                            </ul>
                        </li>
                        <li class="nav-item"><x-nav-link  href="/subjects" active="{{ request()->is('subjects') }}">Subjects</x-nav-link></li>
                        <li class="nav-item"><x-nav-link  href="/notes" active="{{ request()->is('notes') }}">Classes</x-nav-link></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown"
                                aria-expanded="false">Educational
                                Resources</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown01">
                                {{-- <li><a class="dropdown-item" href="{{ url('pastquestions') }}">Past Questions</a></li> --}}
                                <li><x-nav-link  type="drop" href="/pastquestions" active="{{ request()->is('pastquestions') }}">Past Questions</x-nav-link></li>
                                <li><x-nav-link  type="drop" href="/teacherresources" active="{{ request()->is('teacherresources') }}">Teacher's Resources</x-nav-link></li>
                                <li><x-nav-link  type="drop" href="/parentresources" active="{{ request()->is('parentresources') }}">Guidance and Counselling</x-nav-link></li>
                                <li><x-nav-link  type="drop" href="/blog" active="{{ request()->is('blog') }}">Blog</x-nav-link></li>
                            </ul>
                        </li>
                        <li class="nav-item"><x-nav-link  href="/subscriptions" active="{{ request()->is('subscriptions') }}">Pricing plan</x-nav-link></li>
                        </li>
                        {{-- <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Dropdown
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </li> --}}
                    </ul>
                    <div class="nav-btn">
                        @guest
                        <a href="{{ url('login') }}" class="btn btn-style btn-style-secondary">Login</a>
                        <a href="{{ url('register') }}" class="btn btn-outline-primary btn-style">Register</a>
                        @endguest
   
                        @auth
                        <span class="top_icon">
                            <i class="fa-regular fa-bell"></i>
                        </span>
                        <span class="top_icon">
                            <i class="fa-solid fa-globe"></i>
                        </span>
                        <div class="nav-item text-nowrap py-1">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle profile" href="#" id="dropdown01" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="{{ asset('assets/images/profile.png') }}" alt="">
                                </a>
                                <ul class="dropdown-menu w-50" aria-labelledby="dropdown01">
                                    <li><a class="dropdown-item" href="{{ url('dashboard') }}">Dashboard</a>
                                    <li><a class="dropdown-item" href="{{ url('profile') }}">Profile</a>
                                        <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
            
                                        <li>
                                            <x-dropdown-link class="dropdown-item ps-3" :href="route('logout')" onclick="event.preventDefault();                                              this.closest('form').submit();">
                                                {{ __('Signout') }}
                                            </x-dropdown-link>
                                        </li>
                                    </form>
                                </ul>
                            </li>
                        </div>     
                        @endauth
                    </div>
                </div>
            </nav>
        </header>
        <main class="container-fluid">

            @yield('content')

            <section class="container-fluid container__subscribe-form">
                <div class="row form">
                    <div class="col-12 col-md-2"></div>
                    <div class="col-12 col-md-8">
                        <form action="">
                            <p>
                                Sign up for our Newsletter to join our STEMGEES Club, enter into competitions and access
                                opportunities.
                            </p>
                            <div class="sub-form">
                                <input type="text" name="" id="" placeholder="Enter your email">
                                <input type="button" class="btn-submit" value="Subscribe now">
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-md-2"></div>
                </div>
            </section>
        </main>

        {{-- FOOTER SECTION --}}
        <div class="container-fluid container__footer">
            <footer class="">
                <div class="container row mx-auto">
                    <div class="col-12 col-md-5 col-lg-5 p-4 mb-3 address">
                        <h5>West Africa’s most trusted EdTech Platform for Secondary School Students & Teachers</h5>
                        <p>Super simple self studying,
                            peer to peer collaborative learning both for teachers and students</p><img
                            src="{{ asset('assets/images/NG.png') }}" alt="Nigeria-Icon" class="me-1"><span>144A
                            Gbagada Expressway,
                            Anthony,
                            Lagos</span>
                    </div>
                    <div class="col-12 col-md-3 col-lg-2 mb-3 p-0">
                        <h5 class="title">RELATED LINKS</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">About</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Our Blog</a></li>
                            <li class="nav-item mb-2"><a href="{{ url('parentresources') }}"
                                    class="nav-link p-0">For Parent</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">For Teachers</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">FAQs</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-2 col-lg-2 mb-3 p-0">
                        <h5 class="title">RESOURCE</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Class</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Plans</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Exam</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Questions</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-2  col-lg-2 mb-3 p-0">
                        <h5 class="title">CONTACT US</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2">Call Us:</li>
                            <li class="nav-item mb-2">07060545017,
                                07060545027</li>
                            <li class="nav-item mb-2">Email: </li>
                            <li class="nav-item mb-2">Passnownow@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="container d-flex flex-column flex-sm-row justify-content-between border-top copy__right">
                    <p>Copyright &copy; 2024 Passnownow </p>
                    <p><a href="#">Terms and Conditions </a><a href="#">Privacy Policy</a></p>
                    <ul class="">
                        <li class="ms-3"><a class="" href="#"><i class="fa-brands fa-twitter"></i></a>
                        </li>
                        <li class="ms-3"><a class="" href="#"><i
                                    class="fa-brands fa-facebook"></i></a></li>
                        <li class="ms-3"><a class="" href="#"><i
                                    class="fa-brands fa-instagram"></i></a></li>
                        <li class="ms-3"><a class="" href="#"><i
                                    class="fa-brands fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
