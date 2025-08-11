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

    #exam-instruction li {
        line-height: 1.5rem;
        margin-bottom: 0.5rem;
    }
</style>


@section('admincontent')
    <div class="row m-0">
        <div class="col-12 col-md-6 col-lg-6 mt-3 ">
            <h3 class = "fw-bold">Dashboard Overview</h3>
        </div>
    </div>
    @php
        $now = date('Y-m-d');
    @endphp
    <section class="container-fluid greeting__containter mt-3 animate__animated animate__slideInLeft">
        <div class="row greet__user">
            <div class="col-12 col-md-6 greetings ">
                {{-- <h2>Hello {{ ucfirst(Auth::user()->username) }} !</h2> --}}
                <h2>Hello {{ ucfirst(Auth::user()->first_name) }} {{ ucfirst(Auth::user()->last_name) }}!</h2>
                @if (Auth::user()->role === 'user')
                    <p>Let's learn something today</p>
                    <br>
                    <p class="greeting-text">Goodluck with your studies</p>
                @else
                    <p>Welcome to Passnownow Admin</p>
                @endif
            </div>
            <div class="col-12 col-md-6  p-4 pb-0 greeting-img">
                <img src="{{ asset('images/admin/greeting-img.png') }}" alt="" class="">
            </div>
        </div>
    </section>
    @if (Auth::user()->role === 'user')
        <section class="container-fluid notifiication__containter  shadow mt-4">
            <div class="row">
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

            <div class="row mx-2 p-2">
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
        <section class="container-fluid top-courses__containter py-4 mb-4">
            <div class="row gap-2">
                <div class="col-12 top">
                    <h5>Top Exams Picked for You</h5>
                    <a href="/adexams">See All</a>
                </div>
                @foreach ($topExams as $exam)
                    <div class="col-12 col-md-6 col-lg-4 px-0 pb-3" style="width:32%;">
                        <div class="card courses subHere px-4">
                            <span class="w-100 text-end fs-4 "><b>{{ $exam->subjects_count }}</b></span>
                            <div class="image_wrapper m-0 p-0" style="">
                                <img src="{{ asset('storage/' . $exam->avatar) }}" class=" mb-3" alt="{{ $exam->title }}"
                                    style="height: 8rem;">
                            </div>
                            <div class="card-body pb-2">
                                <div class="courses-tag">Passnownow</div>
                                <h5 class="card-title">{{ $exam->title }} </h5>
                                @if (Auth::user()->status === 1)
                                    <a href="{{ route('showsubjects', ['data' => $exam]) }}" class="btn buton w-100">Select
                                        Exam</a>
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
                    <div class="table-responsive">
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
                </div>

                <div class="col-12 col-lg-5 shadow subjects_history">
                    <div class="top">
                        <h5>Applied Examinations</h5>
                        <a href="/adexams">See All</a>
                    </div>
                    @foreach ($appliedExams as $subject)
                        <button class="subject sub w-100 start_exam justify-content-between" data-bs-toggle="modal"
                            data-bs-target="#exam-instruction" data-subject-id="{{ $subject->id }}">
                            <span class="d-flex align-items-center gap-2">
                                <span><i class="fa-solid fa-graduation-cap"></i></span>
                                <span>
                                    <h6>{{ $subject->title }}</h6>
                                    {{-- <a href="{{ url('start_exam/' . $subject->id) }}" class="mb-0">Start Exam</a> --}}
                                </span>
                            </span>
                            <span class="w-50 text-end">
                                Start Exam &nbsp;
                                {{-- <i class="fas fa-play text-center" style="padding: 0.6rem 0.75rem"></i> --}}
                            </span>
                        </button>
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
        <!-- Large modal -->
        <div class="modal fade" id="exam-instruction" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <button type="button" class="btn-close border-radius-50 p-2" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="row justify-content-start ms-2">
                        <div class="col-12 col-md-6 col-lg-6 mt-4">
                            <h3>Welcome {{ ucfirst(Auth::user()->first_name) }} {{ ucfirst(Auth::user()->last_name) }}!
                            </h3>
                        </div>
                    </div>

                    <div class = "container-fluid my-4">
                        <div class = "row">
                            <div class = "col-12 col-md-12 col-lg-12 bg-white d-flex flex-column p-5 w-100 h-75">
                                <h5 class = "fw-bold align-items-start">Instructions</h5>
                                <p>
                                    Please read the following instructions carefully before starting your examination.
                                </p>
                                <ol>
                                    <li>
                                        <strong>Timed Examination:</strong> The countdown will begin as soon as you start
                                        the exam.
                                        The exam duration is shown at the top left of your screen, and the live timer is
                                        displayed at the center.
                                    </li>
                                    <li>
                                        <strong>Answering Multiple-Choice & Alternate Questions:</strong> You may select
                                        only <em>one</em> answer per question.
                                        If you are unsure about a question, you can skip it using the <strong>Next</strong>
                                        button and return to it later using the <strong>Previous</strong> button.
                                    </li>
                                    <li>
                                        <strong>Answering Theory Questions:</strong> For theory questions, type your answer
                                        in the provided answer area (text box).
                                        Ensure your responses are clear and complete before moving to the next question.
                                    </li>
                                    <li>
                                        <strong>Submitting Your Exam:</strong> Once you have completed all questions, click
                                        the <strong>Submit</strong> button located at the bottom left of the last page.
                                        Please note that once you submit, your answers cannot be changed.
                                    </li>
                                </ol>

                                <div class="text-center mt-4 startexambutton">
                                    <a href="#" id="modal-start-exam-link"
                                        class="btn btn-primary mb-3 py-2 px-4 sub">
                                        Start Exam &nbsp;<i class="fas fa-check-circle"></i>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const examModal = document.getElementById('exam-instruction');
                const startExamLink = document.getElementById('modal-start-exam-link');

                examModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget; // The button that triggered the modal
                    const subjectId = button.getAttribute('data-subject-id');

                    // Update the link in the modal
                    startExamLink.setAttribute('href', `/start_exam/${subjectId}`);
                });
            });
        </script>
    @else
        <div class ="row mx-3  gap-2">
            <div class = "col-12 col-md-4 col-lg-4 mt-3 mb-2 bg-white border border-start-0 border-end-0 border-3 calculationBox"
                style = "height:130px; border-color: #f1f1f1;">
                <a class = "text-decoration-none text-dark" href = "{{ url('adtotalsales') }}">
                    <span class = "ms-1 mt-3 profit">Total Profit</span><br>

                    <span class  = "ms-1 mb-4 fw-bold fs-5  profit">N{{ $totalSum }}</span>
                    <span class = "float-end rounded-pill  mb-2 py-1 px-2 bg-opacity-75"
                        style = "font-size: 12px;  margin-top: -15px; --bs-bg-opacity: 0.6; background: #e5faf6;">
                        <i class="fa fa-arrow-up pe-2" aria-hidden="true"></i><span class="bg-succes">6.7%</span>
                    </span>
                    <br><br>
                    {{-- <p>Monthly Goal</p> --}}
                    <div class="row justify-content-between ms-1 me-1">
                        <div class="col-5"> Monthly Goal</div>
                        <div class=" col-4 text-end"> 70%</div>
                    </div>
                </a>

                <div class="progress mb-3 mt-1 ms-2 me-1" role="progressbar" aria-label="Basic example"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style = "height: 5px;">
                    <div class="progress-bar bg-primary" style="width: 75%;"></div>
                </div>

            </div>
            <div class = "col-12 col-md-4 col-lg-4 mt-3 mb-2 bg-white border border-start-0 border-end-0 border-3 calculationBox"
                style="height: 130px; border-color: #f1f1f1;">
                <span class = " mt-3">Total Administrators</span><br>
                <span class  = "ms-1 mb-4 fw-bold fs-5 ">{{ $totalAdmins }}</span>
                <span class = "float-end rounded-pill  mb-2 py-1 px-2 bg-opacity-75"
                    style = "font-size: 12px;  margin-top: -15px; --bs-bg-opacity: 0.6; background: #e5faf6;">
                    <i class="fa fa-arrow-up pe-2" aria-hidden="true"></i><span class="bg-succes">6.7%</span>
                </span>
                <br><br>
                <p><i class="fa-solid fa-user-tie fa-2x"></i></p>
            </div>
            <div class = "col-12 col-md-4 col-lg-4 mt-3 mb-2 bg-white border border-start-0 border-end-0 border-3 calculationBox"
                style = "height: 130px; border-color: #f1f1f1;">
                <span class = "mt-3">Total Users</span><br>
                <span class  = "ms-1 mb-4 fw-bold fs-5 ">{{ $totalUsers }}</span>
                <span class = "float-end rounded-pill  mb-2 py-1 px-2 bg-opacity-75"
                    style = "font-size: 12px;  margin-top: -15px; --bs-bg-opacity: 0.6; background: #e5faf6;">
                    <i class="fa fa-arrow-up pe-2" aria-hidden="true"></i><span class="bg-succes">6.7%</span>
                </span>
                {{--

                <span>Monthly goal</span>
                <span class = "float-end">70%</span>

                <div class="progress mb-3 mt-1" role="progressbar" aria-label="Basic example" aria-valuenow="75"
                    aria-valuemin="0" aria-valuemax="100" style = "height: 5px;">
                    <div class="progress-bar bg-primary" style="width: 75%"></div>
                </div> --}}<br><br>

                <p><i class="fa-solid fa-school fa-2x"></i></p>
            </div>
        </div>

        <div class = "row m-3 mt-0 gap-2">
            <div class = "col-12 col-md-4 col-lg-4 mt-3 mb-2 bg-white border border-start-0 border-end-0 border-3 calculationBox"
                style="height: 130px; border-color: #f1f1f1;">
                <span class = "ms-2 mt-3">Total Number of Examinations</span><br>
                <span class  = "ms-2 mb-4 fw-bold fs-5 ">{{ $totalExams }}</span>
                <span class = "float-end rounded-5 mb-2 bg-opacity-25 opacity-10 pe-3"
                    style = "font-size: 30px; font-weight:bold;  margin-top: -15px;">
                </span><br><br>
                <p><i class="fa-solid fa-book-open fa-2x"></i> </p>
            </div>

            {{-- <div class = "col-12 col-md-3 col-lg-3 ms-2 mt-3 mb-2 p-3 bg-white border border-start-0 border-end-0 border-3 rounded-3 calculationBox"
                style="height: 130px; border-color: #f1f1f1;"> --}}
            <div class = "col-12 col-md-4 col-lg-4 mt-3 mb-2 bg-white border border-start-0 border-end-0 border-3 calculationBox"
                style="height: 130px; border-color: #f1f1f1;">
                <span class = "ms-2 mt-3">Total Number of Subjects</span><br>
                <span class  = "ms-2 mb-4 fw-bold fs-5 ">{{ $totalSubjects }}</span>
                <span class = "float-end rounded-5 mb-2 bg-opacity-25 opacity-10 pe-3"
                    style = "font-size: 30px; font-weight:bold;  margin-top: -15px;">
                </span><br><br>
                <p><i class="fa-solid fa-bell fa-2x"></i></p>
            </div>
            <div class = "col-12 col-md-4 col-lg-4 mt-3 mb-2 bg-white border border-start-0 border-end-0 border-3 calculationBox"
                style="height: 130px; border-color: #f1f1f1;">
                <span class = "ms-2 mt-3">Total Number of Questions</span><br>
                <span class  = "ms-2 mb-4 fw-bold fs-5 ">{{ $totalQuestions }}</span>
                <span class = "float-end rounded-5 mb-2 bg-opacity-25 opacity-10 pe-3"
                    style = "font-size: 30px; font-weight:bold;  margin-top: -15px;">
                </span><br><br>
                <p><i class="fa-solid fa-bell fa-2x"></i></p>
            </div>
        </div>

        <div class = "row m-0">
            <h6 class = "mt-2 mb-2">CANDIDATE PROFILE</h6>
            <p>Your awesome text goes here</p>
        </div>
        @php $sn= 0;  @endphp
        <div class="table-responsive w-100 small mt-2 mb-3 p-4 pb-5">
            <table class="table custom-table mb-5 pb-5" id="userss">
                <thead class="table-secondary">
                    <tr>
                        <th scope="col">S/N</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col" class="col-2">Email</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Status</th>
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
                            <td>{{ ucfirst($User->gender) }}</td>
                            <td>
                                @php
                                    $exp_day = date_create($User->created_at);
                                    $exp_day = date_format($exp_day, 'Y-m-d');
                                @endphp

                                @if ($now > $exp_day)
                                    <span class="status exp"><i class="fa-solid fa-circle"></i>
                                        <span>Deactivated</span></span>
                                @else
                                    <span class="status"><i class="fa-solid fa-circle"></i>
                                        <span>Active</span></span>
                                @endif

                            </td>
                            <td>{{ $User['created_at'] }}</td>
                            <td class="d-flex ">
                                <a href="{{ route('admin.edit', ['data' => $User]) }}" class="p-1"><i
                                        class="fa-solid fa-eye text-warining"></i></a>
                                <a href="{{ route('admin.destroy', ['data' => $User->id]) }}" class="p-1"><i
                                        class="fa-solid fa-circle-xmark text-danger"></i></a>

                                {{-- <div class="action">
                                    <i class="fa-solid fa-ellipsis-vertical align-text-bottom text-dark more-button"></i>
                                    <span class="align-text-bottom text-dark more-button"></span>
                                    <ul class="more-options">
                                        <li><a href="{{ route('admin.edit', ['data' => $User]) }}"
                                                class="btn btn-primary p-1 px-3">view</a></li>
                                        <li><a href="{{ route('admin.destroy', ['data' => $User->id]) }}"
                                                class="btn btn-danger p-1 px-3">Delete</a></li>
                                    </ul>
                                </div> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row m-0 gap-2 p-2">
            <div class="col-12 col-md-4 col-lg-4 bg-white chart-wrapper">
                <h6 class = " mt-4 text-center">TOTAL UNIQUE VISITORS</h6>
                <div class="chart-container">
                    <canvas id="candidateChart" width="400" height="320"></canvas>

                    <!-- Optional: Male/Female labels below -->
                    <div class="text-center">
                        <span class="me-2"><span style="color:#4dc9c0;">■</span> Male</span>
                        <span><span style="color:#e5e5e5;">■</span> Female</span>
                    </div>
                    {{-- <canvas id="candidateChart" ></canvas>
                    <div class="chart-center-label">Candidates</div> --}}
                </div>
                <div class="visitor-stats mt-5">
                    <div>
                        <h5 class="count">{{ $noOfMaleUsers }}</h5>
                        <p class="label">Visitors Male</p>
                    </div>
                    <div>
                        <h5 class="count">{{ $noOfFemaleUsers }}</h5>
                        <p class="label">Visitors Female</p>
                    </div>
                </div>
            </div>


            <div class = "col-12 col-md-4 col-lg-4 bg-white chart-wrapper">
                <h6 class = "mt-4 text-center ">NUMBER OF TRANSACTIONS</h6>
                <div class="chart-container mt-2">
                    <canvas id="transactionChart" width="400" height="320"></canvas>
                    <!-- Optional: Done/Due/Hold labels below -->
                    <div class="text-center mt-2">
                        <span class="me-1"><span style="color:#e5e5e5;">■</span> Done</span>
                        <span class="me-1"><span style="color:#4dc9c0;">■</span> Due</span>
                        <span><span style="color:#E68900;">■</span> Hold</span>
                    </div>
                </div>

                <!-- Transaction Counts -->
                <div class="transaction-stats mt-5">
                    <div class = "ms-3">
                        <h5 class="count">{{ $totalOrders }}</h5>
                        <p class="label">Payment Done</p>
                    </div>
                    <div>
                        <h5 class="count">{{ $totalExpiredOrders }}</h5>
                        <p class="label">Payment Due</p>
                    </div>
                </div>
            </div>

            <div class="col col-md-4 col-lg-4 bg-white chart-wrapper new-users">
                <h6 class="mt-4">NEW USERS</h6>
                <p>Your awesome text goes here</p><br>
                {{-- fetchNewUsers --}}
                <div>
                    @foreach ($fetchNewUsers as $User)
                        <div class="row mb-3 px-2">
                            <div class="col-2 p-0">
                                <div class="image_wrap">
                                    <img src = "images/avatar.png">
                                </div>
                            </div>
                            <div class="col-8 px-2">
                                <h5>{{ $User->first_name }} {{ $User->last_name }}</h5>
                                <p>Nigeria</p>
                            </div>
                            <div class="col-2 p-0 status">
                                <i class="fa-solid fa-circle {{ $User->status ? 'text-success' : 'text-danger' }} "></i>
                                <br>
                                <span>{{ $User->updated_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        <script type="module">
            // Visitor Chart 

            // const ctx = document.getElementById('candidateChart');
            // new Chart(ctx, {
            //     type: 'doughnut',
            //     data: {
            //         labels: ['Male', 'Female'],
            //         datasets: [{
            //             data: [1507, 854],
            //             backgroundColor: ['#4dc9c0', '#e5e5e5'],
            //             borderWidth: 0,
            //             cutout: '80%',
            //             // large center
            //         }]
            //     },
            //     options: {
            //         responsive: true,
            //         plugins: {
            //             legend: {
            //                 position: 'bottom',
            //                 display: false
            //             },
            //             tooltip: {
            //                 enabled: true
            //             }
            //         }
            //     }
            // });

            const doneCount = @json($totalOrders);
            const pendingCount = @json($totalPendingOrders);
            const expiredCount = @json($totalExpiredOrders);

            const maleCount = @json($noOfMaleUsers);
            const femaleCount = @json($noOfFemaleUsers);
            const ctx = document.getElementById('candidateChart');

            const centerTextPlugin = {
                id: 'centerText',
                beforeDraw(chart, args, options) {
                    const {
                        width
                    } = chart;
                    const {
                        height
                    } = chart;
                    const ctx = chart.ctx;

                    ctx.save();
                    ctx.font = 'normal 18px sans-serif';
                    ctx.fillStyle = '#8C9396';
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'middle';
                    ctx.fillText(`Candidates`, width / 2, height / 2);
                    ctx.restore();
                }
            };

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Male', 'Female'],
                    datasets: [{
                        data: [maleCount, femaleCount],
                        backgroundColor: ['#4dc9c0', '#e5e5e5'],
                        borderWidth: 0,
                        cutout: '80%'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        },
                        tooltip: {
                            enabled: true
                        }
                    }
                },
                plugins: [centerTextPlugin]
            });



            // document.addEventListener("DOMContentLoaded", function() {
            const ctxpie = document.getElementById('transactionChart');

            const config = {
                type: 'pie',
                data: {
                    labels: ['Done', 'Due', 'Hold'],
                    datasets: [{
                        data: [doneCount, expiredCount, pendingCount],
                        backgroundColor: [
                            '#F1F1F1',
                            '#64C5B1',
                            '#E68900'
                        ],
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return `${context.label}: ${context.formattedValue}`;
                                }
                            }
                        }
                    }
                }
            };

            new Chart(ctxpie, config);
            // });
        </script>

    @endif
@endsection
