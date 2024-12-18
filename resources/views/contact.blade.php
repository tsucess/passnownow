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
                    <img src="{{ asset('images/map-2.png') }}" alt=""/>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-3 address">
                <h6>Location</h6>
                <p class="text-dark mb-1 mb-lg-2">
                    Our friendly team is here to help.
                </p>
                <p class="text-dark mb-3 mb-lg-5">
                   <b><a href="https://www.google.com/maps/search/8+Adebayo+Muokolu+Street,+Anthony+Village,+Lagos,+Nigeria./@6.558127,3.3687749,17z/data=!3m1!4b1?entry=ttu&g_ep=EgoyMDI0MTIxMC4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="text-decoration-none">8 Adebayo Muokolu Street, Anthony Village, Lagos, Nigeria.</a></b>
                </p>
                <h6>Email</h6>
                <p class="text-dark mb-lg-1">
                    Questions or queries? Get in touch!
                </p>
                <p class="text-dark mb-2 mb-lg-5">
                  <b><a href="mailto:info@passnownow.com" target="_blank" class="text-decoration-none">info@passnownow.com</a></b>
                </p>
                <h6>Phone</h6>
                <p class="text-dark mb-2 mb-lg-2">
                    Mon-Fri from 8am to 5pm.
                </p>
                <p class="text-dark mb-3 mb-lg-5">
                   <b><a href="tel:07060545017" target="_blank" class="text-decoration-none">0706.054.5017</a>, <br /> <a href="tel:07060545027" target="_blank" class="text-decoration-none">0706.054.5027</a></b>
                </p>
            </div>
        </div>

    </section>

@endsection
