@extends('layouts.index')

@section('content')
    <Section class="container-fluid container__banner">
        <div class="row">
            <div class="col-12 banner">
                <h1>SUBJECTS</h1>
            </div>
        </div>
    </Section>
    <section class="container-fluid container__search">
        <div class="row p-0 m-0">
            <div class="col-12 col-md-6 search__form">
                <form action="">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" value="" placeholder="Search Subject">
                    <input type="button" value="Search">
                </form>
            </div>
        </div>
    </section>


    <section class="container-fluid container__subjects ">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h6>JSS1 - JSS3</h6>
            </div>
        </div>
        <div class="row only_subjects">
            <div class="col-12 col-md-4 mb-3">
                <div class="image-wrapper">
                    <img src="{{ asset('images/student-writing.png') }}" alt="">
                </div>
                <div class="note_info p-2">
                    <h5>Computer Science</h5>
                    <p>Start studying with our wide collection of all SSS 1 Class Notes all Terms on all Secondary
                        School Subjects</p>
                    <a href="{{url('#')}}" class="note_btn">VIEW NOTE</a>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="image-wrapper">
                    <img src="{{ asset('images/student-writing.png') }}" alt="">
                </div>
                <div class="note_info p-2">
                    <h5>Mathematics</h5>
                    <p>Start studying with our wide collection of all SSS 1 Class Notes all Terms on all Secondary
                        School Subjects</p>
                    <a href="{{url('#')}}" class="note_btn">VIEW NOTE</a>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="image-wrapper">
                    <img src="{{ asset('images/student-writing.png') }}" alt="">
                </div>
                <div class="note_info p-2">
                    <h5>English Language</h5>
                    <p>Start studying with our wide collection of all SSS 1 Class Notes all Terms on all Secondary
                        School Subjects</p>
                    <a href="{{url('#')}}" class="note_btn">VIEW NOTE</a>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="image-wrapper">
                    <img src="{{ asset('images/student-writing.png') }}" alt="">
                </div>
                <div class="note_info p-2">
                    <h5>National Value</h5>
                    <p>Start studying with our wide collection of all SSS 1 Class Notes all Terms on all Secondary
                        School Subjects</p>
                    <a href="{{url('#')}}" class="note_btn">VIEW NOTE</a>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="image-wrapper">
                    <img src="{{ asset('images/student-writing.png') }}" alt="">
                </div>
                <div class="note_info p-2">
                    <h5>Basic Science</h5>
                    <p>Start studying with our wide collection of all SSS 1 Class Notes all Terms on all Secondary
                        School Subjects</p>
                    <a href="{{url('#')}}" class="note_btn">VIEW NOTE</a>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="image-wrapper">
                    <img src="{{ asset('images/student-writing.png') }}" alt="">
                </div>
                <div class="note_info p-2">
                    <h5>Religious Studies</h5>
                    <p>Start studying with our wide collection of all SSS 1 Class Notes all Terms on all Secondary
                        School Subjects</p>
                    <a href="{{url('#')}}" class="note_btn">VIEW NOTE</a>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid container__subjects">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h6>SSS1 - SSS3</h6>
            </div>
        </div>
        <div class="row only_subjects">
            <div class="col-12 col-md-4 mb-3">
                <div class="image-wrapper">
                    <img src="{{ asset('images/student-writing.png') }}" alt="">
                </div>
                <div class="note_info p-2">
                    <h5>Chemistry</h5>
                    <p>Start studying with our wide collection of all SSS 1 Class Notes all Terms on all Secondary
                        School Subjects</p>
                    <a href="{{url('#')}}" class="note_btn">VIEW NOTE</a>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="image-wrapper">
                    <img src="{{ asset('images/student-writing.png') }}" alt="">
                </div>
                <div class="note_info p-2">
                    <h5>Mathematics</h5>
                    <p>Start studying with our wide collection of all SSS 1 Class Notes all Terms on all Secondary
                        School Subjects</p>
                    <a href="{{url('#')}}" class="note_btn">VIEW NOTE</a>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="image-wrapper">
                    <img src="{{ asset('images/student-writing.png') }}" alt="">
                </div>
                <div class="note_info p-2">
                    <h5>English Language</h5>
                    <p>Start studying with our wide collection of all SSS 1 Class Notes all Terms on all Secondary
                        School Subjects</p>
                    <a href="{{url('#')}}" class="note_btn">VIEW NOTE</a>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="image-wrapper">
                    <img src="{{ asset('images/student-writing.png') }}" alt="">
                </div>
                <div class="note_info p-2">
                    <h5>Physics</h5>
                    <p>Start studying with our wide collection of all SSS 1 Class Notes all Terms on all Secondary
                        School Subjects</p>
                    <a href="{{url('#')}}" class="note_btn">VIEW NOTE</a>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="image-wrapper">
                    <img src="{{ asset('images/student-writing.png') }}" alt="">
                </div>
                <div class="note_info p-2">
                    <h5>Biology</h5>
                    <p>Start studying with our wide collection of all SSS 1 Class Notes all Terms on all Secondary
                        School Subjects</p>
                    <a href="{{url('#')}}" class="note_btn">VIEW NOTE</a>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="image-wrapper">
                    <img src="{{ asset('images/student-writing.png') }}" alt="">
                </div>
                <div class="note_info p-2">
                    <h5>Economics</h5>
                    <p>Start studying with our wide collection of all SSS 1 Class Notes all Terms on all Secondary
                        School Subjects</p>
                    <a href="{{url('#')}}" class="note_btn">VIEW NOTE</a>
                </div>
            </div>
        </div>
    </section>


@endsection
