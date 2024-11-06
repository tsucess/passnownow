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
                <h6>Problem Solving</h6>
                <p class="text-dark">
                    Problem solving is the most independent of learning methods
                    studied within this unit and therefore completely empowers the
                    students to initiate their own learning. This particular methodology
                    is similar to the ‘guided discovery’ methodology, as the teacher makes
                    all decisions about the content of the questions and therefore the correct
                    answers; however the role of arranging sequences that lead to the
                    correct solutions are placed in the hands of the learner. The teacher
                    therefore must assume the role of the facilitator, and be prepared to
                    provide students with feedback rather than solutions. Positive
                    reinforcement is a very important element of the problem solving
                    process, as it will further promote students to provide their ideas,
                    thus further developing individual motivation levels and personal
                    confidence.
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
                    <img src="{{ asset('images/reading.png') }}" alt="" />
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3 p-0">
                <h6 class="m-0">Advantages</h6>
                <ul class="text-dark">
                    <li>
                        Problem solving allows for the development of creativity among
                        students. Empowering students to discover their own answers
                        once again allows students to control their own learning,
                        thus increasing the likelihood that they will retain the information.
                    </li>

                </ul>
            </div>
        </div>
        <div class="row m-0 p-0 mb-3 command__info">
            <div class="col-12 col-md-6 mb-3 p-0">
                <h6 class="m-0">Disadvantages</h6>
                <ul class="text-dark">
                    <li>Inability to achieve the answers may result in a lack of motivation</li>
                    <li>
                        It can only be used with students who are already able to take responsibility for their own learning. If students are not motivated to learn, they will be more likely to be distracted from the task.
                    </li>
                    <li>
                        It can take up a lot of time, as “students must have time and a supportive environment in which to work out solutions”.
                    </li>
                    <li>
                        The outcomes of the lesson may not be achieved if the teacher’s preparation is not adequate..
                    </li>
                    <li>
                        Potential for a lack of teacher control over the class.
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-6 mb-3 p-0">
                <div class="image-wrapped">
                    <img src="{{ asset('images/laughing.png') }}" alt="" />
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
