@extends('layouts.index')

@section('content')
    <Section class="container-fluid container__banner class__banner">
        <div class="row">
            <div class="col-12 banner">
                <h1>CLASSES</h1>
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

    <section class="container-fluid container__subjects mt-5">
        <div class="row only_subjects">
            <div class="col-12 col-md-4 mb-3">
                <div class="image-wrapper">
                    <img src="{{ asset('assets/images/student-writing.png') }}" alt="">
                </div>
                <div class="note_info p-2">
                    <h5>JSS 1 Class Notes</h5>
                    <p>Start studying with our wide collection of all SSS 1 Class Notes all Terms on all Secondary
                        School Subjects</p>
                    <a href="{{ url('subject') }}" class="note_btn">VIEW ALL SUBJECTS</a>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="image-wrapper">
                    <img src="{{ asset('assets/images/student-writing.png') }}" alt="">
                </div>
                <div class="note_info p-2">
                    <h5>JSS 2 Class Notes</h5>
                    <p>Start studying with our wide collection of all SSS 1 Class Notes all Terms on all Secondary
                        School Subjects</p>
                    <a href="#" class="note_btn">VIEW ALL SUBJECTS</a>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="image-wrapper">
                    <img src="{{ asset('assets/images/student-writing.png') }}" alt="">
                </div>
                <div class="note_info p-2">
                    <h5>JSS 3 Class Notes</h5>
                    <p>Start studying with our wide collection of all SSS 1 Class Notes all Terms on all Secondary
                        School Subjects</p>
                    <a href="#" class="note_btn">VIEW ALL SUBJECTS</a>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="image-wrapper">
                    <img src="{{ asset('assets/images/student-writing.png') }}" alt="">
                </div>
                <div class="note_info p-2">
                    <h5>SSS 1 Class Notes</h5>
                    <p>Start studying with our wide collection of all SSS 1 Class Notes all Terms on all Secondary
                        School Subjects</p>
                    <a href="#" class="note_btn">VIEW ALL SUBJECTS</a>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="image-wrapper">
                    <img src="{{ asset('assets/images/student-writing.png') }}" alt="">
                </div>
                <div class="note_info p-2">
                    <h5>SSS 2 Class Notes</h5>
                    <p>Start studying with our wide collection of all SSS 1 Class Notes all Terms on all Secondary
                        School Subjects</p>
                    <a href="#" class="note_btn">VIEW ALL SUBJECTS</a>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="image-wrapper">
                    <img src="{{ asset('assets/images/student-writing.png') }}" alt="">
                </div>
                <div class="note_info p-2">
                    <h5>SSS 3 Class Notes</h5>
                    <p>Start studying with our wide collection of all SSS 1 Class Notes all Terms on all Secondary
                        School Subjects</p>
                    <a href="#" class="note_btn">VIEW ALL SUBJECTS</a>
                </div>
            </div>
        </div>
    </section>

@endsection
