@extends('layouts.pqinterface')


<style>
    .tabcontent {
        display: none;

    }
</style>
@section('admincontent')
    <div class="row align-items-start" id="main">

        <div class="col-xl-12 col-lg-12 col-md-8 col-sm-12 col-xs-12">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
            <h6 class = "h6 mb-3 mt-3">Topic 1: Part of Speech</h6>

            @foreach ($yearFetchQuestions[0] as $Question)
                <div class="w-100 tabcontent" id="{{ (string) $Question->id }}">
                    <iframe width="100%" height="690" src="https://app.Lumi.education/api/v1/run/gWQ6dY/embed"
                        frameborder="1" title = "Subjects content" allowfullscreen></iframe>
                    {{ (string) $Question->id }}
                </div>
            @endforeach
            {{-- <section>
                        <iframe src="https://app.Lumi.education/api/v1/run/gWQ6dY/embed" width="1088" height="720" frameborder="0" allowfullscreen="allowfullscreen" allow="geolocation *; microphone *; camera *; midi *; encrypted-media *"></iframe>
                        <script src="https://app.Lumi.education/api/v1/h5p/core/js/h5p-resizer.js" charset="UTF-8"></script>
                    </section> --}}
            <p class = "justify-content mt-2">
                Lorem ipsum dolor sit amet consectetur. Lorem ipsum dolor sit amet consectetur.
                Lorem ipsum dolor sit amet consectetur.Lorem ipsum dolor sit amet consectetur.
                Lorem ipsum dolor sit amet consectetur.Lorem ipsum dolor sit amet consectetur.
                Lorem ipsum dolor sit amet consectetur.Lorem ipsum dolor sit amet consectetur.
            </p>

        </div>


    </div>





    <script>
        function openNav() {
            document.getElementById("sidebarMenu").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("sidebarMenu").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }


        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
@endsection
