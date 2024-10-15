@extends('layouts.index')

@section('content')
    <Section class="container-fluid container__banner teacher__banner">
        <div class="row">
            <div class="col-12 banner">
                <h1>Our <span class="red_header">Leadership</span></h1>
                {{-- <p class="text-center header_content">
                Passnownow is Nigeria’s foremost online learning platform
                that provides students with access to high-quality educational
                materials tailored to their specific needs
            </p> --}}
            </div>
        </div>
    </Section>

    <section class="container-fluid container__subjects mt-5 teacher__subjects explicit leadership">
        <div class="row mb-5">
            <div class="col-12 col-md-6 text-start header">
                <h6 class="text-start">Qualities Of A Good Teacher</h6>
            </div>
            <div class="col-12 col-md-6 text-center header">
                <p class="text-dark">
                    Good teachers are rare, and few people, including school administrators
                    who hire teachers, know what it takes to be one. Although some of the
                    qualities of good teachers are subtle, many of them are identifiable.
                    Here is a list of sixteen traits that excellent teachers have in common:
                </p>
            </div>
        </div>
        <div class="row m-0 p-0 mb-3">
            <div class="col-12 col-md-5 mb-3 p-0 bg-tertiary-accent">
                <div class="image-wrapped">
                    <img src="{{ asset('assets/images/tutor_second.png') }}" alt="" />
                </div>
            </div>
            <div class="col-12 col-md-7 mb-3 bg-tertiary-accent">
                <p>
                    Passnownow wants parents to be as much a part of the learning experience of their wards just like their
                    teachers. Your influence and inputs are valuable and we want to be able to give you as much information
                    as possible to help you understand the goals of PNN.
                    <br><br>
                    PNN is a wholesome support platform for young people moving from teenage to early adulthood,
                    predominantly in secondary schools or preparing for O-level final examinations. The academic materials
                    on the site are designed based on the approved Nigerian Secondary School Education curriculum.
                    <br><br>
                    Passnownow.com offers a range of benefits to parents, considering the fact that it is a cost effective
                    medium to improve your child’s performance without the extra cost of hiring a lesson teacher.
                </p>
                <p><b>Mr Ademola Mike</b></p>
                <p>MD Shipporr limited</p>
            </div>
           
            <div class="col-12 col-md-7 mb-3 bg-tertiary-accent bg-white text-dark">
                <p>
                    Passnownow wants parents to be as much a part of the learning experience of their wards just like their
                    teachers. Your influence and inputs are valuable and we want to be able to give you as much information
                    as possible to help you understand the goals of PNN.
                    <br><br>
                    PNN is a wholesome support platform for young people moving from teenage to early adulthood,
                    predominantly in secondary schools or preparing for O-level final examinations. The academic materials
                    on the site are designed based on the approved Nigerian Secondary School Education curriculum.
                    <br><br>
                    Passnownow.com offers a range of benefits to parents, considering the fact that it is a cost effective
                    medium to improve your child’s performance without the extra cost of hiring a lesson teacher.
                </p>
                <p><b>Mr Ademola Mike</b></p>
                <p>MD Shipporr limited</p>
            </div>
            <div class="col-12 col-md-5 mb-3 p-0 bg-tertiary-accent bg-white">
                <div class="image-wrapped bg-white text-end">
                    <img src="{{ asset('assets/images/tutor_second.png') }}" alt="" />
                </div>
            </div>
        </div>
    </section>
@endsection
