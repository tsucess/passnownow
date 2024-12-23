@extends('layouts.dasboardtemp')

@section('admincontent')
    <section class="container-fluid checkoutsummary__container">

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 subscription_profiles">
                <div class="col">
                    <div class="card plan">
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
                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Valid for 24hrs</p>
                            </div>
                            <div class="lists">

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Access to all Class Notes</p>
                            </div>
                            <div class="lists">

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Access to all JSSCE Past Questions</p>
                            </div>
                            <div class="lists">

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Access to all SSCE Past Questions</p>
                            </div>
                            <div class="lists">

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Access to all UMTE / JAMB Past Questions</p>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <a href="{{url('checkoutdetails')}}" class="text-dark btn btn-light border">Subscribe</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card plan special text-white" style="background: #1A69AF;">
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

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Valid for 24hrs</p>
                            </div>
                            <div class="lists">

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Access to all Class Notes</p>
                            </div>
                            <div class="lists">

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Access to all JSSCE Past Questions</p>
                            </div>
                            <div class="lists">

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Access to all SSCE Past Questions</p>
                            </div>
                            <div class="lists">

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Access to all UMTE / JAMB Past Questions</p>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <a href="{{url('checkoutdetails')}}" class="btn btn-light border ">Subscribe</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card plan">
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

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Valid for 24hrs</p>
                            </div>
                            <div class="lists">

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Access to all Class Notes</p>
                            </div>
                            <div class="lists">

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Access to all JSSCE Past Questions</p>
                            </div>
                            <div class="lists">

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Access to all SSCE Past Questions</p>
                            </div>
                            <div class="lists">

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Access to all UMTE / JAMB Past Questions</p>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <a href="{{url('checkoutdetails')}}" class="text-dark btn btn-light border text-dark">Subscribe</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card plan">
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

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Valid for 24hrs</p>
                            </div>
                            <div class="lists">

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Access to all Class Notes</p>
                            </div>
                            <div class="lists">

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Access to all JSSCE Past Questions</p>
                            </div>
                            <div class="lists">

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Access to all SSCE Past Questions</p>
                            </div>
                            <div class="lists">

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Access to all UMTE / JAMB Past Questions</p>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <a href="{{url('checkoutdetails')}}" class="text-dark btn btn-light border">Subscribe</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card plan special text-white" style="background: #1A69AF;">
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

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Valid for 24hrs</p>
                            </div>
                            <div class="lists">

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Access to all Class Notes</p>
                            </div>
                            <div class="lists">

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Access to all JSSCE Past Questions</p>
                            </div>
                            <div class="lists">

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Access to all SSCE Past Questions</p>
                            </div>
                            <div class="lists">

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Access to all UMTE / JAMB Past Questions</p>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <a href="#" class="btn btn-light border">Subscribe</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card plan">
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

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Valid for 24hrs</p>
                            </div>
                            <div class="lists">

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Access to all Class Notes</p>
                            </div>
                            <div class="lists">

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Access to all JSSCE Past Questions</p>
                            </div>
                            <div class="lists">

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Access to all SSCE Past Questions</p>
                            </div>
                            <div class="lists">

                                <p class="list"><i class="fa-solid fa-circle-check me-2"></i>Access to all UMTE / JAMB Past Questions</p>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <a href="{{url('checkoutdetails')}}" class="text-dark btn btn-light border">Subscribe</a>
                        </div>
                    </div>
                </div>
            </div>

    </section>
@endsection
