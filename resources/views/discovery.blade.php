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
                <h6>Guided Discovery</h6>
                <p class="text-dark">
                    Each of the previous methodologies discussed within this
                    paper do not engage students within operations and class
                    functioning. Within these approaches students are ‘not
                    required or induced; neither do they develop spontaneously’.
                    In contrast, allowing individuals to discover the solutions
                    to their own problems allows them to develop the skills and
                    abilities needed to enquire, compare, invent, discover, reflect
                    and draw subsequent conclusions regarding a variety of issues
                    pertinent to that particular individual within that particular
                    environment.
                    <br />
                    <br />
                    The intention of the guided discovery method is for
                    teachers to formulate the underlying structure and content of
                    their lessons in a manner that forces students to discover the
                    answers to a range of problems for themselves. Within this
                    particular methodology it is the role of the teacher to guide
                    and facilitate student learning in order to allow student
                    discovery as well as promote ongoing experimentation and
                    participation.
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
                        It increases student critical awareness.
                    </li>
                    <li>
                        Empowering students to discover their own answers allows them to control their learning, and
                        therefore they will be more likely to retain information.
                    </li>
                    <li>
                        Good for game play and tactical aspects of sports.
                    </li>
                    <li>
                        The structure of drills force students to use teamwork and therefore fosters the others as part of
                        the team”.
                    </li>
                </ul>
            </div>
        </div>
        <div class="row m-0 p-0 mb-3 command__info">
            <div class="col-12 col-md-6 mb-3 p-0">
                <h6 class="m-0">Disadvantages</h6>
                <ul class="text-dark">
                    
                    
                    <li>Students have little input into the planning and development of their lesson and therefore only the
                        requirements of the teacher and the curriculum are addressed.</li>
                    <li>
                        Students can become dependent on guidance and direction to find answers.
                    </li>
                   
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
