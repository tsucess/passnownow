@extends('layouts.index')

<style>
.image-wrapper {
  animation-duration: 1s;
  animation-fill-mode: both;
  animation-iteration-count: infinite;
  animation-play-state: paused;
}

.image-wrapper:hover {
  animation-play-state: running;
}

.card-link:hover
{
    border: 1px solid #1A69AF;
    background: #1A69AF;
    color:white;
    padding: 8px;
    border-radius:5px;
}

    </style>
@section('content')
    <Section class="container-fluid container__banner">
        <div class="row">
            <div class="col-12 banner">
                <h1>Subscription Page</h1>
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


    <section class="container-fluid container__subjects mt-lg-5 subscription">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 subscription_profiles">
            <div class="col">
                <div class="card plan sty">
                    <div class="card-body top">
                        <h5 class="card-title">Daily Plan</h5>
                        <p class="card-text">Access to all class notes and past questions</p>
                        <h2 class="primary_header">N300</h2>
                        <p class="card-text">per day</p>
                        <hr>
                    </div>
                    <div class="card-body">
                        <h5>What’s Include?</h4>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Valid for 24hrs</p>
                        </div>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Access to all Class Notes</p>
                        </div>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Access to all JSSCE Past Questions</p>
                        </div>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Access to all SSCE Past Questions</p>
                        </div>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Access to all UMTE / JAMB Past Questions</p>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <a href="#" class="card-link">Learn more</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card plan special sty">
                    <div class="card-body top">
                        <h5 class="card-title">Monthly Plan</h5>
                        <p class="card-text">Access to all class notes and past questions</p>
                        <h2 class="primary_header">N1,100</h2>
                        <p class="card-text">per month</p>
                        <hr>
                    </div>
                    <div class="card-body">
                        <h5>What’s Include?</h4>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Valid for 24hrs</p>
                        </div>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Access to all Class Notes</p>
                        </div>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Access to all JSSCE Past Questions</p>
                        </div>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Access to all SSCE Past Questions</p>
                        </div>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Access to all UMTE / JAMB Past Questions</p>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <a href="#" class="card-link">Learn more</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card plan sty">
                    <div class="card-body top">
                        <h5 class="card-title">Weekly Plan</h5>
                        <p class="card-text">Access to all class notes and past questions</p>
                        <h2 class="primary_header">N500</h2>
                        <p class="card-text">per week</p>
                        <hr>
                    </div>
                    <div class="card-body">
                        <h5>What’s Include?</h4>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Valid for 24hrs</p>
                        </div>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Access to all Class Notes</p>
                        </div>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Access to all JSSCE Past Questions</p>
                        </div>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Access to all SSCE Past Questions</p>
                        </div>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Access to all UMTE / JAMB Past Questions</p>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <a href="#" class="card-link">Learn more</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card plan sty">
                    <div class="card-body top">
                        <h5 class="card-title">Quaterly Plan</h5>
                        <p class="card-text">Access to all class notes and past questions</p>
                        <h2 class="primary_header">N2,600</h2>
                        <p class="card-text">For 4 Months</p>
                        <hr>
                    </div>
                    <div class="card-body">
                        <h5>What’s Include?</h4>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Valid for 24hrs</p>
                        </div>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Access to all Class Notes</p>
                        </div>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Access to all JSSCE Past Questions</p>
                        </div>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Access to all SSCE Past Questions</p>
                        </div>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Access to all UMTE / JAMB Past Questions</p>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <a href="#" class="card-link">Learn more</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card plan special sty">
                    <div class="card-body top">
                        <h5 class="card-title">Half Year Plan</h5>
                        <p class="card-text">Access to all class notes and past questions</p>
                        <h2 class="primary_header">N5,100</h2>
                        <p class="card-text">For 6 Months</p>
                        <hr>
                    </div>
                    <div class="card-body">
                        <h5>What’s Include?</h4>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Valid for 24hrs</p>
                        </div>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Access to all Class Notes</p>
                        </div>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Access to all JSSCE Past Questions</p>
                        </div>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Access to all SSCE Past Questions</p>
                        </div>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Access to all UMTE / JAMB Past Questions</p>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <a href="#" class="card-link">Learn more</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card plan sty">
                    <div class="card-body top">
                        <h5 class="card-title">Year Plan</h5>
                        <p class="card-text">Access to all class notes and past questions</p>
                        <h2 class="primary_header">N10,100</h2>
                        <p class="card-text">per year</p>
                        <hr>
                    </div>
                    <div class="card-body">
                        <h5>What’s Include?</h4>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Valid for 24hrs</p>
                        </div>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Access to all Class Notes</p>
                        </div>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Access to all JSSCE Past Questions</p>
                        </div>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Access to all SSCE Past Questions</p>
                        </div>
                        <div class="lists">
                            <i class="fa-solid fa-circle-check"></i>
                            <p class="list">Access to all UMTE / JAMB Past Questions</p>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <a href="#" class="card-link">Learn more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 bg-plan">
            <div class="col-12 text-center mb-5 header">
                <h6>Buy a plan</h6>
                <p class="text-dark">
                    Subscribe to a plan today!  Embrace the benefits and start your journey towards success now
                </p>
            </div>
            <div class="col-12 col-md-6">
                <div class="image-wrapper animate__animated animate__headShake">
                    <img src="{{ asset('images/imagewallet.png') }}" alt="" />
                </div>
                <h5 class="primary_header mt-5 mb-3">Payment Using ATM Card</h5>
                <ul>
                    <li>Click on “Pay Using ATM Card”</li>
                    <li>Fill in the required fields to place order</li>
                    <li>Click on “Place Order” at the button right of the page</li>
                    <li>You will get an automatic confirmation</li>
                    <li>This will take effect and your account would be activated</li>
                    <li>You can now gain access to a passnownow.com Class Notes and Past Questions</li>
                </ul>
            </div>
            <div class="col-12 col-md-6">
                <div class="image-wrapper animate__animated animate__headShake">
                    <img src="{{ asset('images/imagephone.png') }}" alt="" />
                </div>
                <h5 class="primary_header mt-5 mb-3">Payment Using Bank Transfer</h5>
                <ul>
                    <li>Click on “Pay Using Bank Tranfer”</li>
                    <li>Fill in the required fields to place order</li>
                    <li>Click on “Place Order” at the button right of the page</li>
                    <li>You will get an manual confirmation</li>
                    <li>This can take up to four hours before your account is activated</li>
                    <li>You can now gain access to a passnownow.com Class Notes and Past Questions</li>
                </ul>
            </div>
        </div>
    </section>



    <section class="container-fluid container__subjects mt-5">
        <div class="row">

        </div>
    </section>
@endsection
