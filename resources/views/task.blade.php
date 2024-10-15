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
                <h6>Teaching By Task</h6>
                <p class="text-dark">
                    The ‘teaching by task’ methodology was developed upon
                    the notions of personal practice, independent learning
                    and individual development. The task style of teaching
                    allows students to develop at their own rate and in their
                    own direction. This particular methodology empowers
                    students to take responsibility for their own learning
                    and therefore fosters the possibility of ‘deeper’
                    learning across a range of different areas. The nine
                    decisions that are transferred from the teacher to
                    the learner within this style are: “Location, Order
                    of tasks, Starting time per task, Pace and rhythm,
                    stopping time per task, Interval, Initiating questions
                    for clarification, Attire and appearance, and Posture”
                    As a result of such student empowerment a deeper
                    appreciation for education can be fostered, thus
                    making ongoing participation within all subject
                    areas more likely.
                </p>
            </div>
            <div class="col-12 col-md-6 text-center header">
                <div class="image-wrapped">
                    <img src="{{ asset('assets/images/command.png') }}" alt="" />
                </div>
            </div>
        </div>
        <div class="row m-0 p-0 mb-3 command__info">
            <div class="col-12 col-md-6 mb-3 p-0">
                <div class="image-wrapped">
                    <img src="{{ asset('assets/images/reading.png') }}" alt="" />
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3 p-0">
                <h6 class="m-0">Advantages</h6>
                <ul class="text-dark">
                    <li>
                        The teacher maintains control over what is being learned and therefore can ensure that the lesson
                        meets the needs and requirements of the curriculum.
                    </li>
                    <li>
                        Within this methodology the teacher is able to move amongst the class and supply individual feedback
                        while providing extension activities as required.
                    </li>
                    <li>
                        This style of teaching increases social interaction between students and therefore increases
                        motivation levels, self-confidence as well as one’s ability to work both independently and as a
                        member of a
                        group.
                    </li>
                    <li>
                        It allows the teacher to provide more individual feedback to members of the class. Such feedback can
                        improve student motivation either through positive reinforcement or through the improvement gained
                        as a result of technique development.
                    </li>
                    <li>
                        This particular methodology allows students to experiment with a variety of skills and techniques
                        while still allowing the teacher to direct student learning
                    </li>
                </ul>
            </div>
        </div>
        <div class="row m-0 p-0 mb-3 command__info">
            <div class="col-12 col-md-6 mb-3 p-0">
                <h6 class="m-0">Disadvantages</h6>
                <ul class="text-dark">
                    <li>Little student input into the lesson, as the teacher essentially remains in control</li>
                    <li>
                        This style does not allow for a definitive standard to be achieved. The style is therefore not as
                        useful when addressing skills or knowledge areas where specific techniques, movements or products
                        are required
                    </li>
                    <li> Assumes all individuals are of the same abilities and motivations and therefore restricts or
                        hurries individual programs</li>
                    <li>
                        There is a greater possibility that students will be distracted from the task when compared with the
                        command style of teaching.
                    </li>
                    <li>
                        The activities of students are more difficult to supervise and therefore distractions are more
                        likely.
                    </li>
                    <li>While students are able to experiment with the knowledge and skills presented creative thinking is
                        not promoted.</li>
                </ul>
            </div>
            <div class="col-12 col-md-6 mb-3 p-0">
                <div class="image-wrapped">
                    <img src="{{ asset('assets/images/laughing.png') }}" alt="" />
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
