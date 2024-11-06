@extends('layouts.index')

@section('content')
    <main class="container-fluid container__parentresources">

        <Section class="container-fluid container__banner teacher__banner mb-5">
            <div class="row">
                <div class="col-12 banner">
                    <h1>A Guide For <span class="red_header">Parents</span></h1>
                    <p class="text-center header_content">
                        Passnownow Offers Career Counseling for your Teenage/Secondary School Child or Ward.
                    </p>
                </div>
            </div>
        </Section>
        <section class="container-fluid container__subjects motivate">
            <div class="row">
                <div class="col-12 col-md-6 header">
                    <h6 class="text-start"> Parent Resources </h6>
                    <p class="text-dark">
                        Passnownow wants parents to be as much a part of the learning experience of their wards just like
                        their teachers. Your influence and inputs are valuable and we want to be able to give you as much
                        information as possible to help you understand the goals of PNN.
                        <br><br>
                        PNN is a wholesome support platform for young people moving from teenage
                        to early adulthood, predominantly in secondary schools or preparing
                        for O-level final examinations. The academic materials on the site
                        are designed based on the approved Nigerian Secondary School Education curriculum.
                        <br><br>
                        Passnownow.com offers a range of benefits to parents, considering the
                        fact that it is a cost-effective medium to improve your child’s performance
                        without the extra cost of hiring a lesson teacher.
                        <br><br>
                        Parents can use the site’s resources to monitor their children’s academic
                        progress as it has the same content as the curriculum used in secondary schools.
                        <br><br>
                        It is also a safer medium as there are no risks of leaving your children and wards with strangers in
                        the guise of extra mural classes.
                    </p>
                </div>
                <div class="col-12 col-md-6 text-start">
                    <div class=" peoplelaugh_img mt-5">
                        <img src="{{ asset('images/peoplelaugh.png') }}" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <Section class="container-fluid container__performance">
            <div class="bg-image">
                <div class="row p-3">
                    <div class="col-12 col-md-6 notepink mt-4 mb-3">
                        <img src="{{ asset('images/notepink.png') }}" alt="">
                    </div>
                    <div class="col-12 col-md-6 performance__info">
                        <div class="lists">
                            <p class="list_sn">1</p>
                            <p class="list">We work with you to ensure your kids excel at every stage of their learning
                                journey</p>
                        </div>
                        <div class="lists">
                            <p class="list_sn">2</p>
                            <p class="list">Whether it's building early foundations, helping with homework, getting better
                                grades, mastering their subjects or passing pivotal exams.</p>
                        </div>
                        <div class="lists">
                            <p class="list_sn">3</p>
                            <p class="list">Whether it's building early foundations, helping with homework, getting better
                                grades, mastering their subjects or passing pivotal exams.</p>
                        </div>
                        <div class="lists">
                            <p class="list_sn">4</p>
                            <p class="list">Whether it's building early foundations, helping with homework, getting better
                                grades, mastering their subjects or passing pivotal exams.</p>
                        </div>
                    </div>
                </div>
            </div>
        </Section>
        <section class="container-fluid container__subjects motivate">
            <div class="row">
                <div class="col-12 header">
                    <h6 class="text-danger">
                        Why Have Assessments And Tests?
                    </h6>
                    <ol class="text-dark text-center ">
                        <li>Schools use them to identify specific areas children need to improve, so that they can tailor
                            their teaching along those lines.</li>
                        <li>Children get a sense of achievement from a milestone and going beyond it.</li>
                        <li>The Government uses them to see how many children are making the right kind of progress based on
                            set goals.</li>
                        <li>The ‘targets for every child’ in each subject describe what children should be able to do and
                            what they should know.</li>
                    </ol>
                </div>
            </div>
        </section>
    </main>
@endsection
