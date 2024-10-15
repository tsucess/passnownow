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
                <h6 class="text-start">7 Important Lesson Note Tips For Teachers</h6>
            </div>
            <div class="col-12 col-md-6 header mb-3">
                <p class="text-dark mb-3">
                    It is much easier to accomplish your teaching objectives when you are teaching a class if you have planned out how you will achieve those objectives. And that’s why a good lesson plan is very important even more than the actual teaching itself.
                    <br><br>
                    Here are step-by-step instructions to guide you through the process, with a lesson plan template you can use so all you need to do is fill in the blanks.
                </p>
            </div>
        </div>
        <div class="row m-0 p-0 mb-3">
            <div class="col-12 col-md-5 mb-3 bg-time">
                <div class="row m-0">
                    <div class="col-6 mb-3">Time Required</div>
                    <div class="col-6 mb-3"><b>30 - 60 Minutes</b></div>
                    <div class="col-6 mb-3">Lesson Planner or Paper:</div>
                    <div class="col-6 mb-3"><b>30 - 60 Minutes</b></div>
                    <div class="col-6 mb-3">List of Available Lab Materials:</div>
                    <div class="col-6 mb-3"><b>If Necessary</b></div>
                    <div class="col-6">Materials:</div>
                    <div class="col-6"><b>If Necessary</b></div>
                </div>
            </div>
            <div class="col-12  col-md-7 mb-3 p-0">
                <div class="image-wrapped skills_hero">
                    <img src="{{ asset('assets/images/childreading.png') }}" alt="" />
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid container__subjects teacher__subjects explicit skills">
        <div class="row skill_list">
            <div class="col-12 col-md-6">
                <h5 class="primary_header">List your goals</h5>
            </div>
            <div class="col-12 col-md-6">
                <p class="text-dark">
                    Ask yourself what you are hoping to achieve with this lesson. Are there particular standards you are meeting? Are there certain concepts you are teaching? What do you want the students to get out of the lesson?
                </p>
            </div>
            <hr>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Write down key vocabulary terms</h5>
            </div>
            <div class="col-12 col-md-6">
                <p class="text-dark">
                    If the lesson includes vocabulary words, be sure to write them down so that you can incorporate them into the lesson as you are developing it.
                </p>
            </div>
            <hr>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Decide how you are going to teach the lesson</h5>
            </div>
            <div class="col-12 col-md-6">
                <p class="text-dark">
                    Is this going to be a lecture or a laboratory exercise? What will the students be doing? Will each student be working alone or will they be in groups? Once you have an idea of how you want to reach your objective, then you will be in a position to write out notes for an introduction and a step-by-step procedure for what will happen.
                </p>
            </div>
            <hr>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Write out your procedure and materials list</h5>
            </div>
            <div class="col-12 col-md-6">
                <p class="text-dark">
                    This is simplified if you have a list of materials that are available to you, especially if you are teaching a laboratory-related lesson such as a chemistry lab exercise. Make a list of the materials you will need. It is a good idea to make a note about any preparation that may be needed prior to the lesson. Once you have a materials list, describe each step of the lesson.
                </p>
            </div>
            <hr>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Write out how you plan to introduce the lesson</h5>
            </div>
            <div class="col-12 col-md-6">
                <p class="text-dark">
                    The introduction will likely include a statement of the objectives of the lesson, some background information, and details about the procedure to be followed and the type of assessment that will be associated with the lesson.
                </p>
            </div>
            <hr>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Decide how you will assess the lesson</h5>
            </div>
            <div class="col-12 col-md-6">
                <p class="text-dark">
                    Will there be any in-class assignments or homework? How will students be expected to practice their skills? Will the lesson be graded?
                </p>
            </div>
            <hr>
            <div class="col-12 col-md-6">
                <h5 class="primary_header">Decide how you will assess the lesson</h5>
            </div>
            <div class="col-12 col-md-6">
                <p class="text-dark">
                    If you are teaching a lab, you may have some clean-up to do after the lesson or there may be procedures students will need to complete before they can leave. If the lesson included an assignment, will it be handed in at the end of the lesson? If not, when will it be due? Think about how you might build upon this lesson in future lessons.
                </p>
            </div>
        </div>
    </section>
@endsection
