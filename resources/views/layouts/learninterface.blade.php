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
            /* width: 0px; */
            position: fixed;
            z-index: 3;
            top: 0;
            left: 0;
            background-color: #ffffff;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 15px;
            padding-left: 15px
        }

        /* .sidenav a {
            padding: 18px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        } */

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
            position: relative;
            transition: margin-left .5s;
            padding: 16px;
        }


        .opennav {
            width: 100%;
        }

        .closenav {
            width: 0;
            left: -25px;
        }


        /* .openmain {
            width: 225px;
        }

        .closemain {
            width: 0;
        } */

        @media (min-height: 450px) {
            .sidenav {
                position: fixed;
                padding-top: 60px;
            }

            /* .sidenav a {
                font-size: 8px;
            } */
        }

        @media (min-width: 450px) {
            .sidenav {
                width: 0;
                position: fixed;
                padding-top: 60px;
                left: -22px;
            }

            .opennav {
                width: 225px;
            }

            .closenav {
                width: 0;
                left: -55px;
            }

            .openmain {
                margin-left: 180px;
            }

            .closemain {
                margin-left: -25px;
            }
        }
    </style>
</head>

<body>


    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-white collapse shadow" style="height: 100vh">
                <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" style="width:5rem; margin: 1rem 0" alt="">
                </a>
                <a class="btn btn-light rounded-pill ms-4 border" href="{{ url('classes') }}"><i
                        class="fa-solid fa-arrow-left"></i> Back</a>
                <div class="position-sticky">
                    <div class="accordion" id="accordionExample">

                        @foreach ($userFetchTopics as $topics)
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#{{ (string) $topics[0]->id . 'collapse' }}"
                                        aria-expanded="false" aria-controls="collapseOne">
                                        {{ ucfirst($topics[0]->term) }} Term <span class = "ps-4 w-25">20</span>
                                    </button>
                                </h2>
                                <div id="{{ (string) $topics[0]->id . 'collapse' }}"
                                    class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{-- <strong>Topic 1 - Part of Speech</strong> --}}
                                        @foreach ($restopics as $restop)
                                            @if ($topics[0]->term === $restop->term)
                                            <p class="tablinks w-100" onclick="selectL(event, '{{ (string)$restop->unique_id }}')" style="cursor:pointer;">
                                                <strong>{{ $restop->title }}</strong></p>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('admincontent')
            </main>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>


    <script>
        function openNav() {
            document.getElementById("sidebarMenu").classList.add('opennav');
            document.getElementById("open").style.visibility = "hidden";
            document.getElementById("sidebarMenu").classList.remove('closenav');
            document.getElementById("main").classList.add('openmain');
            document.getElementById("main").classList.remove('closemain');
        }

        function closeNav() {
            document.getElementById("sidebarMenu").classList.add('closenav');
            document.getElementById("sidebarMenu").classList.remove('opennav');
            document.getElementById("main").classList.add('closemain');
            document.getElementById("main").classList.remove('openmain');
            document.getElementById("open").style.visibility = "visible";
        }

        tabcontent = document.getElementsByClassName("tabcontent");
        // tabcontent[0].style.display = "block";
        tabcontent[0].style.visibility = "visible";

        function selectL(evt, subjectName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.visibility = "hidden";
                // tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace("active", "");
            }
            // document.getElementById(subjectName).style.display = "block";
            document.getElementById(subjectName).style.visibility = "visible";
            evt.currentTarget.className += " active";
        }
    </script>
</body>

</html>
