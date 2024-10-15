@extends('layouts.index')

@section('content')
    <Section class="container-fluid container__banner career_banner">
        <div class="row">
            <div class="col-12 banner">
                <h1 >Post Secondary Education & Career Counseling
                    {{-- <span class="red_header">Passnownow</span> --}}
                </h1>
                <p class="text-center header_content">
                    Passnownow offers Career Counseling for your Teenage/Secondary School Child or Ward. 
                </p>
            </div>
        </div>
    </Section>
    <Section class="container-fluid container__subjects career_gallery">
        <div class="row p-5">
            <div class="col-12 col-md-3">
                <div class="image-wrapped">
                    <img src="{{ asset('assets/images/cc1.png') }}" alt="">
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="image-wrapped">
                    <img src="{{ asset('assets/images/cc2.png') }}" alt="">
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="image-wrapped">
                    <img src="{{ asset('assets/images/cc3.png') }}" alt="">
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="image-wrapped">
                    <img src="{{ asset('assets/images/cc4.png') }}" alt="">
                </div>
            </div>
        </div>
        <hr>
    </Section>
    <section class="container-fluid container__subjects career_bottom">
        <div class="row mb-5 ">
            <div class="col-12 col-md-8">
                <div class="row mb-5">
                    <div class="col-12 col-md-6">
                        <h6 class="text-start">Career Counseling</h6>
                    </div>
                    <div class="col-12 col-md-6">
                        <p class="text-dark">
                            Do you need Career Counseling for your Teenage/Secondary School Child or Ward? Worried about your child/ward choosing the right course to study in the University or Polytechnic? Or even deciding what Career Path to choose for the future. Always wondered which university will be the best fit for him/her or what sort of work will make them globally aligned with the future of work in this 4th Industrial Revolution Era?
                        </p>
                    </div>
                    <div class="col-12 col-md-6">
                        <h6 class="text-start">Book a Phone Conversation</h6>  
                    </div>
                    <div class="col-12 col-md-6">
                        <p class="text-dark">
                            Book a phone conversation or physical appointment with our Career and Education Counsellors to help you through this difficult decision as you watch your child/children live their Dreams. We will provide your children/wards with vital information and guidance on all they need to know about the options available to them and help them make the best decisions based on their qualifications and career goals.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 text-center">
                <div class="image-wrapped">
                    <img src="{{ asset('assets/images/canflower.png') }}" alt="" />
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid container__subjects bg-secondary-accent about career_support">
        <div class="row skill_list p-md-2 p-lg-3">
            <div class="col-12 text-center">
                <h6 class="text-white">Educational and Career Support Services</h6>
            </div>
            <div class="col-12 col-md-6 p-4">
                <div class="image-wrapped  mt-md-5">
                    <img src="{{ asset('assets/images/peoplemeet2.png') }}" alt="">
                </div>
            </div>
            <div class="col-12 col-md-6 p-md-4 mb-3">
                <h5 class="my-2 text-white">Career Advisory</h5>
                <p class="text-dark text-white">
                    We’ll guide your child/ward on the best courses and career direction that is best suited for his/her personality trait by conducting detailed analysis of their grades and co-curricular interests, get to know what they enjoy doing, the kind of work they feel they’ll be most productive doing and more importantly, their plans and interests after secondary school. The information gathered will be used to help us make an informed decision on the Courses and Career Path that is best suited for the person in question.
                </p>
                <a href="{{ url('good-teacher') }}" class="">READ NOW &nbsp; <i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
            <hr class="text-white">
            <div class="col-12 col-md-6 p-md-4 mb-3">
                <h5 class="my-2 text-white">Tertiary Institution Advisory:</h5>
                <p class="text-dark text-white">
                    Book a phone conversation or physical appointment with our Career and Education Counsellors to help you through this difficult decision as you watch your child/children live their Dreams. We will provide your children/wards with vital information and guidance on all they need to know about the options available to them and help them make the best decisions based on their qualifications and career goals.
                </p>
                <a href="{{ url('good-teacher') }}" class="">READ NOW &nbsp; <i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
            <div class="col-12 col-md-6 p-md-4">
                <div class="image-wrapped  mt-md-5">
                    <img src="{{ asset('assets/images/peoplemeet2.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid container__subjects mt-lg-5 about_bottom">
        <div class="row mt-5 ">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 subscription_profiles">
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body p-md-5 text-center shadow">
                            <img src="{{ url('assets/images/iconc-phone.png') }}" alt="" class="mb-3">
                            <p class="card-text">60 minutes telephone interactive discussion with our Expert</p>
                            <h5 class="card-title">N5,000</h5>
                            <a href="{{ url('subject') }}" class="btn btn-style">REGISTER</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body p-md-5 text-center shadow">
                            <img src="{{ url('assets/images/iconc-whatsapp.png') }}" alt="" class="mb-3">
                            <p class="card-text">60 minutes Whatsapp conversation</p>
                            <h5 class="card-title">N5,000</h5>
                            <a href="{{ url('subject') }}" class="btn btn-style">REGISTER</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body p-md-5 text-center shadow">
                            <img src="{{ url('assets/images/iconc-smiley.png') }}" alt="" class="mb-3">
                            <p class="card-text">Face to Face counselling at The Rise Labs</p>
                            <h5 class="card-title">N5,000</h5>
                            <a href="{{ url('subject') }}" class="btn btn-style">REGISTER</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
