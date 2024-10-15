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

    <section class="container-fluid container__subjects mt-5 teacher__subjects explicit">
        <div class="row">
            <div class="col-12 col-md-6 text-center header">
                <h6>Explicit Teaching</h6>
                <div class="image-wrapped linechart">
                    <img src="{{ asset('assets/images/linechart.png') }}" alt=""/>
                </div>
            </div>
            <div class="col-12 col-md-6 text-center header">
                <p class="text-dark">
                    Explicit Teaching is important within the classroom
                    and therefore should not be pushed aside when addressing
                    a range of learning strategies. To help students progress
                    in a particular area, specific knowledge and skills may
                    need to be taught to the students.Explicit Teaching
                    often provides tools that assist students in their
                    studies, and can be evident in all areas of the curriculum.
                    It is important that teachers are explicit within all
                    teaching practices in order to further develop the student.
                </p>
            </div>
        </div>
        <div class="row m-0 p-0 mb-3">
            <div class="col-12 col-md-7 mb-3 p-0">
                <div class="image-wrapped">
                    <img src="{{ asset('assets/images/smiling.png') }}" alt=""/>
                </div>
            </div>
            <div class="col-12 col-md-5 mb-3 p-0">
                <div class="image-wrapped">
                    <img src="{{ asset('assets/images/tutor.png') }}"  alt="" />
                </div>
            </div>
        </div>
    </section>



    <script src="./assets/js/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper(".swiper", {
            // Optional parameters
            direction: "horizontal",
            // effect: "fade",
            loop: true,
            autoplay: {
                dely: '2000'
            },

            // If we need pagination
            pagination: {
                el: ".swiper-pagination",
            },

            // Navigation arrows
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
                size: '1rem'
            },

        });
    </script>
@endsection
