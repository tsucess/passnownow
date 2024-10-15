@extends('layouts.index')

@section('content')
    <Section class="container-fluid container__banner teacher__banner">
        <div class="row">
            <div class="col-12 banner">
                <h1>Contact <span class="red_header">Us</span></h1>
                {{-- <p class="text-center header_content">
                    Passnownow is Nigeria’s foremost online learning platform
                    that provides students with access to high-quality educational
                    materials tailored to their specific needs
                </p> --}}
            </div>
        </div>
    </Section>

    <section class="container-fluid container__subjects mt-5 contact">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-9 text-center contact">
                <div class="image-wrapped">
                    <img src="{{ asset('assets/images/map-2.png') }}" alt=""/>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-3 address">
                <h6>Location</h6>
                <p class="">
                    Our friendly team is here to help.
                </p>
                <p class="text-dark mb-3 mb-lg-5">
                   <b>8 Adebayo Muokolu Street, Antony Village, Lagos, Nigeria.</b> 
                </p>
                <h6>Email</h6>
                <p class="">
                    Questions or queries? Get in touch!
                </p>
                <p class="text-dark mb-3 mb-lg-5">
                  <b>info@passnownow.com</b>  
                </p>
                <h6>Phone</h6>
                <p class="">
                    Mon-Fri from 8am to 5pm.
                </p>
                <p class="text-dark mb-3 mb-lg-5">
                   <b>07060545017, <br /> 07060545027</b> 
                </p>
            </div>
        </div>
      
    </section>

@endsection
