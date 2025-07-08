<!--
    =============================
    Useful Skills Page Blade Template
    =============================
    Displays useful skills for teachers with images and descriptions.
    Add more documentation as needed for maintainability.
-->
@extends('layouts.index')

@section('content')
    <Section class="container-fluid container__banner teacher__banner">
        <div class="row">
            <div class="col-12 banner">
                <h1>Teaching <span class="red_header">Skills</span></h1>
                {{-- <p class="text-center header_content">
                    Passnownow is Nigeria’s foremost online learning platform
                    that provides students with access to high-quality educational
                    materials tailored to their specific needs
                </p> --}}
            </div>
        </div>
    </Section>

    <section class="container-fluid container__subjects mt-5 teacher__subjects explicit skills">
        <div class="row">
            <div class="col-12 col-md-6 header">
                <h6 class="text-start">Useful Skills For Teachers</h6>
                <div class="image-wrapped linechart">
                    <img src="{{ asset('images/linechart.png') }}" alt="" />
                </div>
            </div>
            <div class="col-12 col-md-6 header mb-3">
                <p class="text-dark mb-3">
                    While teaching can certainly be a challenge, it is also one of the most rewarding careers out there.
                    Check out some of the useful skills for teachers to see if there are any areas you need to work on:
                </p>
                <img src="{{ asset('images/icon-slant-right.png') }}" class="icon-slant" alt="" />
            </div>
        </div>
        <div class="row m-0 p-0 mb-3">
            <div class="col-12 mb-3 p-0">
                <div class="image-wrapped skills_hero">
                    <img src="{{ asset('images/childreading.png') }}" alt="" />
                </div>
            </div>
        </div>
        <div class="row skill_list">
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Patience</h5>
                <p class="text-dark mb-3">
                    This is likely the single most important skill. Kids these days are stubborn, and many lack the inherent respect for authority that we were taught at a young age. Spending a single day in a room full of raucous teenagers is enough to send any human being to the looney bin, which is why every good teacher needs patience in order to find a way to work with his students and earn their respect.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Constant Learning</h5>
                <p class="text-dark mb-3">
                    You can never know too much when you are a teacher, especially when it comes to the best way to teach your students. Great teachers are constantly looking for ways to expand their horizons with courses, workshops, and seminars. Make sure you don’t become stagnant by taking courses to keep the content fresh in your mind.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Adaptability</h5>
                <p class="text-dark mb-3">
                    This is likely the single most important skill. Kids these days are stubborn, and many lack the inherent respect for authority that we were taught at a young age. Spending a single day in a room full of raucous teenagers is enough to send any human being to the looney bin, which is why every good teacher needs patience in order to find a way to work with his students and earn their respect.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Communication</h5>
                <p class="text-dark mb-3">
                    You can never know too much when you are a teacher, especially when it comes to the best way to teach your students. Great teachers are constantly looking for ways to expand their horizons with courses, workshops, and seminars. Make sure you don’t become stagnant by taking courses to keep the content fresh in your mind.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Imagination</h5>
                <p class="text-dark mb-3">
                    This is likely the single most important skill. Kids these days are stubborn, and many lack the inherent respect for authority that we were taught at a young age. Spending a single day in a room full of raucous teenagers is enough to send any human being to the looney bin, which is why every good teacher needs patience in order to find a way to work with his students and earn their respect.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Mentoring</h5>
                <p class="text-dark mb-3">
                    You can never know too much when you are a teacher, especially when it comes to the best way to teach your students. Great teachers are constantly looking for ways to expand their horizons with courses, workshops, and seminars. Make sure you don’t become stagnant by taking courses to keep the content fresh in your mind.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Teamwork</h5>
                <p class="text-dark mb-3">
                    This is likely the single most important skill. Kids these days are stubborn, and many lack the inherent respect for authority that we were taught at a young age. Spending a single day in a room full of raucous teenagers is enough to send any human being to the looney bin, which is why every good teacher needs patience in order to find a way to work with his students and earn their respect.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Leadership</h5>
                <p class="text-dark mb-3">
                    You can never know too much when you are a teacher, especially when it comes to the best way to teach your students. Great teachers are constantly looking for ways to expand their horizons with courses, workshops, and seminars. Make sure you don’t become stagnant by taking courses to keep the content fresh in your mind.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Risk Taking</h5>
                <p class="text-dark mb-3">
                    This is likely the single most important skill. Kids these days are stubborn, and many lack the inherent respect for authority that we were taught at a young age. Spending a single day in a room full of raucous teenagers is enough to send any human being to the looney bin, which is why every good teacher needs patience in order to find a way to work with his students and earn their respect.
                </p>
            </div>
        </div>
    </section>

@endsection
