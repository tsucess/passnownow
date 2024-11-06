@extends('layouts.index')

@section('content')
    <Section class="container-fluid container__banner teacher__banner">
        <div class="row">
            <div class="col-12 banner">
                <h1>Our <span class="red_header">Team</span></h1>
                <p class="text-center header_content">
                    Passnownow is Nigeria’s foremost online learning platform
                    that provides students with access to high-quality educational
                    materials tailored to their specific needs
                </p>
            </div>
        </div>
    </Section>

    <section class="container-fluid container__subjects mt-lg-5 teacher__subjects container__programs">
        <div class="row">
            <div class="col-12 text-center mb-5 header">
                <h6 class="red_header">Our Team</h6>
                <h5 class="primary_header">Meet Our Professional Team</h5>

            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4 team_profiles">
            <div class="col">
                <div class="card">
                    <img src="{{ asset('images/team.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Winner Effiong</h5>
                        <p class="card-text">UI/UX</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{ asset('images/team.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Taofeeq Ogunsanya</h5>
                        <p class="card-text">Software Developer</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{ asset('images/team.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Joy Ijeoma</h5>
                        <p class="card-text">Receptionist</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{ asset('images/team.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Joy Ijeoma</h5>
                        <p class="card-text">Receptionist</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{ asset('images/team.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Joy Ijeoma</h5>
                        <p class="card-text">Receptionist</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{ asset('images/team.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Joy Ijeoma</h5>
                        <p class="card-text">Receptionist</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row program my-5 team shadow">
            <div class="col-12 col-md-6 mb-5 mb-md-3 address_info">
                <h6 class="red_header text-start">Join us!</h6>
                <h5 class="primary_header">Join our team!</h5>
                <p class="text-dark">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua Utenimad minim veniam, quis nostrud exercitation dolore magna
                </p>
                <div class="lists">
                    <p class="list_sn"><i
                        class="fa-solid fa-location-dot"></i></p>
                    <p class="list">8 Adebayo Muokolu Street, Antony Village, Lagos, Nigeria.</p>
                </div>
                <div class="lists">
                    <p class="list_sn"><i class="fa-solid fa-phone"></i></p>
                    <p class="list">07060545017, 07060545027</p>
                </div>
                <div class="lists">
                    <p class="list_sn"><i class="fa-solid fa-envelope"></i></p>
                    <p class="list">info@passnownow.com</p>
                </div>

            </div>
            <div class="col-12 col-md-6 mb-3">
                <form class="row g-3 text-dark">
                    <div class="col-md-12">
                        <label for="inputText4" class="form-label">Enter Full Name</label>
                        <input type="email" class="form-control" id="inputText4">
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-md-6">
                        <label for="inputText5" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="inputText5">
                    </div>
                    <div class="col-md-12">
                        <label for="inputState" class="form-label">Role</label>
                        <select id="inputState" class="form-select">
                            <option selected>Choose...</option>
                            <option>UI/UX Designer</option>
                            <option>Project Manager</option>
                            <option>Graphic Designer</option>
                            <option>Web Developer</option>
                            <option>Researcher</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Portfolio link</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="https://">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Upload your CV</label>
                        <input type="file" class="form-control" id="inputAddress2" placeholder="Upload your cv">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn submit-btn w-50">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection
