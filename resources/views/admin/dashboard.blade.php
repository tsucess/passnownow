@extends('layouts.dasboardtemp')

@section('admincontent')
    <section class="container-fluid greeting__containter mt-3">
        <div class="row">
            <div class="col-12 col-md-6 greetings ">
                <h2>Hello {{ ucfirst(Auth::user()->username);}} !</h2>
                <p>Let's learn something today</p>
                <br>
                <p class="greeting-text">Goodluck with your studies</p>
            </div>
            <div class="col-12 col-md-6  p-4 pb-0 greeting-img">
                <img src="{{ asset('assets/images/admin/greeting-img.png') }}" alt="" class="">
            </div>
        </div>
    </section>
    <section class="container-fluid notifiication__containter  shadow mt-4">
        <div class="row p-2">
            <div class="col-12 col-md-8 subscription">
                <i class="fa-regular fa-credit-card"></i>
                <p>Your Subscription ends on 28 August 2024</p>
            </div>
            <div class="col-12 col-md-4  text-md-end">
                <button class="btn upgrade-btn">Upgrade</button>
            </div>
        </div>
    </section>
    <section class="container-fluid top-courses__containter  shadow py-2 my-4">
        <div class="row">
            <div class="col-12 top">
                <h5>Top Subjects Pick for You</h5>
                <a href="#">See All</a>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-2">
                <div class="card courses">
                    <div class="image_wrapper">
                        <img src="{{ asset('assets/images/admin/course-img1.png') }}" class="course-img" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="courses-tag">Passnownow</div>
                        <h5 class="card-title">English Language</h5>
                        <button type="button" class="buton">View Details</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-2">
                <div class="card courses">
                    <div class="image_wrapper">
                        <img src="{{ asset('assets/images/admin/course-img2.png') }}" class="course-img" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="courses-tag">Passnownow</div>
                        <h5 class="card-title">Mathematics</h5>
                        <button type="button" class="buton">View Details</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-2">
                <div class="card courses">
                    <div class="image_wrapper">
                        <img src="{{ asset('assets/images/admin/course-img3.png') }}" class="course-img" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="courses-tag">Passnownow</div>
                        <h5 class="card-title">Home Economics</h5>
                        <button type="button" class="buton">View Details</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid history__container">
        <div class="row">
            <div class="col-12 col-lg-7 mb-3 mb-md-0 shadow subscription_history">
                <div class="top">
                    <h5>Subscription History</h5>
                    <a href="#">See All</a>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Package</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <h6>Yearly Plan</h6>
                                <p>#00001 | 12-08-24</p>
                            </td>
                            <td><h6>N10,000.00</h6></td>
                            <td><span class="status"><i class="fa-solid fa-circle"></i> <span>Current</span></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h6>Yearly Plan</h6>
                                <p>#00001 | 12-08-24</p>
                            </td>
                            <td><h6>N10,000.00</h6></td>
                            <td><span class="status exp"><i class="fa-solid fa-circle"></i> <span>Expired</span></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h6>Yearly Plan</h6>
                                <p>#00001 | 12-08-24</p>
                            </td>
                            <td><h6>N10,000.00</h6></td>
                            <td ><span class="status exp"><i class="fa-solid fa-circle"></i> <span>Expired</span></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h6>Yearly Plan</h6>
                                <p>#00001 | 12-08-24</p>
                            </td>
                            <td><h6>N10,000.00</h6></td>
                            <td><span class="status"><i class="fa-solid fa-circle"></i> <span>Current</span></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h6>Yearly Plan</h6>
                                <p>#00001 | 12-08-24</p>
                            </td>
                            <td><h6>N10,000.00</h6></td>
                            <td><span class="status exp"><i class="fa-solid fa-circle"></i> <span>Expired</span></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h6>Yearly Plan</h6>
                                <p>#00001 | 12-08-24</p>
                            </td>
                            <td><h6>N10,000.00</h6></td>
                            <td ><span class="status exp"><i class="fa-solid fa-circle"></i> <span>Expired</span></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12 col-lg-5 shadow subjects_history">
                <div class="top">
                    <h5>Completed Subjects</h5>
                    <a href="#">See All</a>
                </div>
                <div class="subject">
                    <span><i class="fa-solid fa-graduation-cap"></i></span>
                    <span>
                        <h6>English Language</h6>
                        <p class="mb-0">Completed</p>
                    </span>
                </div>
                <div class="subject">
                     <span><i class="fa-solid fa-graduation-cap"></i></span>
                    <span>
                        <h6>Mathematics</h6>
                        <p class="mb-0">In Progress</p>
                    </span>
                </div>
                <div class="subject">
                     <span><i class="fa-solid fa-graduation-cap"></i></span>
                    <span>
                        <h6>Computer Science</h6>
                        <p class="mb-0">In Progress</p>
                    </span>
                </div>
                <div class="subject">
                     <span><i class="fa-solid fa-graduation-cap"></i></span>
                    <span>
                        <h6>Chemistry</h6>
                        <p class="mb-0">In Progress</p>
                    </span>
                </div>
                <div class="subject">
                     <span><i class="fa-solid fa-graduation-cap"></i></span>
                    <span>
                        <h6>Physics</h6>
                        <p class="mb-0">In Progress</p>
                    </span>
                </div>
            </div>
        </div>
    </section>
@endsection
