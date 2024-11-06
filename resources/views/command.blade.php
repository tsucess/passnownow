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

    <section class="container-fluid container__subjects mt-5 teacher__subjects command">
        <div class="row mb-5">
            <div class="col-12 col-md-6 text-center header">
                <h6>Command Style Teaching</h6>
                <p class="text-dark">
                    The underlying principle of the “Command Style is that teachers
                    should be the sole authoritarian figure within their classroom.
                    Within such approaches the teacher is required to maintain absolute
                    control over the class and therefore must execute a strict and highly
                    regulated lesson structure. The students within the class are required
                    to comply with commands of the teacher and therefore execute all
                    activities to a required standard and within a given time limit.
                    Command style of teaching occurs when ‘the teacher makes the maximum
                    number of choices, while the learner makes only minimal decisions’ Within
                    this methodology it is the role of the teacher to initiate all learning
                    sequences, while students are required to follow and adhere to all rules
                    and restrictions implemented throughout the lesson. The defining
                    characteristic of the command style is ‘precision performance –
                    reproducing a predicted response or
                    performance on cue’
                </p>
            </div>
            <div class="col-12 col-md-6 text-center header">
                <div class="image-wrapped">
                    <img src="{{ asset('images/command.png') }}" alt="" />
                </div>
            </div>
        </div>
        <div class="row m-0 p-0 mb-3 command__info">
            <div class="col-12 col-md-6 mb-3 p-0">
                <div class="image-wrapped">
                    <img src="{{ asset('images/smiling.png') }}" alt="" />
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3 p-0">
                <h6 class="m-0">Advantages</h6>
                <ul class="text-dark">
                    <li>Greater possibility of tasks being completed on time.</li>
                    <li>The teacher has ultimate control over the class.</li>
                    <li>Greater potential for lesson to be executed as planned.</li>
                    <li>Achieving basic curriculum objectives</li>
                    <li>Will increase discipline and is therefore useful within classes where this is an issue.</li>
                    <li>Has potential to achieve accuracy and precision in performance and is therefore useful when a
                        predetermined model must be adhered to, or a synchronized performance is required.</li>
                </ul>
            </div>
        </div>
        <div class="row m-0 p-0 mb-3 command__info">
            <div class="col-12 col-md-6 mb-3 p-0">
                <h6 class="m-0">Disadvantages</h6>
                <ul class="text-dark">
                    <li>No student input into lesson and therefore may fail to foster ‘deep learning’.</li>
                    <li>It does not allow for creativity thinking by students</li>
                    <li> Assumes all individuals are of the same abilities and motivations and therefore restricts or hurries
                        individual programs</li>
                    <li>Decreases social interaction and subsequently levels of self esteem and motivation</li>
                </ul>
            </div>
            <div class="col-12 col-md-6 mb-3 p-0">
                <div class="image-wrapped">
                    <img src="{{ asset('images/smiling.png') }}" alt="" />
                </div>
            </div>
        </div>
    </section>



    <script src="./js/swiper-bundle.min.js"></script>
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
