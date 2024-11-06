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

    <section class="container-fluid container__subjects mt-lg-5 teacher__subjects container__programs">
        <div class="row">
            <div class="col-12 text-center mb-5 header">
                <h6 class="red_header">Nigeria’s foremost Education Technology Portal</h6>
                <p class="text-dark">
                    It is important that teachers learn to use a variety of teaching
                    methodologies in order to cater for the range of learning needs
                    and requirements that are present within most class environments.
                    Within this section a variety of teaching methodologies will be
                    explored and their various advantages and disadvantages outlined.
                </p>
            </div>
        </div>
        <div class="row mb-5 guides">
            <div class="col-12 col-md-4 mb-lg-3 guide">
                <img src="{{ asset('images/icons-graph.png') }}" alt="Icon" class="mb-3" />
                <h3 class="text-dark fw-bold">Over 50,000 Syllabus</h3>
                <p class="text-dark">The first step is to create a free account with Passnownow by completing the user
                    registration form.
                </p>
                <a href="{{ url('#') }}" class="note_btn">Read More &nbsp; <i
                        class="fa-solid fa-arrow-right-long"></i></a>
            </div>
            <div class="col-12 col-md-4 mb-lg-3 guide">
                <img src="{{ asset('images/icons-pie.png') }}" alt="Icon" class="mb-3" />
                <h3 class="text-dark fw-bold">Subscribe to a plan</h3>
                <p class="text-dark">Choose from any of our packages to gain access to unlimited Class Notes and Exam Past
                    Questions.</p>
                <a href="{{ url('#') }}" class="note_btn">Read More &nbsp; <i
                        class="fa-solid fa-arrow-right-long"></i></a>
            </div>
            <div class="col-12 col-md-4 mb-lg-3 guide">
                <img src="{{ asset('images/icons-filter.png') }}" alt="Icon" class="mb-3" />
                <h3 class="text-dark fw-bold">50,000 + JSS1 TO SS3 Class Notes</h3>
                <p class="text-dark">That’s it, you now have access to unlimited Class Notes and Exam Past Questions.</p>
                <a href="{{ url('#') }}" class="note_btn">Read More &nbsp; <i
                        class="fa-solid fa-arrow-right-long"></i></a>
            </div>
            <div class="col-12 col-md-4 mb-lg-3 guide">
                <img src="{{ asset('images/icons-briefcase.png') }}" alt="Icon" class="mb-3" />
                <h3 class="text-dark fw-bold">Exam Past Questions</h3>
                <p class="text-dark">Seek advice on your career path from our experienced career counselor</p>
                <a href="{{ url('#') }}" class="note_btn">Read More &nbsp; <i
                        class="fa-solid fa-arrow-right-long"></i></a>
            </div>
            <div class="col-12 col-md-4 mb-lg-3 guide">
                <img src="{{ asset('images/icons-love.png') }}" alt="Icon" class="mb-3" />
                <h3 class="text-dark fw-bold">Student Discussion Forums</h3>
                <p class="text-dark">Passnownow gives you access to Thousands of exam past questions from JSCE, JSSCE TO
                    JAMB</p>
                <a href="{{ url('#') }}" class="note_btn">Read More &nbsp; <i
                        class="fa-solid fa-arrow-right-long"></i></a>
            </div>
        </div>
        <div class="row mb-5 program">
            <div class="col-12 col-md-6 text-center mx-auto">
                <h6 class="">Programs Under PassNowNow</h6>
            </div>
        </div>
        <div class="row program mb-5">
            <div class="col-12 col-md-6 mb-3">
                <div class="image-wrapper">
                    <img src="{{ asset('images/education-removelaptop.png') }}" alt="">
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <div class="note_info p-2 text-center">
                    <h5>DIGITEACH-NG</h5>
                    <p class="m-0">
                        The Passnownow.com initiative aims to equip high school
                        students and teachers in Nigeria, starting with five Lagos
                        state schools, with basic ICT skills over one academic term.
                        The program will cover topics such as basic computer literacy,
                        internet research, Microsoft PowerPoint presentations, and the
                        use of computers and projectors in classrooms. The first pilot
                        phase, set to begin in 2018, will train 75 students and 25 teachers,
                        with a total of 500 participants. Certificates of participation
                        co-branded and signed by HP and Passnownow.com will be awarded upon
                        completion of the training.
                    </p>
                </div>
            </div>
        </div>
        <div class="row program mb-5">
            <div class="col-12 col-md-6 mb-3">
                <div class="note_info p-2 text-center">
                    <h5>STEAMIZENS (Steam Citizens)</h5>
                    <p class="m-0">
                        The STEAMIZENS program is an intensive 30-week STEAM-focused
                        program designed to equip 120 secondary school students in Nigeria between the ages of 10 and 18
                        with the tools, skills, techniques, and methodologies for pursuing careers in science, technology,
                        engineering, art, and math. The program partners with the Nigerian Society of Engineers and the
                        Association of Women Engineers of Nigeria to provide certification and post-program mentoring for
                        the participants. The training is provided by practicing artists and engineers, as well as
                        professors of fine arts and engineering from universities and outstanding art, science, and tech
                        teachers from secondary schools. The program uses a global curriculum to solve local problems and
                        culminates in a STEAM-KATHON competition where participants solve specific problems affecting their
                        region. The program also focuses on soft skills such as entrepreneurship and innovation to prepare
                        students for internships and workplace readiness.
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <div class="image-wrapper">
                    <img src="{{ asset('images/dark_chart.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="row program mb-5">
            <div class="col-12 col-md-6 mb-3">
                <div class="image-wrapper">
                    <img src="{{ asset('images/dark_chart.png') }}" alt="">
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <div class="note_info p-2 text-center">
                    <h5>TAKADA (TEACHING SKILLS TRAINING PROGRAM FOR TEACHERS IN NORTHERN NIGERIA)</h5>
                    <p class="m-0">The TAKADA project is a literacy empowerment program for children in Northern Nigeria,
                        with a focus on rural communities. It involves a Train-the-Trainer Plan to train youths and adults
                        as community organizers to provide coaching programs that improve literacy levels of primary school
                        pupils. The aim is to empower youth and adults to become agents of social change in their
                        communities by ensuring children can read and write before the age of 10. The program plans to
                        extend to pastoral families and explore alternative modes of teaching via local and cheap
                        communication means, partnering with media platforms such as the BBC to reach the target audience.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center mb-5 header">
                <h6 class="red_header">The eLearning Summit Nigeria</h6>
                <p class="text-dark">
                    The education sector in Nigeria has faced challenges due to factors such as population growth, low
                    government budget allocation, and limited resources. However, technology is driving change in teaching
                    and learning paradigms, with e-learning providing affordable access to educational content. The
                    e-learning market in Africa is projected to be worth over $530 million by 2018. An upcoming Summit will
                    focus on e-learning tools, resources, services, and best practices, and will offer opportunities for
                    collaboration on the use of technology in education.
                </p>
            </div>
        </div>
    </section>
@endsection
