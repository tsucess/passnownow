<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Responsive Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
    }
    .sidebar {
      background-color: #f8f9fa;
      min-height: 100vh;
    }
    .sidebar a {
      padding: 10px 20px;
      display: block;
      color: #333;
      text-decoration: none;
    }
    .sidebar a:hover {
      background-color: #e4e4e4;
    }
    .logo-box {
      background: #fff;
      padding: 10px;
    }
    .top-blue-bar {
      background-color: #0d6efd;
      color: white;
      padding: 10px;
      height: 100%;
    }
    .profile-img {
      width: 35px;
      height: 35px;
      border-radius: 50%;
    }
  </style>
</head>
<body>

<!-- HEADER SECTION -->
<div class="container-fluid">
  <div class="row align-items-center">

    <!-- Logo (col-3) -->
    <div class="col-md-2 col-12 logo-box d-flex justify-content-between align-items-center">
      <img src="images/logo.png" class="img-fluid" alt="Logo"  style="max-height: 80px;" />

      <!-- Hamburger Button (visible on small devices) -->
      <button class="btn d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
        <i class="fas fa-bars"></i>
      </button>
    </div>

    <!-- Blue Top Section (col-9) -->
    <div class="col-md-10 col-12 top-blue-bar d-flex justify-content-between align-items-center">
      <form class="d-none d-md-block w-50">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
      </form>

      <!-- Profile Dropdown -->
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="{{ asset('images/profile.png') }}" alt="Profile" class="rounded-circle" width="32" height="32" />
        </a>

        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownProfile">
          <li><a class="dropdown-item" href="{{ url('dashboard') }}">Dashboard</a></li>
          <li><a class="dropdown-item" href="{{ url('profile') }}">Profile</a></li>
          <li>
            <form method="POST" action=action="{{ route('logout') }}">
                @csrf
                        <x-dropdown-link class="dropdown-item" :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Signout') }}
                        </x-dropdown-link>
            </form>
          </li>
        </ul>
      </div>

    </div>
  </div>
</div>

<!-- MAIN SECTION -->
<div class="container-fluid">
  <div class="row">

    <!-- Sidebar (collapse on mobile) -->
    <nav id="sidebarMenu" class="col-md-2 col-12 collapse d-md-block sidebar">
      <div class="pt-3">
        <a href="#">Dashboard</a>
        <a href="#">Admin</a>
        <a href="#">Candidate</a>
        <a href="#">Examination Upload</a>
        <a href="#">Questions</a>
        <a href="#">Subscription</a>
        <a href="#">History</a>
      </div>
    </nav>

    <!-- Dashboard Content -->
    <main class="col-md-10 col-12 py-4 px-4">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
