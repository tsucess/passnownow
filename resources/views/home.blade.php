@extends('layouts.index')

@section('content')
    <main class="container-fluid">
        <section class="container-fluid container__top pt-3">
            <div class="row">
                <div class="col-3 col-md-2">
                    <img src="{{ asset('images/Chemistry.png') }}" alt="Chemistry">
                    <p class="title">Chemistry</p>
                </div>
                <div class="col-3 col-md-2">
                    <img src="{{ asset('images/Cloud_Library.png') }}" alt="Computer">
                    <p class="title">Computer</p>
                </div>
                <div class="col-3 col-md-2">
                    <img src="{{ asset('images/Geography.png') }}" alt="Geography">
                    <p class="title">Geography</p>
                </div>
                <div class="col-3 col-md-2">
                    <img src="{{ asset('images/Biology.png') }}" alt="Biology">
                    <p class="title">Biology</p>
                </div>
                <div class="col-3 col-md-2">
                    <img src="{{ asset('images/Maths.png') }}" alt="Mathematics">
                    <p class="title">Mathematics</p>
                </div>
                <div class="col-3 col-md-2">
                    <img src="{{ asset('images/Sports.png') }}" alt="Physical Health">
                    <p class="title">Physical Health</p>
                </div>
            </div>
        </section>

        <Section class="container-fluid container__hero">
            <div class="row">
                <div class="col-12 col-md-6 hero__content">
                    <p class="total-enrol">6,000+ Students Enrolled</p>
                    <h1>Take Control of your Education Anytime, Anywhere</h1>
                    <p class="hero__info">Super simple self studying, peer to peer collaborative learning both for teachers
                        and students</p>
                    <div class="hero-btn">
                        <a href="{{ url('register') }}" class="btn btn-outline-primary btn-style">Register &nbsp; <i
                                class="fa-solid fa-arrow-right"></i></a>
                        <a href="#learnMore" class="btn btn-style btn-style-secondary">Learn More</a>
                    </div>
                </div>
                <div class="col-12 col-md-6  hero-image">
                    <img src="{{ asset('images/hero-image.png') }}" alt="Hero Image">
                </div>
            </div>
        </Section>

        <section class="container-fluid container__review">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-6 heading">
                    <h3>Learn from the largest education resources for students in Nigeria</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-9 px-lg-4  mx-auto reviews">
                    <div class="row">
                        <div class="col-12 col-md-6 review">
                            <h3>5M+</h3>
                            <p>Lifetime <br /> Learners</p>
                        </div>
                        <div class="col-12 col-md-6 review">
                            <h3>1M+</h3>
                            <p>Career <br /> Advices</p>
                        </div>
                        <div class="col-12 col-md-6 review">
                            <h3>70%</h3>
                            <p>High Academic <br /> Performance</p>
                        </div>
                        <div class="col-12 col-md-6 review">
                            <h3>5M+</h3>
                            <p>Daily <br /> Messages</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-fluid container__guide">
            <div class="row ">
                <div class="col-12 col-md-3 text-center">
                    <img src="{{ asset('images/formular.png') }}" alt="" class="formular-image">
                </div>
                <div class="col-12 col-md-6 heading">
                    <h3>How Passnownow Works</h3>
                    <p>
                        Passnownow is Nigeria’s foremost online learning platform that provides students with access to
                        high-quality educational materials tailored to their specific needs which are affordable and easily
                        accessible.
                    </p>
                </div>
                <div class="col-12 col-md-3 text-center">
                    <img src="{{ asset('images/trig.png') }}" alt="" class="formular-image">
                </div>
            </div>
            <div class="row guides animate__animated animate__bounce" id = "learnMore">
                <div class="col-12 col-md-4 mb-lg-3 guide">
                    <img src="{{ asset('images/icon-user.png') }}" alt="Icon" class="mb-3" />
                    <h3>Create free account</h3>
                    <p>The first step is to create a free account with Passnownow by completing the user registration form.
                    </p>
                </div>
                <div class="col-12 col-md-4 mb-lg-3 guide">
                    <img src="{{ asset('images/icon-card.png') }}" alt="Icon" class="mb-3" />
                    <h3>Subscribe to a plan</h3>
                    <p>Choose from any of our packages to gain access to unlimited Class Notes and Exam Past Questions.</p>
                </div>
                <div class="col-12 col-md-4 mb-lg-3 guide">
                    <img src="{{ asset('images/icon-book.png') }}" alt="Icon" class="mb-3" />
                    <h3>Access all subjects</h3>
                    <p>That’s it, you now have access to unlimited Class Notes and Exam Past Questions.</p>
                </div>
                <div class="col-12 col-md-4 mb-lg-3 guide">
                    <img src="{{ asset('images/icon-message.png') }}" alt="Icon" class="mb-3" />
                    <h3>Seek career advice</h3>
                    <p>Seek advice on your career path from our experienced career counselor</p>
                </div>
                <div class="col-12 col-md-4 mb-lg-3 guide">
                    <img src="{{ asset('images/icon-shield.png') }}" alt="Icon" class="mb-3" />
                    <h3>Access to past questions</h3>
                    <p>Passnownow gives you access to Thousands of exam past questions from JSCE, JSSCE TO JAMB</p>
                </div>
                <div class="col-12 col-md-4 mb-lg-3 guide">
                    <img src="{{ asset('images/icon-medal.png') }}" alt="Icon" class="mb-3" />
                    <h3>Improve academic performance</h3>
                    <p>Learn with Passnownow to improve academic performance</p>
                </div>
            </div>
        </section>

        <Section class="container-fluid container__hero-down mb-3">
            <div class="row">
                <div class="col-12 col-md-6 hero-down__content">
                    <p class="total-enrol">We do home tutoring the right way.</p>
                    <h1>Passnownow: Your Partner In Lifelong Learning.</h1>
                    <p class="hero-down__info">Make Passnownow your partner in lifelomg learning, providing you with the
                        resources and support you need to succeed at every stage of your journey.</p>
                    <div class="hero-btn">
                        <a href="{{ url('register') }}" class="btn btn-outline-primary btn-style">Register &nbsp; <i
                                class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-12 col-md-6  hero-down-image">
                    <img src="{{ asset('images/hero_down.png') }}" alt="Hero Image">
                </div>
            </div>
        </Section>

        <section class="container-fluid container__std_review">
            <div class="row">
                <div class="col-12 col-md-2 text-end">
                    <img src="{{ asset('images/quote_trans.png') }}" alt="" class="quote-down-image">
                </div>
                <div class="col-12 col-md-8 heading px-4 px-md-2">
                    <h6>Rave Reviews from our amazing students! 😍</h6>
                </div>
                <div class="col-12 col-md-2">
                </div>
            </div>
            <div class="row reviews mb-5">
                <!-- Slider main container -->
                <div class="swiper col-12">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide text-center review">
                            <p>
                                “I had a full-on practical experience during my training. I have learned priceless technical
                                skills in robotics and Python programming. My love for STEM has grown seriously as a result
                                of the engaging curriculum and supportive community. I strongly recommend this Program to
                                teenagers out there who wish to have an exceptional learning experience.”
                            </p>
                            <div class="rating text-center pt-3">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <h5 class="title mt-2">Yusuf Gambo</h5>
                                <p>Cohorts 3</p>
                            </div>
                        </div>
                        <div class="swiper-slide text-center review">
                            <p>
                                “I had a full-on practical experience during my training. I have learned priceless technical
                                skills in robotics and Python programming. My love for STEM has grown seriously as a result
                                of the engaging curriculum and supportive community. I strongly recommend this Program to
                                teenagers out there who wish to have an exceptional learning experience.”
                            </p>
                            <div class="rating text-center pt-3">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <h5 class="title pt-2">Mose John</h5>
                                <p>Cohorts 3</p>
                            </div>
                        </div>
                        <div class="swiper-slide text-center review">
                            <p>
                                “I had a full-on practical experience during my training. I have learned priceless technical
                                skills in robotics and Python programming. My love for STEM has grown seriously as a result
                                of the engaging curriculum and supportive community. I strongly recommend this Program to
                                teenagers out there who wish to have an exceptional learning experience.”
                            </p>
                            <div class="rating text-center pt-3">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <h5 class="title pt-2">Samuel Mary</h5>
                                <p>Cohorts 5</p>
                            </div>
                        </div>
                        <div class="swiper-slide text-center review">
                            <p>
                                “I had a full-on practical experience during my training. I have learned priceless technical
                                skills in robotics and Python programming. My love for STEM has grown seriously as a result
                                of the engaging curriculum and supportive community. I strongly recommend this Program to
                                teenagers out there who wish to have an exceptional learning experience.”
                            </p>
                            <div class="rating text-center pt-3">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <h5 class="title pt-2">David Adeshola</h5>
                                <p>Cohorts 5</p>
                            </div>
                        </div>

                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
            <div class="row frames">
                <div class="col-12 col-md-4 my-3 frame">
                    <img src="{{ asset('images/users_1.png') }}" alt="">
                </div>
                <div class="col-12 col-md-4 my-3 frame mobile">
                    <img src="{{ asset('images/mobile-frame.png') }}" alt="">
                </div>
                <div class="col-12 col-md-4 my-3 frame">
                    <img src="{{ asset('images/users_2.png') }}" alt="">
                </div>
            </div>
        </section>

        <Section class="container-fluid container__performance">
            <div class="bg-image">
                <div class="row">
                    <div class="col-12 col-md-2 col-lg-3"></div>
                    <div class="col-12 col-md-8 col-lg-6 performance__content">
                        <p class="total-enrol">We deliver the best results, periods.</p>
                        <h1>Passnownow students perform 3x better in class and school exams</h1>
                    </div>
                    <div class="col-12 col-md-2 col-lg-3"></div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 barchart mt-4">
                        <img src="{{ asset('images/barchart.png') }}" alt="">
                    </div>
                    <div class="col-12 col-md-6 performance__info">
                        <div class="lists">
                            <p class="list_sn">1</p>
                            <p class="list">We work with you to ensure your kids excel at every stage of their learning
                                journey</p>
                        </div>
                        <div class="lists">
                            <p class="list_sn">2</p>
                            <p class="list">Whether it's building early foundations, helping with homework, getting
                                better grades, mastering their subjects or passing pivotal exams.</p>
                        </div>
                        <div class="lists">
                            <p class="list_sn">3</p>
                            <p class="list">Whether it's building early foundations, helping with homework, getting
                                better grades, mastering their subjects or passing pivotal exams.</p>
                        </div>
                        <div class="lists">
                            <p class="list_sn">4</p>
                            <p class="list">Whether it's building early foundations, helping with homework, getting
                                better grades, mastering their subjects or passing pivotal exams.</p>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 col-md-2 text-end">
                        <img src="{{ asset('images/quote_tr.png') }}" alt="" class="quote-down-image">
                    </div>
                    <div class="col-12 col-md-8 heading px-4 px-md-2">
                        <h6>Rave Reviews from our amazing Tutors!! 😍</h6>
                    </div>
                    <div class="col-12 col-md-2">
                    </div>
                </div>
                <div class="row reviews mb-5">
                    <!-- Slider main container -->
                    <div class="swiper col-12">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide text-center review">
                                <p>
                                    “I had a full-on practical experience during my training. I have learned priceless
                                    technical
                                    skills in robotics and Python programming. My love for STEM has grown seriously as a
                                    result
                                    of the engaging curriculum and supportive community. I strongly recommend this Program
                                    to
                                    teenagers out there who wish to have an exceptional learning experience.”
                                </p>
                                <div class="rating text-center pt-3">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <h5 class="title pt-2">Yusuf Gambo</h5>
                                    <p>Cohorts 3</p>
                                </div>
                            </div>
                            <div class="swiper-slide text-center review">
                                <p>
                                    “I had a full-on practical experience during my training. I have learned priceless
                                    technical
                                    skills in robotics and Python programming. My love for STEM has grown seriously as a
                                    result
                                    of the engaging curriculum and supportive community. I strongly recommend this Program
                                    to
                                    teenagers out there who wish to have an exceptional learning experience.”
                                </p>
                                <div class="rating text-center pt-3">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <h5 class="title pt-2">Mose John</h5>
                                    <p>Cohorts 3</p>
                                </div>
                            </div>
                            <div class="swiper-slide text-center review">
                                <p>
                                    “I had a full-on practical experience during my training. I have learned priceless
                                    technical
                                    skills in robotics and Python programming. My love for STEM has grown seriously as a
                                    result
                                    of the engaging curriculum and supportive community. I strongly recommend this Program
                                    to
                                    teenagers out there who wish to have an exceptional learning experience.”
                                </p>
                                <div class="rating text-center pt-3">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <h5 class="title pt-2">Samuel Mary</h5>
                                    <p>Cohorts 5</p>
                                </div>
                            </div>
                            <div class="swiper-slide text-center review">
                                <p>
                                    “I had a full-on practical experience during my training. I have learned priceless
                                    technical
                                    skills in robotics and Python programming. My love for STEM has grown seriously as a
                                    result
                                    of the engaging curriculum and supportive community. I strongly recommend this Program
                                    to
                                    teenagers out there who wish to have an exceptional learning experience.”
                                </p>
                                <div class="rating text-center pt-3">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <h5 class="title pt-2">David Adeshola</h5>
                                    <p>Cohorts 5</p>
                                </div>
                            </div>
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </Section>

        <section class="container-fluid container__notes">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h6>Class Notes</h6>
                </div>
            </div>
            <div class="row">
                @foreach ($fetchClasses as $class)
                    <div class="col-12 col-md-4 mb-3">
                        <div class="image-wrapper h-50">
                            <img src="{{ asset('storage/' . $class->avatar) }}" alt="">
                        </div>
                        <div class="note_info p-2">
                            <h5>{{ $class->title }} Class Notes</h5>
                            <p> {{ $class->description }}</p>
                            <a href="{{ url('/subjects') }}" class="note_btn">VIEW ALL SUBJECTS</a>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-12 col-md-4 mb-3">
                    <div class="image-wrapper">
                        <img src="{{ asset('images/student-writing.png') }}" alt="">
                    </div>
                    <div class="note_info p-2">
                        <h5>JSS 1 Class Notes</h5>
                        <p>Start studying with our wide collection of all SSS 1 Class Notes all Terms on all Secondary
                            School Subjects</p>
                        <button class="note_btn">VIEW ALL SUBJECTS</button>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <div class="image-wrapper">
                        <img src="{{ asset('images/student-writing.png') }}" alt="">
                    </div>
                    <div class="note_info p-2">
                        <h5>JSS 2 Class Notes</h5>
                        <p>Start studying with our wide collection of all SSS 1 Class Notes all Terms on all Secondary
                            School Subjects</p>
                        <button class="note_btn">VIEW ALL SUBJECTS</button>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <div class="image-wrapper">
                        <img src="{{ asset('images/student-writing.png') }}" alt="">
                    </div>
                    <div class="note_info p-2">
                        <h5>JSS 3 Class Notes</h5>
                        <p>Start studying with our wide collection of all SSS 1 Class Notes all Terms on all Secondary
                            School Subjects</p>
                        <button class="note_btn">VIEW ALL SUBJECTS</button>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <div class="image-wrapper">
                        <img src="{{ asset('images/student-writing.png') }}" alt="">
                    </div>
                    <div class="note_info p-2">
                        <h5>SSS 1 Class Notes</h5>
                        <p>Start studying with our wide collection of all SSS 1 Class Notes all Terms on all Secondary
                            School Subjects</p>
                        <button class="note_btn">VIEW ALL SUBJECTS</button>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <div class="image-wrapper">
                        <img src="{{ asset('images/student-writing.png') }}" alt="">
                    </div>
                    <div class="note_info p-2">
                        <h5>SSS 2 Class Notes</h5>
                        <p>Start studying with our wide collection of all SSS 1 Class Notes all Terms on all Secondary
                            School Subjects</p>
                        <button class="note_btn">VIEW ALL SUBJECTS</button>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <div class="image-wrapper">
                        <img src="{{ asset('images/student-writing.png') }}" alt="">
                    </div>
                    <div class="note_info p-2">
                        <h5>SSS 3 Class Notes</h5>
                        <p>Start studying with our wide collection of all SSS 1 Class Notes all Terms on all Secondary
                            School Subjects</p>
                        <button class="note_btn">VIEW ALL SUBJECTS</button>
                    </div>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h6>Past Questions</h6>
                </div>
            </div>
            <div class="row past__questions">
                @foreach ($fetchExams as $exam)
                    <div class="col-12 col-md-4 mb-3">
                        <div class="image-wrapper h-50">
                            <img src="{{ asset('storage/'.$exam->avatar) }}" alt="">
                        </div>
                        <div class="note_info p-2">
                            <h5>{{$exam->title}} Past Questions</h5>
                            <p>{{$exam->description}}</p>
                            <a href="{{ url('/pastquestions') }}" class="note_btn">VIEW ALL QUESTIONS</a>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-12 col-md-4 mb-3">
                    <div class="image-wrapper">
                        <img src="{{ asset('images/student-writing.png') }}" alt="">
                    </div>
                    <div class="note_info p-2">
                        <h5>JSSCE Past Questions</h5>
                        <p>Test yourself on any JSSCE Exam Past Questions</p>
                        <button class="note_btn">VIEW ALL SUBJECTS</button>
                    </div>
                </div> --}}
                {{-- <div class="col-12 col-md-4 mb-3">
                    <div class="image-wrapper">
                        <img src="{{ asset('images/student-writing.png') }}" alt="">
                    </div>
                    <div class="note_info p-2">
                        <h5>SSCE Past Questions</h5>
                        <p>Test yourself on any JSSCE Exam Past Questions</p>
                        <button class="note_btn">VIEW ALL SUBJECTS</button>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <div class="image-wrapper">
                        <img src="{{ asset('images/student-writing.png') }}" alt="">
                    </div>
                    <div class="note_info p-2">
                        <h5>UTME/JAMB Past Questions</h5>
                        <p>Test yourself on any JSSCE Exam Past Questions</p>
                        <button class="note_btn">VIEW ALL SUBJECTS</button>
                    </div>
                </div> --}}
            </div>
        </section>

        <section class="container-fluid container__parent_review">
            <div class="row my-4">
                <div class="col-12 col-md-2 text-end">
                    <img src="{{ asset('images/quote_trans.png') }}" alt="" class="quote-down-image">
                </div>
                <div class="col-12 col-md-8 heading px-4 px-md-2">
                    <h6>Rave Reviews from our amazing parents! 😍</h6>
                </div>
                <div class="col-12 col-md-2">
                </div>
            </div>
            <div class="row reviews mb-5">
                <!-- Slider main container -->
                <div class="swiper col-12">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide text-center review">
                            <p>
                                “I had a full-on practical experience during my training. I have learned priceless technical
                                skills in robotics and Python programming. My love for STEM has grown seriously as a result
                                of the engaging curriculum and supportive community. I strongly recommend this Program to
                                teenagers out there who wish to have an exceptional learning experience.”
                            </p>
                            <div class="rating text-center pt-3">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <h5 class="title">Yusuf Gambo</h5>
                                <p>Cohorts 3</p>
                            </div>
                        </div>
                        <div class="swiper-slide text-center review">
                            <p>
                                “I had a full-on practical experience during my training. I have learned priceless technical
                                skills in robotics and Python programming. My love for STEM has grown seriously as a result
                                of the engaging curriculum and supportive community. I strongly recommend this Program to
                                teenagers out there who wish to have an exceptional learning experience.”
                            </p>
                            <div class="rating text-center pt-3">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <h5 class="title">Mose John</h5>
                                <p>Cohorts 3</p>
                            </div>
                        </div>
                        <div class="swiper-slide text-center review">
                            <p>
                                “I had a full-on practical experience during my training. I have learned priceless technical
                                skills in robotics and Python programming. My love for STEM has grown seriously as a result
                                of the engaging curriculum and supportive community. I strongly recommend this Program to
                                teenagers out there who wish to have an exceptional learning experience.”
                            </p>
                            <div class="rating text-center pt-3">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <h5 class="title">Samuel Mary</h5>
                                <p>Cohorts 5</p>
                            </div>
                        </div>
                        <div class="swiper-slide text-center review">
                            <p>
                                “I had a full-on practical experience during my training. I have learned priceless technical
                                skills in robotics and Python programming. My love for STEM has grown seriously as a result
                                of the engaging curriculum and supportive community. I strongly recommend this Program to
                                teenagers out there who wish to have an exceptional learning experience.”
                            </p>
                            <div class="rating text-center pt-3">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <h5 class="title">David Adeshola</h5>
                                <p>Cohorts 5</p>
                            </div>
                        </div>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </section>
    </main>










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
