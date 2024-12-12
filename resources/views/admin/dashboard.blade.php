@extends('layouts.dasboardtemp')

<style>
    /* Keyframes for fade-in and slide-in from the bottom */
    @keyframes fadeInSlideUp {
        0% {
            transform: translateY(30px);
            /* Start slightly below */
            opacity: 0;
            /* Start invisible */
        }

        100% {
            transform: translateY(0);
            /* End at the original position */
            opacity: 1;
            /* Fully visible */
        }
    }

    /* Apply animation to the cards */
    .animated-card {
        opacity: 0;
        /* Start invisible */
        animation: fadeInSlideUp 0.8s ease-out forwards;
        /* Forward to keep the final state */
    }

    /* Staggered animation using nth-child */
    .animated-card:nth-child(1) {
        animation-delay: 0s;
    }

    .animated-card:nth-child(2) {
        animation-delay: 0.2s;
    }

    .animated-card:nth-child(3) {
        animation-delay: 0.4s;
    }

    .animated-card:nth-child(4) {
        animation-delay: 0.6s;
    }

    .subHere {
        margin: auto;
        height: 20rem;
    }

    /* Keyframes for fade-in animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Animation applied to each card */
    .subHere {
        animation: fadeIn 0.6s ease-in-out;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    /* Hover effect */
    .subHere:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .sub:hover,
    .sub:hover a {
        color: white
    }
</style>


@section('admincontent')

    @php
        $now = date('Y-m-d');
    @endphp
    <section class="container-fluid greeting__containter mt-3 animate__animated animate__slideInLeft">
        <div class="row greet__user">
            <div class="col-12 col-md-6 greetings ">
                <h2>Hello {{ ucfirst(Auth::user()->username) }} !</h2>
                @if (Auth::user()->role === 'user')
                    <p>Let's learn something today</p>
                    <br>
                    <p class="greeting-text">Goodluck with your studies</p>
                @endif
            </div>
            <div class="col-12 col-md-6  p-4 pb-0 greeting-img">
                <img src="{{ asset('images/admin/greeting-img.png') }}" alt="" class="">
            </div>
        </div>
    </section>
    @if (Auth::user()->role === 'user')

        <section class="container-fluid notifiication__containter  shadow mt-4">
            <div class="row p-2">
                @if (\Session::has('error'))
                    <div class="alert alert-danger">
                        <p class="m-0">{{ \Session::get('error') }}</p>
                    </div>
                @elseif (\Session::has('success'))
                    <div class="alert alert-success">
                        <p class="m-0">{{ \Session::get('success') }}</p>
                    </div>
                @endif
            </div>

            <div class="row p-2">
                @if (!empty($subhistory[0]))
                    <div class="col-12 col-md-8 subscription">
                        <i class="fa-regular fa-credit-card"></i>
                        @php
                            $exp = date_create($exp_date[0]->expiry_date);
                            $exp_d = date_format($exp, 'Y-m-d');
                            $now = date('Y-m-d');
                        @endphp
                        @if ($now > $exp_d)
                            <p>Your Subscription ended on {{ date_format($exp, 'd F Y') }}</p>
                        @else
                            <p>Your Subscription ends on {{ date_format($exp, 'd F Y') }}</p>
                        @endif
                    </div>
                    <div class="col-12 col-md-4  text-md-end">
                        @if ($now > $exp_d)
                            <button class="btn upgrade-btn bg-danger">Expired</button>
                        @else
                            <button class="btn upgrade-btn">Active</button>
                        @endif
                    </div>
                @else
                    <div class="col-12 col-md-8 subscription">
                        <i class="fa-regular fa-credit-card"></i>
                        <p>You don't have any subscription yet!</p>

                    </div>
                    <div class="col-12 col-md-4  text-md-end">
                        <a href="/checkoutdetails" class="btn upgrade-btn ">Subscribe Now</a>
                    </div>
                @endif
            </div>
        </section>
        <section class="container-fluid top-courses__containter  shadow py-2 my-4">
            <div class="row">
                <div class="col-12 top">
                    <h5>Top Subjects Pick for You</h5>
                    <a href="/classes">See All</a>
                </div>
                @foreach ($subjects as $subject)
                    <div class="col-12 col-md-6 col-lg-4 mb-2 ">
                        {{-- <div class="card courses sty"> --}}
                        <div class="card courses sty subHere">
                            <div class="image_wrapper m-0 p-0"
                                style="background-image: url('{{ url('storage/' . $subject->avatar) }}');  bacground-position:center; background-size:cover; background-repeat:none; height: 10rem;">
                            </div>
                            <div class="card-body">
                                <div class="courses-tag">Passnownow</div>
                                <h5 class="card-title">{{ $subject->title }} ({{ $subject->class_unique_id }})</h5>
                                @if (Auth::user()->status === 1)
                                    <a href="{{ route('learning', ['data' => $subject]) }}" class="btn buton">View
                                        Details</a>
                                @else
                                    <button type="button" class="btn buton" data-bs-toggle="modal"
                                        data-bs-target="#subscribeModal">Subscribe Now</button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <section class="container-fluid history__container">
            <div class="row">
                <div class="col-12 col-lg-7 mb-3 mb-md-0 shadow subscription_history">
                    <div class="top">
                        <h5>Subscription History</h5>
                        <a href="/subscriptiondetails">See All</a>
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
                            @if (!empty($subhistory[0]))
                                @foreach ($subhistory as $history)
                                    <tr>
                                        <td>
                                            <h6>{{ $history->plan_name }} Plan</h6>
                                            <p>#{{ $history->orderID }} | {{ $history->updated_at }}</p>
                                        </td>
                                        <td>
                                            <h6>N{{ number_format($history->amount) }}</h6>
                                        </td>
                                        <td>
                                            @php
                                                $exp_day = date_create($history->expiry_date);
                                                $exp_day = date_format($exp_day, 'Y-m-d');
                                            @endphp

                                            @if ($now > $exp_day)
                                                <span class="status exp"><i class="fa-solid fa-circle"></i>
                                                    <span>Expired</span></span>
                                            @else
                                                <span class="status"><i class="fa-solid fa-circle"></i>
                                                    <span>Current</span></span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" class="text-center p-3">
                                        <p>You have no subscription history</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="col-12 col-lg-5 shadow subjects_history">
                    <div class="top">
                        <h5>Available Past Questions</h5>
                        <a href="/adexams">See All</a>
                    </div>
                    @foreach ($questions as $question)
                        <div class="subject sub">
                            <span><i class="fa-solid fa-graduation-cap"></i></span>
                            <span>
                                <h6>{{ $question->year }}</h6>
                                <a href="#" class="mb-0">view</a>
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


        <!-- Subscribe Modal -->
        <div class="modal fade" id="subscribeModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="addModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3 mx-auto text-center">
                                    <a href="/"><img src="{{ asset('images/logo.png') }}" alt=""
                                            class="mb-3 w-50"></a>
                                    <h5>You do not have an active subscription</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="/checkoutdetails" class="btn upgrade-btn mx-auto">Subscribe Now</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class ="row mb-3">
            <div class = "col-sm ms-3 mt-3 mb-2 p-3 border border-primary overflow-hidden  h-50">
                <a class = "text-decoration-none text-dark" href = "{{ url('adtotalsales') }}">
                    <span class = "ms-2 mt-3 profit">Total Profit</span><br>

                    <span class  = "ms-2 mb-4 fw-bold fs-5  profit">N{{ $totalSum }}</span>
                    <span class = "float-end rounded-5 mb-2 bg-opacity-25 opacity-10 pe-3"
                        style = "font-size: 30px; font-weight:bold;  margin-top: -15px;">&#x20A6;
                        {{-- <i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10"
                            aria-hidden="true"></i>6.7% --}}
                    </span>
                    {{-- <br><br>
                    <span>Monthly goal</span>
                    <span class = "float-end">70%</span>

                    <div class="progress mb-3 mt-1" role="progressbar" aria-label="Basic example" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100" style = "height: 5px;">
                        <div class="progress-bar bg-primary" style="width: 75%"></div>
                    </div> --}}
                </a>
            </div>

            <div class = "col-sm ms-3 mt-3 mb-2 p-3 border border-primary h-75  overflow-hidden">
                <span class = "ms-2 mt-3">Total Administrators</span><br>
                <span class  = "ms-2 mb-4 fw-bold fs-5 ">{{ $totalAdmins }}</span>
                <span class = "float-end rounded-5 mb-2 bg-opacity-25 opacity-10 pe-3"
                    style = "font-size: 30px; font-weight:bold;  margin-top: -15px;">
                    {{-- <i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10"
                        aria-hidden="true"></i>6.7% --}}
                    <i class="fa-solid fa-user-tie"></i>

                </span>

                {{--
                    <span>Monthly goal</span>
                    <span class = "float-end">70%</span>

                    <div class="progress mb-3 mt-1" role="progressbar" aria-label="Basic example" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100" style = "height: 5px;">
                        <div class="progress-bar bg-primary" style="width: 75%"></div>
                    </div>
                 --}}
            </div>
            <div class = "col-sm ms-3 mt-3 p-3 mb-2 border border-primary overflow-hidden">
                <span class = "ms-2 mt-3">Total Users</span><br>
                <span class  = "ms-2 mb-4 fw-bold fs-5 ">{{ $totalUsers }}</span>
                <span class = "float-end rounded-5 mb-2 bg-opacity-25 opacity-10 pe-3"
                    style = "font-size: 30px; font-weight:bold; margin-top: -15px;">
                    {{-- <i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10"
                        aria-hidden="true"></i>6.7% --}}
                    <i class="fas fa-users" aria-hidden="true"></i>
                </span>
                {{-- <br><br>

                <span>Monthly goal</span>
                <span class = "float-end">70%</span>

                <div class="progress mb-3 mt-1" role="progressbar" aria-label="Basic example" aria-valuenow="75"
                    aria-valuemin="0" aria-valuemax="100" style = "height: 5px;">
                    <div class="progress-bar bg-primary" style="width: 75%"></div>
                </div> --}}
            </div>
        </div>

        <div class = "row ms-2 border border-1 border-black p-2 mb-2">
            <div class = "border-bottom border-black border-1">
                <span>Stats Overview</span>
                <span class = "float-end  mb-2"><i class="fa fa-ellipsis-v mt-2" aria-hidden="true"></i></span>
            </div>
            <div class="d-flex justify-content-between border-bottom border-black border-1">
                <div class="pt-2" style = "width: 100px;">Today</div>
                <div class="p-2 text-black">Week to Date</div>
                <div class="p-2 text-black pe-5 float-start">Month to Date</div>
            </div>

            <div class="d-flex justify-content-between border-bottom border-black border-1 px-0">
                <div class = "profit w-100 border-start border-black border-1 m-0">
                    <a class = "col-12 col-md-6  mt-2 mb-3  text-decoration-none text-dark"
                        href = "{{ url('totalsales') }}">
                        <div class="profit">
                            <span>Total Sales</span> <br>
                            <span>N {{ $totalSum }}</span>
                            <span class = "float-end rounded-5 mb-2 bg-opacity-25 opacity-10 pe-3"
                                style = "font-size: 30px; font-weight:bold; margin-top: -15px;">&#x20A6;
                                {{-- <i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7% --}}
                            </span>
                        </div>
                    </a>
                </div>
                <div class = "profit w-100 border-start border-black border-1 m-0">
                    <a class = "col-12 col-md-6  mt-2 mb-3  text-decoration-none text-dark" href = "{{ url('order') }}">
                        <div class="profit">
                            {{-- class  = "fw-3" --}}
                            <span class = "ms-2 ">Orders</span> <br>
                            <span class  = "ms-2">{{ $totalOrders }}</span>
                            <span class = "float-end rounded-5 mb-2 bg-opacity-25 opacity-10 pe-3"
                                style = "font-size: 30px; font-weight:bold; margin-top: -15px;">
                                <i class="fa-solid fa-receipt"></i>
                                {{-- <i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10"
                                aria-hidden="true"></i>6.7% --}}
                            </span>

                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row ms-2 border border-black">
            <div class ="col-12 profit p-2">
                <a href = "{{ url('detailedstat') }}" class = "text-decoration-none detailedstat">View
                    detailed stats</a>
            </div>
        </div>

        <div class ="row border border-1 border-black mt-2 ms-2 mb-3 p-2">
                <span class = "float-start mt-2">Recent user
                    <i class="fa fa-ellipsis-v float-end mt-1 mb-1" aria-hidden="true"></i>
                </span>
        </div>

        @php $sn= 0;  @endphp
        <div class="table-responsive w-100 small float-start mt-2 ms-2 mb-5 pb-5">
            <table class="table custom-table mb-5 pb-5" id="userss">
                <thead class="table-secondary">
                    <tr>
                        <th scope="col">S/N</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col" class="col-2">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col" class="col-2">Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fetchUsers as $User)
                        <tr>
                            <th>{{ ++$sn }}</th>
                            <td>{{ $User->first_name }} {{ $User->last_name }}</td>
                            <td>{{ $User->username }} </td>
                            <td>{{ $User->email }}</td>
                            <td>
                                @if ($User->role === 'sadmin')
                                    {{ 'Super Admin' }}
                                @elseif ($User->role === 'admin')
                                    {{ 'Admin' }}
                                @else
                                    {{ 'User' }}
                                @endif
                            </td>
                            <td>{{ $User['created_at'] }}</td>
                            <td>
                                <div class="action">
                                    <i class="fa-solid fa-ellipsis-vertical align-text-bottom text-dark more-button"></i>
                                    {{-- <span class="align-text-bottom text-dark more-button"></span> --}}
                                    <ul class="more-options">
                                        <li><a href="{{ route('admin.edit', ['data' => $User]) }}"
                                                class="btn btn-primary p-1 px-3">view</a></li>
                                        <li><a href="{{ route('admin.destroy', ['data' => $User->id]) }}"
                                                class="btn btn-danger p-1 px-3">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
