@extends('layouts.index')

<style>
.zoom-on-hover {
  transition: transform 0.3s ease-in-out;
}

.zoom-on-hover:hover {
  transform: scale(1.1);
}


.image-wrapper {
  transition: transform 0.3s ease-in-out;
}

.image-wrapper:hover {
  transform: translateY(-10px);
}

@media screen  and (max-width: 320px)
{
    .funFilled
    {
        height: 300px;
        background: blue;
    }
}

</style>

@section('content')
    <Section class="container-fluid container__banner teacher__banner">
        <div class="row">
            <div class="col-12 banner">
                <h1>About <span class="red_header">Passnownow</span></h1>
                <p class="text-center header_content">
                    What Passnownow Users are saying
                </p>
            </div>
        </div>
    </Section>

    <section class="container-fluid container__subjects mt-md-5 teacher__subjects command">
        <div class="row mb-5">
            <div class="col-12 col-md-6 header">
                <h6 class="text-start">Our Story</h6>
                <p class="text-dark">
                    Passnownow.com is a mobile learning platform that has digitized Nigeria's school curriculum content from
                    JSS1 to SS3. It allows students to read ahead of classes and provides past questions and answers for
                    university entrance exams. The platform also shares grammar tips and includes a leaderboard that
                    measures users' studying efforts. Passnownow.com's disruptive innovation strategy has been analyzed by
                    Harvard Business School researchers for a book on innovation, prosperity, and poverty. The platform aims
                    to democratize access to quality curriculum-based education content for underserved students, teachers,
                    and communities across Nigeria.The aim of the online education platform swagric.com is to increase
                    enrollment and improve academic performance of students while empowering teachers through online class
                    notes, practice questions, and past exams. The platform also provides a chat room for users to share
                    knowledge and solve common problems. The platform is accessible for a low fee of N300 and has been well
                    received by both teachers and parents, who are using it to supplement classroom learning due to a
                    shortage of quality textbooks and a lack of financial resources.
                </p>
            </div>
            <div class="col-12 col-md-6 text-center header">
                <div class="image-wrapped">
                    <img src="{{ asset('images/peopleslant.png') }}" alt="" />
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid container__subjects bg-tertiary-accent about">
        <div class="row skill_list p-md-2 p-lg-3">
            <div class="col-12 col-md-6 p-4">
                <div class="image-wrapper  mt-md-5">
                    <img src="{{ asset('images/bgpinkart.png') }}" alt="">
                </div>
            </div>
            <div class="col-12 col-md-6 p-4">
                <img src="{{ asset('images/icons-barchart-white.png') }}" alt="">
                <h5 class="my-2">Our Core Objectives</h5>
                <ul class="">
                    <li>To foster and engender the pursuit of academic excellence amongst young Nigerians</li>
                    <li>To improve the success rate of students in university entrance examinations in Nigeria</li>
                    <li>To provide an online knowledge resource destination for young Nigerians to interact and cross
                        fertilise ideas</li>
                    <li>To create a platform for young people between 10 and 20 to express their creativity and ingenuity
                    </li>
                    <li>To help users become astute citizens of the world; aware of its history, beauty and challenges and
                        their role in shaping it for the best</li>
                </ul>
            </div>
            <hr class="text-white">
            <div class="col-12 col-md-6 p-4">
                <img src="{{ asset('images/icons-barchart-white.png') }}" alt="">
                <h5 class="my-2">Expected Outcomes</h5>
                <ul class="">
                    <li>An increase in the success rate of students at university entrance examinations in Nigeria</li>
                    <li>A more responsible, employable, innovative, creatively inclined, and empathetic youth population
                    </li>
                    <li>Focused, progressive and knowledge based interaction among young people</li>
                    <li>Compliance with international standards and style of learning for young people who are in need of
                        assistance with their studies</li>
                </ul>
            </div>
            <div class="col-12 col-md-6 p-4">
                <div class="image-wrapper  mt-md-5">
                    <img src="{{ asset('images/bgpinkart.png') }}" alt="">
                </div>
            </div>

            <hr class="text-white">
            <div class="col-12 col-md-6 p-4">
                <div class="image-wrapper  mt-md-5 ">
                    <img src="{{ asset('images/bgpinkart.png') }}" alt="">
                </div>
            </div>
            <div class="col-12 col-md-6 p-4">
                <img src="{{ asset('images/icons-barchart-white.png') }}" alt="">
                <h5 class="my-2">Our Core Objectives</h5>
                <ul class="">
                    <li> Passnownow.com is easy to use. </li>
                    <li> It is a fun and trendy integrated learning platform. </li>
                    <li>It provides flexible learning experience for users.</li>
                    <li>We have tailor-made interactive content to meet the social and educational development needs of
                        young people. </li>
                    <li>It is user-friendly, encourages critical thinking and is timely, given the current trend of
                        regression in Nigeria's education system.</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="container-fluid container__subjects mt-lg-5 about_bottom">
        <div class="row mt-5">
            <div class="col-12 text-center">
                <h6 style = "line-height: 25px;">Passnownow gives you access to:</h6>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 subscription_profiles">
                <div class="col">
                    <div class="card zoom-on-hover">
                        <div class="card-body p-md-5 text-center shadow">
                            <img src="{{ url('images/iconc-phone.png') }}" alt="" class="mb-3">
                            <h5 class="card-title text-dark">Mobile Learning</h5>
                            <p class="card-text text-dark">Get access to Class Notes and exam Questions on your mobile devices</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card zoom-on-hover funFilled" style = "height: 290px;" >
                        <div class="card-body p-md-5 text-center shadow">
                            <img src="{{ url('images/iconc-smiley.png') }}" alt="" class="mb-3">
                            <h5 class="card-title text-dark">Fun-Filled Community</h5>
                            <p class="card-text text-dark">Find People of like minds
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
