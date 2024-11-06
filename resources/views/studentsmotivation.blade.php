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
        <div class="row mb-5">
            <div class="col-12 col-md-6 header">
                <h6 class="text-start">How To Easily Increase Students Motivation</h6>
            </div>
            <div class="col-12 col-md-6 header mb-3">
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
    </section>
    <section class="container-fluid container__subjects teacher__subjects explicit skills">
        <div class="row skill_list">
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Children fulfill the expectations that the adults around them communicate</h5>
            </div>
            <div class="col-12 col-md-6">
                <p class="text-dark">
                    This is likely the single most important skill. Kids these days are stubborn, and many lack the inherent
                    respect for authority that we were taught at a young age. Spending a single day in a room full of
                    raucous teenagers is enough to send any human being to the looney bin, which is why every good teacher
                    needs patience in order to find a way to work with his students and earn their respect.
                </p>
            </div>
            <hr>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Sometimes motivating your students is as easy as changing the material you are
                    using</h5>
            </div>
            <div class="col-12 col-md-6">
                <p class="text-dark">
                    For most teachers, the school chooses a curriculum that they expect each teacher to follow in his or her
                    classes. Even when this is the case, it does not mean that you cannot bring additional resources to
                    class. Sometimes students are turned off by the style or approach of certain curriculum authors.
                    Bringing a different perspective into the class will reengage your students who are turned off by your
                    current materials. In addition, it will challenge those who are already seeing success from the assigned
                    curriculum.
                </p>
            </div>
            <hr>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Providing students with accountability is an important element of being a teacher
                </h5>
            </div>
            <div class="col-12 col-md-6">
                <p class="text-dark">
                    Without the idea of a deadline and a grade, many students would never have the self-motivation that is
                    required to successfully learn a subject. Be clear with your students when you tell them your
                    expectations. Make sure they know the deadline for a project’s completion and what standards you will
                    use to assess that project.
                </p>
            </div>
            <hr>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Competition is a great way to motivate students</h5>
            </div>
            <div class="col-12 col-md-6">
                <p class="text-dark">
                    There are many ways to foster a friendly spirit of competition in your class.
                </p>
            </div>
        </div>
    </section>
@endsection
