@extends('layouts.dasboardtemp')


@section('admincontent')

    @php
        $now = date('Y-m-d');
    @endphp
    {{-- <section class="container-fluid greeting__containter mt-3 animate__animated animate__slideInLeft">
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
    </section> --}}

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
                    <h5>Top Examination Pick for You</h5>
                    <a href="/classes">See All</a>
                </div>
                {{-- @foreach ($subjects as $subject)
                    <div class="col-12 col-md-6 col-lg-4 mb-2 ">

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
                @endforeach --}}

                <div class = "col-12 col-md-3 col-lg-3 pt-3 ms-2 mb-2  bg-white border text-center rounded examcategory">
                    <p class = "float-end fw-bold">100</p>
                    <img src="{{ asset('images/WAEC.png') }}" class = "w-25" alt="WAEC">
                    <p style = "font-size: 12px;">West African Examination Council</p>
                </div>



                <div class = "col-12 col-md-3 col-lg-3 pt-3 ms-2  mb-2 bg-white border text-center rounded examcategory">
                    <p class = "float-end fw-bold">100</p>
                    <img src="{{ asset('images/JAMB.png') }}" class = "w-25" alt="JAMB">
                    <p style = "font-size: 12px;">Joint Admission and Matriculation Board</p>
                </div>



                <div class = "col-12 col-md-3 col-lg-3 pt-3 ms-2 mb-2 bg-white border text-center rounded examcategory">
                    <p class = "float-end fw-bold">100</p>
                    <img src="{{ asset('images/NECO.png') }}" class = "w-25" alt="NECO">
                    <p style = "font-size: 12px;">National Examination Council</p>
                </div>


            </div>
        </section>
        <section class="container-fluid history__container">
            <div class="row">
                <div class="col-12 col-lg-7 mb-3 mb-md-0 shadow subscription_history">
                    <div class="top mb-0">
                        <h5>SUBSCRIPTION HISTORY</h5>
                        <a href="/subscriptiondetails">See All</a>
                    </div>

                    <div>
                        <p>Your awesome text goes here</p>
                    </div>



                    <table>

                        <thead>
                            <tr>
                                <th>-</th>
                                <th>Package</th>
                                <th>Price</th>
                                <th>Start Date</th>
                                <th>Expiring Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (!empty($subhistory[0]))
                                @foreach ($subhistory as $history)
                                    <tr>
                                        <td></td>

                                        <td>
                                            <h6>{{ $history->plan_name }} Plan</h6>
                                            <p>#{{ $history->orderID }} | {{ $history->updated_at }}</p>
                                        </td>

                                        <td>
                                            <h6>N{{ number_format($history->amount) }}</h6>
                                        </td>

                                        <td>
                                            <h6>{{ $history->created_at }}</h6>
                                        </td>

                                        <td>
                                            <h6>{{ $history->expiry_date }}</h6>
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
        {{-- <div class = "container-fluid"> --}}
        <div class = "container-fluid">
            <div class="row justify-content-end">
                <div class="col-12 col-md-6 col-lg-6">
                    <h3 class = "fw-bold">Dashboard Overview</h3>
                    <p>Welcome to Passnownow Admin</p>
                </div>

                <div class="col-12 col-lg-6 col-md-6 d-flex justify-content-end" style = "height: 55px;">
                    <button type="button" class="btn text-white" style = "background-color:#1A69AF">Examination
                        Upload</button>
                    <button type="button" class="btn btn-light border border-primary ms-2" style = "color: #1A69AF;">Add
                        Admin</button>
                </div>

            </div>


            {{-- <div class = "container-fluid mt-3"> --}}
            <div class ="row mb-3">
                <div class = "col-12 col-md-4 col-lg-4 mt-3 mb-2 pt-2 bg-white border border-start-0 border-end-0 border-3 rounded-3 calculationBox"
                    style = "height:130px; border-color: #f1f1f1;">
                    <a class = "text-decoration-none text-dark" href = "{{ url('adtotalsales') }}">
                        <span class = "ms-1 mt-3 profit">Total Profit</span><br>

                        <span class  = "ms-1 mb-4 fw-bold fs-5  profit">N{{ $totalSum }}</span>
                        <span class = "float-end rounded-pill  mb-2 p-2 bg-opacity-75"
                            style = "font-size: 14px;  margin-top: -15px; --bs-bg-opacity: 0.6; background: #e5faf6;">
                            <i class="fa fa-arrow-up pe-3 ps-2" aria-hidden="true"></i><span
                                class="p-2 rounded-circle bg-succes">6.7%</span>
                        </span><br><br>
                        {{-- <p>Monthly Goal</p> --}}
                        <div class="row justify-content-between ms-1 me-1">
                            <div class="col-5">
                                Monthly Goal
                            </div>
                            <div class=" col-4 text-end">
                                70%
                            </div>
                        </div>
                        {{-- <br><br>
                    <span>Monthly goal</span>
                    <span class = "float-end">70%</span>

                    <div class="progress mb-3 mt-1" role="progressbar" aria-label="Basic example" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100" style = "height: 5px;">
                        <div class="progress-bar bg-primary" style="width: 75%"></div>
                    </div> --}}
                    </a>


                    <div class="progress mb-3 mt-1 ms-2 me-1" role="progressbar" aria-label="Basic example"
                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style = "height: 5px;">
                        <div class="progress-bar bg-primary" style="width: 75%;"></div>
                    </div>

                </div>

                <div class = "col-12 col-md-4 col-lg-4 mt-3 mb-2 pt-2 bg-white border border-start-0 border-end-0 border-3 rounded-3 calculationBox"
                    style="height: 130px; border-color: #f1f1f1;">
                    <span class = " mt-3">Total Administrators</span><br>
                    <span class  = "ms-1 mb-4 fw-bold fs-5 ">{{ $totalAdmins }}</span>
                    <span class = "float-end rounded-pill  mb-2 p-2 bg-opacity-75"
                        style = "font-size: 14px;  margin-top: -15px; --bs-bg-opacity: 0.6; background: #e5faf6;">
                        <i class="fa fa-arrow-up pe-3 ps-2" aria-hidden="true"></i><span
                            class="p-2 rounded-circle bg-succes">6.7%</span>
                    </span>

                    </span><br><br>

                    <p> <i class="fa-solid fa-user-tie fa-2x"></i> </p>


                    {{--
                    <span>Monthly goal</span>
                    <span class = "float-end">70%</span>

                    <div class="progress mb-3 mt-1" role="progressbar" aria-label="Basic example" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100" style = "height: 5px;">
                        <div class="progress-bar bg-primary" style="width: 75%"></div>
                    </div>
                 --}}
                </div>
                <div class = "col-12 col-md-4 col-lg-4 mt-3 mb-2 pt-2 bg-white border border-start-0 border-end-0 border-3 rounded-3 calculationBox"
                    style = "height: 130px; border-color: #f1f1f1;">
                    <span class = "mt-3">Total Users</span><br>
                    <span class  = "ms-1 mb-4 fw-bold fs-5 ">{{ $totalUsers }}</span>
                    <span class = "float-end rounded-pill  mb-2 p-2 bg-opacity-75"
                        style = "font-size: 14px;  margin-top: -15px; --bs-bg-opacity: 0.6; background: #e5faf6;">
                        <i class="fa fa-arrow-up pe-3 ps-2" aria-hidden="true"></i><span
                            class="p-2 rounded-circle bg-succes">6.7%</span>
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
            {{-- </div> --}}


            <div class = "row mb-3">
                <div class = "col-12 col-md-4 col-lg-4 mt-3 mb-2 p-3 bg-white border border-start-0 border-end-0 border-3 rounded-3 calculationBox"
                    style="height: 130px; border-color: #f1f1f1;">
                    <span class = "ms-2 mt-3">Total Number of Examination</span><br>
                    <span class  = "ms-2 mb-4 fw-bold fs-5 ">{{ $totalAdmins }}</span>
                    <span class = "float-end rounded-5 mb-2 bg-opacity-25 opacity-10 pe-3"
                        style = "font-size: 30px; font-weight:bold;  margin-top: -15px;">

                    </span><br><br>

                    <p><i class="fa-solid fa-book-open fa-2x"></i> </p>


                </div>


                {{-- <div class = "col-12 col-md-3 col-lg-3 ms-2 mt-3 mb-2 p-3 bg-white border border-start-0 border-end-0 border-3 rounded-3 calculationBox"
                style="height: 130px; border-color: #f1f1f1;"> --}}
                <div class = "col-12 col-md-4 col-lg-4 mt-3 mb-2 p-3 bg-white border border-start-0 border-end-0 border-3 rounded-3 calculationBox"
                    style="height: 130px; border-color: #f1f1f1;">
                    <span class = "ms-2 mt-3">Total Number of Question</span><br>
                    <span class  = "ms-2 mb-4 fw-bold fs-5 ">{{ $totalAdmins }}</span>
                    <span class = "float-end rounded-5 mb-2 bg-opacity-25 opacity-10 pe-3"
                        style = "font-size: 30px; font-weight:bold;  margin-top: -15px;">

                    </span><br><br>

                    <p><i class="fa-solid fa-bell fa-2x"></i></p>


                </div>



                {{-- <div class = "col-12 col-md-3 col-lg-3 ms-3 mt-3 mb-2 p-3 " style="height: 130px;"> --}}
            </div>
        </div>



        {{-- <div class = "container"> --}}
        <div class = "row">
            <h6 class = "mt-2 mb-2">CANDIDATE PROFILE</h6>
            <p>Your awesome text goes here</p>

            <div class = "table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">-</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email Address</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Winner Effiong</td>
                            <td>majorsignature@gmail.com</td>
                            <td>08102929049</td>
                            <td>2023-10-01</td>
                            <td>&hellip;</td>
                        </tr>

                        <tr>
                            <th scope="row">2</th>
                            <td>Taofeeq Bola Asiwaju</td>
                            <td>taofeeqbolaasiwaju@gmail.com</td>
                            <td>08102929049</td>
                            <td>2023-10-01</td>
                            <td>&hellip;</td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
        {{-- </div> --}}

        {{-- <div class = "container-fluid mt-5"> --}}
        <div class="row gap-3">
            <div class="col-12 col-md-4 col-lg-4 pt-4 bg-white chart-wrapper">
                <h6 class = "text-center">TOTAL UNIQUE VISITORS</h6>
                <div class="chart-container">
                    <canvas id="candidateChart" height="320"></canvas>
                    <div class="chart-center-label">Candidates</div>
                </div>
                <div class="visitor-stats">
                    <div>
                        <div class="count">1,507</div>
                        <div class="label">Visitors Male</div>
                    </div>

                    <div>
                        <div class="count">854</div>
                        <div class="label">Visitors Female</div>
                    </div>
                </div>
            </div>


            <div class = "col-12 col-md-4 col-lg-4 bg-white chart-wrapper">
                <h6 class = "mt-4 text-center ">NUMBER OF TRANSACTIONS</h6>
                <div class="chart-containers">
                    {{-- <canvas id="transactionChart"></canvas> --}}
                    <canvas id="transactionChart" height="320"></canvas>
                </div>



                <!-- Transaction Counts -->
                <div class="transaction-stats ms-5">
                    <div class = "ms-3">
                        <div class="count">2,854</div>
                        <div class="label">Payment Done</div>
                    </div>

                    <div>
                        <div class="count">22</div>
                        <div class="label">Payment Due</div>
                    </div>
                </div>

            </div>

            <div class = "col col-md-4 col-lg-4 bg-white chart-wrapper">
                <h6 class = "mt-4">NEW USERS</h6>
                <p>Your awesome text goes here</p><br>


                <img src = "images/avatar.png" width = "15px" height = "18px">

                <span class = "ms-2"> <strong>Winner Effiong Duff</strong>

                    <span class="badge ms-5 p-2 bg-success text-success rounded-circle"
                        style="width: 20px; height: 20px;">o</span>


                </span>

                <span style = "margin-left: 30px;">Nigeria
                    <span style = "margin-left: 130px;">Now</span>
                </span>


                <br><br>

                <img src = "images/avatar.png" width = "15px" height = "18px">

                <span class = "ms-2"> <strong>Taofeeq Bola Asiwaju</strong>

                    <span class="badge ms-5 p-2 bg-danger text-danger rounded-circle"
                        style="width: 20px; height: 20px;">o</span>


                </span>

                <span style = "margin-left: 30px;">Nigeria
                    <span style = "margin-left: 120px;" class = "chat">10min ago</span>
                </span>



            </div>
        </div>
        {{-- </div> <!-- End of container-fluid --> --}}


        {{-- <div class = "row ms-2 border border-1 border-black p-2 mb-2">
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
        {{-- </span>
        </div>
        </a>
        </div> --}}

        {{-- <div class = "profit w-100 border-start border-black border-1 m-0">
                    <a class = "col-12 col-md-6  mt-2 mb-3  text-decoration-none text-dark" href = "{{ url('order') }}">
                        <div class="profit">
                            <span class = "ms-2 ">Orders</span> <br>
                            <span class  = "ms-2">{{ $totalOrders }}</span>
                            <span class = "float-end rounded-5 mb-2 bg-opacity-25 opacity-10 pe-3"
                                style = "font-size: 30px; font-weight:bold; margin-top: -15px;">
                                <i class="fa-solid fa-receipt"></i>

                            </span>

                        </div>
                    </a>
                </div> --}}

        {{-- </div> --}}
        {{-- </div> --}}
        {{-- <div class="row ms-2 border border-black">
            <div class ="col-12 profit p-2">
                <a href = "{{ url('detailedstat') }}" class = "text-decoration-none detailedstat">View
                    detailed stats</a>
            </div>
        </div>

        <div class ="row border border-1 border-black mt-2 ms-2 mb-3 p-2">
                <span class = "float-start mt-2">Recent user
                    <i class="fa fa-ellipsis-v float-end mt-1 mb-1" aria-hidden="true"></i>
                </span>
        </div> --}}

        @php $sn= 0;  @endphp
        {{-- <div class="table-responsive w-100 small float-start mt-2 ms-2 mb-5 pb-5">
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
        {{-- <ul class="more-options">
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
        </div>  --}}




        <script>
            // <!-- Visitor Chart
            // -->
            const ctx = document.getElementById('candidateChart');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Male', 'Female'],
                    datasets: [{
                        data: [1507, 854],
                        backgroundColor: ['#4dc9c0', '#e5e5e5'],
                        borderWidth: 0,
                        cutout: '70%',
                        // large center
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                            // hide
                            // legend
                            // completely
                        },
                        tooltip: {
                            enabled: true
                        }
                    }
                }
            });


            // document.addEventListener("DOMContentLoaded", function() {
            const ctxpie = document.getElementById('transactionChart').getContext('2d');

            const config = {
                type: 'pie',
                data: {
                    labels: ['Done', 'Due', 'Hold'],
                    datasets: [{
                        data: [300, 50, 100],
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)'
                        ],
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
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
