@extends('layouts.pqinterface')


<style>
    .tabcontent {
        display: none;
      

    }
</style>
@section('admincontent')
    <div class="row align-items-start" id="main">
        <div class="col-12" >
            <span style="font-size:30px;cursor:pointer" onclick="openNav()" id="open">&#9776;</span>
            <h6 class = "h6 mb-3">Topic 1: Part of Speech</h6>

            @foreach ($yearFetchQuestions[0] as $Question)
                <div class="w-100 tabcontent" style="height:100vh" id="{{ (string)$Question->unique_id }}">
                    <iframe width="100%" height="100%"  src="{{$Question->url}}"
                        frameborder="1" title = "Subjects content" allowfullscreen></iframe>
                </div>
                {{$Question->url}}
            @endforeach
            {{-- @foreach ($yearFetchQuestions[0] as $Question)
                <div class="w-100 tabcontent" style="height:100vh" id="{{ (string)$Question->unique_id }}">
                    <iframe width="100%" height="100%"  src="{{$Question->url}}"
                        frameborder="1" title = "Subjects content" allowfullscreen></iframe>
                </div>
                {{$Question->url}}
            @endforeach --}}

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
    </div>





  
@endsection
