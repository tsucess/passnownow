<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Passnownow</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}" />


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Fontawesome icons -->
    <link rel="stylesheet" href="{{ asset('fonts/css/fontawesome.css') }} ">
    <link rel="stylesheet" href="{{ asset('fonts/css/solid.css') }} ">
    <link rel="stylesheet" href="{{ asset('fonts/css/brands.css') }} ">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


    {{-- SWIPER JS  --}}
    <link rel="stylesheet" href="{{ 'css/swiper-bundle.min.css' }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsiveness.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
.bounce-on-hover {
  transition: transform 0.3s ease-in-out;
}

.bounce-on-hover:hover {
  animation: bounce 0.7s infinite;
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

.aboutImage {
  animation-duration: 1s;
  animation-fill-mode: both;
  animation-iteration-count: infinite;
  animation-play-state: paused;
}

.aboutImage:hover {
  animation-play-state: running;
}


/* Scroll to Top Button Styles */
#scrollToTop {
  position: fixed;
  bottom: 20px;
  right: 20px;
  width: 50px;
  height: 50px;
  background-color: #0D2F5F; /* Blue color */
  color: white;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  transition: opacity 0.3s, transform 0.3s;
  opacity: 0;
  visibility: hidden;
  z-index: 1000;
}

#scrollToTop.show {
  opacity: 1;
  visibility: visible;
}

#scrollToTop:hover {
  background-color: #0056b3; /* Darker blue */
}

#scrollToTop .arrow {
  font-size: 24px;
  animation: spin 1s linear infinite;
}

/* @keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
} */

.animate-on-scroll {
  opacity: 0;
  transform: translateY(20px);
  transition: opacity 0.6s ease, transform 0.6s ease;
}

.animate-on-scroll.visible {
  opacity: 1;
  transform: translateY(0);
}
        </style>
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
                <a class="navbar-brand" href="/"><img src="{{ asset('images/logo.png') }}" alt=""></a>
                    <button class="navbar-toggler"
                    type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span
                        class="navbar-toggler-icon fa fa-bars"></span></button>
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
                                <li><x-nav-link  type="drop" href="/career-counselling" active="{{ request()->is('career-counselling') }}">Guidance and Counselling</x-nav-link></li>
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
                                    <img src="{{ asset('images/profile.png') }}" alt="">
                                </a>
                                <ul class="dropdown-menu w-50" aria-labelledby="dropdown01">
                                    <li><a class="dropdown-item" href="{{ url('dashboard') }}">Dashboard</a>
                                    <li><a class="dropdown-item" href="{{ url('profile') }}">Profile</a>
                                        <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <li>
                                            <x-dropdown-link class="dropdown-item ps-3" :href="route('logout')" onclick="event.preventDefault();">                                              this.closest('form').submit();">
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
                <div class="row form" id="subscribe">
                    <div class="col-12 col-md-2"></div>
                    <div class="col-12 col-md-8">
                        <form action = "{{ route('subscribe') }}" method = "POST">
                            @csrf
                            <p>
                                Sign up for our Newsletter to join our STEMGEES Club, enter into competitions and access
                                opportunities.
                            </p>
                            <div class="sub-form">
                                <input type="text" name="email" id="" placeholder="Enter your email">
                                <input type="submit" class="btn-submit" value="Subscribe now">
                            </div>

                            <!-- Display the success message below the form -->
                            @if(session('success'))
                                <div class="alert alert-success" style="margin-top: 10px;">
                                  {{ session('success') }}
                                </div>
                            @endif

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
                            peer to peer collaborative learning both for teachers and students</p>
                            <img
                            src="{{ asset('images/NG.png') }}" alt="Nigeria-Icon" class="me-1">
                            <a href="https://www.google.com/maps/search/8+Adebayo+Muokolu+Street,+Anthony+Village,+Lagos,+Nigeria./@6.558127,3.3687749,17z/data=!3m1!4b1?entry=ttu&g_ep=EgoyMDI0MTIxMC4wIKXMDSoASAFQAw%3D%3D" class="text-decoration-none" target="_blank"><span>8 Adebayo Muokolu Street, Anthony Village, Lagos, Nigeria.</span></a>
                    </div>
                    <div class="col-12 col-md-3 col-lg-2 mb-3 p-0">
                        <h5 class="title">RELATED LINKS</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="/about" class="nav-link p-0">About</a></li>
                            {{-- <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Our Blog</a></li> --}}
                            <li class="nav-item mb-2"><a href="/parentresources"
                                    class="nav-link p-0">For Parent</a></li>
                            <li class="nav-item mb-2"><a href="/teacherresources" class="nav-link p-0">For Teachers</a></li>
                            <li class="nav-item mb-2"><a href="/faq" class="nav-link p-0">FAQs</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-2 col-lg-2 mb-3 p-0">
                        <h5 class="title">RESOURCE</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="/classnotes" class="nav-link p-0">Class</a></li>
                            <li class="nav-item mb-2"><a href="/subscriptions" class="nav-link p-0">Plans</a></li>
                            <li class="nav-item mb-2"><a href="/#exam__questions" class="nav-link p-0">Exam</a></li>
                            <li class="nav-item mb-2"><a href="/#classnotes" class="nav-link p-0">Questions</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-2  col-lg-2 mb-3 p-0">
                        <h5 class="title">CONTACT US</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2">Call Us:</li>
                            <li class="nav-item mb-2"><a href="tel:07060545017" target="_blank" class="text-decoration-none">0706.054.5017</a>,
                                <a href="tel:07060545027" target="_blank" class="text-decoration-none">0706.054.5027</a></li>
                            <li class="nav-item mb-2">Email: </li>
                            <li class="nav-item mb-2"> <a href="mailto:info@passnownow.com" target="_blank" class="text-decoration-none">info@passnownow.com</a></li>
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


        <!-- Scroll to Top Button -->
        <div id="scrollToTop">
            <i class="arrow">↑</i>
        </div>

          <script>
            // Scroll to Top Button Logic
            const scrollToTopButton = document.getElementById('scrollToTop');

            // Show the button when scrolling down
            window.addEventListener('scroll', () => {
            if (window.scrollY > 200) {
                scrollToTopButton.classList.add('show');
            } else {
                scrollToTopButton.classList.remove('show');
            }
            });

            // Scroll to the top smoothly when clicked
            scrollToTopButton.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth',
            });
            });
            </script>
    </div>


    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    function isFullyInViewport(el) {
      const rect = el.getBoundingClientRect();
      return (
        rect.top >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)
      );
    }

    function triggerAnimations() {
      // Target all divs that contain things to animate
      $('.section, .mb-3').each(function () {
        const $container = $(this);
        const $targets = $container.find('.animate-on-scroll');

        if (!$targets.hasClass('visible') && isFullyInViewport(this)) {
          $targets.addClass('visible');
        }
      });
    }

    $(window).on('scroll resize load', triggerAnimations);
  });
</script>



</body>

</html>
