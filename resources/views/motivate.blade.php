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

<section class="container-fluid container__subjects mt-5 teacher__subjects explicit motivate">
    <div class="row">
        <div class="col-12 col-md-6 text-start header">
            <h6 class="text-start text-dark">
                How To Keep Good Teachers Motivated Recognizing Those Who Go Above And Beyond
            </h6>
            <p class="text-start text-dark">All teachers yearn for reassurance that they are doing a good job.</p>
            <div class="image-wrapped linechart mt-5">
                <img src="{{ asset('assets/images/linechart.png') }}" alt="" />
            </div>
        </div>
        <div class="col-12 col-md-6 text-center header">
            <p class="text-dark">
                Most principals recognize teachers’ efforts by offering positive
                feedback — both publicly and privately. Weekly memos and regular
                staff meetings, are the perfect forums for recognizing special
                contributions that teachers or other staff members makeEncourage
                teachers to seek out professional development courses or workshops.
                <br><br>
                Approve all reasonable requests. Then get extra mileage out of those
                sessions: Set aside time during each staff meeting, or arrange a special
                professional development day, so teachers can share with their peers the
                main ideas they learned from each session they attended.
                <br><br>
                Encourage teachers to ask for the instructional supplies they require to facilitate
                teaching and learning. Provide reasonable requests from the budget.
                <br><br>
                Be sure to publicly commend staff members who go above and beyond outside
                of the school day.
                <br><br>
                Select a “Teacher of the Month.” “Teacher of the Term” Teacher of the Session” With a reward attached.
                <br><br>
                To motivate professional development, arrange study groups (perhaps organized by grade level) to
                read a book or discuss and research a current hot topic.
                <br><br>
                Set up a schedule
                to ensure that every teacher makes at least two visits to other teachers’
                classrooms or other schools during the year.
            </p>
        </div>
    </div>
    <div class="row m-0 p-0 mb-3">
        <div class="col-12 col-md-7 mb-3 p-0">
            <div class="image-wrapped">
                <img src="{{ asset('assets/images/smiling.png') }}" alt="" />
            </div>
        </div>
        <div class="col-12 col-md-5 mb-3 p-0">
            <div class="image-wrapped">
                <img src="{{ asset('assets/images/tutor.png') }}" alt="" />
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