@extends('layouts.index')

@section('content')
    <Section class="container-fluid container__banner pastquestion__banner">
        <div class="row">
            <div class="col-12 banner">
                <h1>PAST <span class="red_header">QUESTIONS</span> </h1>
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

    <section class="container-fluid container__subjects mt-5">
        <div class="row only_subjects">
            <div class="col-12 col-md-4 mb-4">
                <div class="image-wrapper">
                    <img src="{{ asset('assets/images/educationbook.png') }}" alt="">
                </div>
                <div class="note_info p-2">
                    <h5>JSSCE Past Questions</h5>
                    <p>Test yourself on any JSSCE Exam Past Questions</p>
                    <a href="#" class="note_btn">VIEW ALL QUESTIONS</a>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="image-wrapper">
                    <img src="{{ asset('assets/images/student-writing.png') }}" alt="">
                </div>
                <div class="note_info p-2">
                    <h5>SSCE Past Questions</h5>
                    <p>Test yourself on any JSSCE Exam Past Questions</p>
                    <a href="#" class="note_btn">VIEW ALL QUESTIONS</a>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="image-wrapper">
                    <img src="{{ asset('assets/images/education-stackbook.png') }}" alt="">
                </div>
                <div class="note_info p-2">
                    <h5>UTME/JAMB Past Questions</h5>
                    <p>Test yourself on any JSSCE Exam Past Questions</p>
                    <a href="#" class="note_btn">VIEW ALL QUESTIONS</a>
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
