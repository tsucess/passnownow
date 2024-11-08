<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Fontawesome icons -->
    <link rel="stylesheet" href="{{ asset('fonts/css/fontawesome.css') }} ">
    <link rel="stylesheet" href="{{ asset('fonts/css/solid.css') }} ">
    <link rel="stylesheet" href="{{ asset('fonts/css/brands.css') }} ">
    <link rel="stylesheet" href="{{ asset('fonts/css/regular.css') }} ">
   

    <!-- Datatables  -->
    <link rel="stylesheet" href="{{ asset('css/table/dataTables.bootstrap5.min.css') }} ">

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



    <style>
        @media (min-width: 768px) {
            /* .bd-placeholder-img-lg {
            font-size: 3.5rem;
          } */
        }

        .profit:hover {
            background-color: #1A69AF;
            color: #fff;
            border-radius: 10px;
            padding: 6px;
        }



        .detailedstat:hover {
            background-color: #1A69AF;
            color: #fff;
            border-radius: 10px;
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

        @media only screen and (max-width: 320px) {
            .show {
                margin-left: 0;
                background: red;
            }
        }






        .sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #12db00;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}




    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="sidenav" class="col-md-3 col-lg-2 d-md-block bg-white collapse shadow">
                <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" style="width:5rem; margin: 1rem 0" alt="">
                </a>
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                @php
                    $sn = 0;
                @endphp
                <a class="btn btn-light rounded-pill ms-4 border" href="{{ url('adexams') }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
                <div class="position-sticky">
                    <div class="accordion" id="accordionExample">
                        @foreach ($yearFetchQuestions[0] as $Question)
                            @php
                                $count = ++$sn;
                            @endphp
                        <div class="my-1">
                            <h2 class="">
                                <button class="btn btn-light border w-100 tablinks" type="button" onclick="openCity(event, '{{(string)$Question->id}}')">
                                    {{$Question->title}}
                                </button>
                                {{-- <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#{{(string)$count.'collapse'}}" aria-expanded="false" aria-controls="{{++$sn.'collapse'}}"> {{$Question->title}}
                                </button> --}}
                            </h2>
                            {{-- <div id="{{(string)$count.'collapse'}}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Topic 1 - Part of Speech</strong>
                                    <p>Lorem ipsum dolorsit amec consecteur</p>
                                </div>
                            </div> --}}
                        </div>
                        @endforeach
                    </div>
                </div>
            </nav>

            <main class="col-12 col-md-9 ms-sm-auto col-lg-10 px-md-4">

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
