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
        <div class="row">
            <div class="col-12 col-md-6 header">
                <h6 class="text-start">Qualities of A Good Teacher</h6>
                <div class="image-wrapped linechart">
                    <img src="{{ asset('images/linechart.png') }}" alt="" />
                </div>
            </div>
            <div class="col-12 col-md-6 header mb-3">
                <p class="text-dark mb-3">
                    Good teachers are rare, and few people, including school administrators who hire teachers, know what it
                    takes to be one. Although some of the qualities of good teachers are subtle, many of them are
                    identifiable. Here is a list of sixteen traits that excellent teachers have in common:
                </p>
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
    <section class="container-fluid container__subjects mt-5 teacher__subjects explicit skills list_top py-2">
        <div class="row skill_list ">
            <div class="col-12 col-md-6">
                <h5 class="">Community Involvement</h5>
                <p class=" mb-3">
                    Maintaining good community relations is part of being a teacher, and teachers’ contact with parents,
                    administrators, and community leaders enhances their effectiveness in the classroom.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <h5 class="">Context</h5>
                <p class=" mb-3">
                    Every subject has a context, and teachers are responsible for providing it to their students. Since no
                    one learns in a vacuum, teachers must show their students how the information they are learning might be
                    used or might lead to the development of some other useful skill.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <h5 class="">Organization</h5>
                <p class=" mb-3">
                    One-on-one tutoring is easy compared to leading a classroom of students in a single direction. Teachers
                    must be able to manage students’ multiple personalities and organize their subject matters so that a
                    maximum number of students benefits from their presentations.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <h5 class="">Mission</h5>
                <p class=" mb-3">
                    Perhaps the most important thing teachers communicate to students and to the community is a sense of
                    satisfaction with their choice of teaching as their life mission. Teaching at its highest level is a
                    calling, and good teachers feel it to there cores.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <h5 class="">Vision</h5>
                <p class=" mb-3">
                    Teaching encompasses far more than passing information from teachers to students. Teachers should be
                    illuminators who provide their students not only with interesting and useful material, but also with
                    visions of where they might end up if they learn well.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <h5 class="">Enthusiasm</h5>
                <p class=" mb-3">
                    Excellent teachers never lose enthusiasm for their profession. They might become temporarily burdened by
                    administrative hassles or isolated problems but their underlying engagement with their work is
                    unwavering. Students feel this energy, and teachers who project it are much more successful than those
                    who do not.
                </p>
            </div>
        </div>
    </section>
    <section class="container-fluid container__subjects teacher__subjects explicit skills">
        <div class="row skill_list">
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Knowledge Of The Subject Matter</h5>
                <p class="text-dark mb-3">
                    You can’t teach what you don’t know. All teachers need not be experts in their fields, but possessing
                    knowledge is important. Teachers must continue building their understandings of their subjects
                    throughout their careers
                </p>
            </div>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Achievement</h5>
                <p class="text-dark mb-3">
                    Experienced teachers have clear thoughts on what their students should know at the end of the term, and
                    they understand what they must do along the way in order to reach those goals.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Patience</h5>
                <p class="text-dark mb-3">
                    No teacher should be expected to have much patience with individuals whose lack of discipline,
                    immaturity, or indolence interrupts the work of other students. Patience with students who are trying to
                    learn, however, is part and parcel of the teaching profession. Impatience with sincere students is an
                    indication of the teacher’s own shortcomings.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Planning</h5>
                <p class="text-dark mb-3">
                    Teachers must have plans and stick to them. This goes deeper than rigidly following a course syllabus.
                    Effective teachers sense when students need more time to absorb the material and, within limitations,
                    are willing to give it to them.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Intellectual Curiosity</h5>
                <p class="text-dark mb-3">
                    All good teachers are intellectually curious and naturally driven by their interests in keeping abreast
                    of changes in their fields.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Awareness</h5>
                <p class="text-dark mb-3">
                    Teachers in primary and secondary schools must have eyes on the backs of their heads. They need to be
                    aware of everything that happens in their classrooms and in adjacent hallways. Teachers who are awake
                    are able to stop nonsense before it starts and keep students on track.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Confidence</h5>
                <p class="text-dark mb-3">
                    Good teachers are confident in their abilities to sense where students are in the learning process and
                    in their students’ abilities to learn material that is presented in a logical and graduated fashion.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Mentoring</h5>
                <p class="text-dark mb-3">
                    Teachers often serve as mentors to their students. The desire to influence students positively is a core
                    motivation of many teachers when they enter the teaching profession.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Compassion</h5>
                <p class="text-dark mb-3">
                    Talented teachers are able to work with students with varying levels of maturity and knowledge. A
                    university professor once made the following statement about his experience as a teacher: “Each year
                    teaching is more challenging for me, because I grow a year older and the students stay the same age. The
                    widening age gap forces me to stretch in order to reach them.”
                </p>
            </div>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Maturity</h5>
                <p class="text-dark mb-3">
                    In no profession is maturity more important than in teaching. Students experience emotional ups and
                    downs, and insightful teachers are able to sense the changes and respond to them appropriately. Teachers
                    must be pillars, consistently encouraging students to grow as human beings and to develop academically.
                </p>
            </div>
        </div>
    </section>
@endsection
