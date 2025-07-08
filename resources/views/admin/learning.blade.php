@extends('layouts.learninterface')

<style>
    .frame {
        position: relative;
    }

    .content {
        position: relative;
        top: 850px;
    }

    .tabcontent {
        /* display: none; */
        visibility: hidden;
        position: absolute;
    }
</style>
@section('admincontent')
    <div class="row align-items-start" id="main">
        <div class="col-12 col-md-1 ">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()" id="open">&#9776;</span>
        </div>
        <div class="col-12 col-md-11 ">
            <div class="frame">
                @foreach ($restopics as $restop)
                    <div class="w-100 tabcontent mx-auto" id="{{ (string) $restop->unique_id }}">
                        <h6 class = "h6 mb-3 mt-3 ps-2">Topic: {{ $restop->title }}</h6>
                        @if ($restop->content_type === 'url')
                            <iframe width="91%" height="840" src="{{ $restop->url }}"
                                frameborder="1" title = "Subjects content" allowfullscreen></iframe>
                        @else
                        <div>
                            {!! $restop->content !!}
                        </div>
                        @endif
                    </div>
                @endforeach
            </div>

        </div>
        {{-- <div class="col-12 content">
            <h2>Objectives</h2>
            <p class = "justify-content mt-2">
                Lorem ipsum dolor sit amet consectetur. Lorem ipsum dolor sit amet consectetur.
                Lorem ipsum dolor sit amet consectetur.Lorem ipsum dolor sit amet consectetur.
                Lorem ipsum dolor sit amet consectetur.Lorem ipsum dolor sit amet consectetur.
                Lorem ipsum dolor sit amet consectetur.Lorem ipsum dolor sit amet consectetur.
            </p>
        </div> --}}


    </div>
@endsection
