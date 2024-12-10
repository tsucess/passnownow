@extends('layouts.index')

@section('content')
    <Section class="container-fluid container__banner teacher__banner">
        <div class="row">
            <div class="col-12 banner">
                <h1>Teacher <span class="red_header">Resources</span></h1>
                <p class="text-center header_content">
                    Passnownow is Nigeria’s foremost online learning platform
                    that provides students with access to high-quality educational
                    materials tailored to their specific needs
                </p>
            </div>
        </div>
    </Section>
    {{-- <section class="container-fluid container__search">
        <div class="row p-0 m-0">
            <div class="col-12 col-md-6 search__form">
                <form action="">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" value="" placeholder="Search Subject">
                    <input type="button" value="Search">
                </form>
            </div>
        </div>
    </section> --}}

    <section class="container-fluid container__subjects mt-lg-5 teacher__subjects">
        <div class="row">
            <div class="col-12 text-center mb-5 header">
                <h6>Teachers Methodology <br /> (Category One)</h6>
                <p class="text-dark">
                    It is important that teachers learn to use a variety
                    of teaching methodologies in order to cater for the
                    range of learning needs and requirements that are
                    present within most class environments. Within this
                    section a variety of teaching methodologies will be
                    explored and their various advantages and disadvantages outlined.
                </p>
            </div>
        </div>
        <div class="row mb-3 ">
            <div class="col-12 col-md-4 mb-5">
                <div class="image-wrapper bounce-on-hover">
                    <img src="{{ asset('images/education-removelaptop.png') }}" alt="">
                </div>
                <div class="note_info p-2 text-center">
                    <p class="m-0">Lesson One</p>
                    <h5 class="">Explicit Teaching</h5>
                    <a href="{{ url('explicit') }}" class="note_btn">READ NOW &nbsp; <i
                            class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-5">
                <div class="image-wrapper bounce-on-hover">
                    <img src="{{ asset('images/charts.png') }}" alt="">
                </div>
                <div class="note_info p-2 text-center">
                    <p class="m-0">Lesson Two</p>
                    <h5 class="">Command Style</h5>
                    <a href="{{ url('command') }}" class="note_btn">READ NOW &nbsp; <i
                            class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-5">
                <div class="image-wrapper bounce-on-hover">
                    <img src="{{ asset('images/dark_chart.png') }}" alt="">
                </div>
                <div class="note_info p-2 text-center">
                    <p class="m-0">Lesson Three</p>
                    <h5 class="">Teaching By Task</h5>
                    <a href="{{ url('task') }}" class="note_btn">READ NOW &nbsp; <i
                            class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-5">
                <div class="image-wrapper bounce-on-hover">
                    <img src="{{ asset('images/half_laptop.png') }}" alt="">
                </div>
                <div class="note_info p-2 text-center">
                    <p class="m-0">Lesson Four</p>
                    <h5 class="">Individual Progression</h5>
                    <a href="{{ url('progression') }}" class="note_btn">READ NOW &nbsp; <i
                            class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-5">
                <div class="image-wrapper bounce-on-hover">
                    <img src="{{ asset('images/coffee_laptop.png') }}" alt="">
                </div>
                <div class="note_info p-2 text-center">
                    <p class="m-0">Lesson Five</p>
                    <h5 class="">Guided Discovery</h5>
                    <a href="{{ url('discovery') }}" class="note_btn">READ NOW &nbsp; <i
                            class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-5">
                <div class="image-wrapper bounce-on-hover">
                    <img src="{{ asset('images/palmtop.png') }}" alt="">
                </div>
                <div class="note_info p-2 text-center">
                    <p class="m-0">Lesson Six</p>
                    <h5 class="">Problem Solving</h5>
                    <a href="{{ url('problemsolving') }}" class="note_btn">READ NOW &nbsp; <i
                            class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
        </div>
        <div class="row past__questions">
            <div class="col-12 text-center mb-5 header">
                <h6>Teachers Methodology <br /> (Category Two)</h6>
                <p class="text-dark">
                    Passnownow is Nigeria’s foremost online learning
                    platform that provides students with access to high-quality
                    educational materials tailored to their specific needs which
                    are affordable and easily accessible.Passnownow is Nigeria’s
                    foremost online learning platform that provides students with
                    access to high-quality educational materials tailored to their
                    specific needs which are affordable and easily accessible.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 mb-3">
                <div class="image-wrapper bounce-on-hover">
                    <img src="{{ asset('images/education-removelaptop.png') }}" alt="">
                </div>
                <div class="note_info p-2 text-center">
                    <p class="m-0">Lesson One</p>
                    <h5>Useful Skills For Teachers</h5>
                    <a href="{{ url('useful-skills') }}" class="note_btn">READ NOW &nbsp; <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="image-wrapper bounce-on-hover">
                    <img src="{{ asset('images/dark_chart.png') }}" alt="">
                </div>
                <div class="note_info p-2 text-center">
                    <p class="m-0">Lesson Two</p>
                    <h5>Qualities of a Good Teacher</h5>
                    <a href="{{ url('good-teacher') }}" class="note_btn">READ NOW &nbsp; <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="image-wrapper bounce-on-hover">
                    <img src="{{ asset('images/charts.png') }}" alt="">
                </div>
                <div class="note_info p-2 text-center">
                    <p class="m-0">Lesson Three</p>
                    <h5>Students Motivation</h5>
                    <a href="{{ url('students-motivation') }}" class="note_btn">READ NOW &nbsp; <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
        </div>
    </section>

@endsection
