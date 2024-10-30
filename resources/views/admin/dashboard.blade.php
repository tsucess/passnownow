@extends('layouts.dasboardtemp')

@section('admincontent')
    <section class="container-fluid greeting__containter mt-3">
        <div class="row greet__user">
            <div class="col-12 col-md-6 greetings ">
                <h2>Hello {{ ucfirst(Auth::user()->username) }} !</h2>
                <p>Let's learn something today</p>
                <br>
                <p class="greeting-text">Goodluck with your studies</p>
            </div>
            <div class="col-12 col-md-6  p-4 pb-0 greeting-img">
                <img src="{{ asset('assets/images/admin/greeting-img.png') }}" alt="" class="">
            </div>
        </div>
        @if (Auth::user()->role === 'user')
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
            {{-- subjects --}}
            @foreach ($subjects as $subject)
                <div class="col-12 col-md-6 col-lg-4 mb-2">
                    <div class="card courses">
                        <div class="image_wrapper">
                            <img src="{{ asset('storage/'.$subject->avatar) }}" class="course-img" alt="Avatar">
                        </div>
                        <div class="card-body">
                            <div class="courses-tag">Passnownow</div>
                            <h5 class="card-title">{{$subject->title}}</h5>
                            <button type="button" class="buton">View Details</button>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- <div class="col-12 col-md-6 col-lg-4 mb-2">
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
            </div> --}}
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
                            <td>
                                <h6>N10,000.00</h6>
                            </td>
                            <td><span class="status"><i class="fa-solid fa-circle"></i> <span>Current</span></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h6>Yearly Plan</h6>
                                <p>#00001 | 12-08-24</p>
                            </td>
                            <td>
                                <h6>N10,000.00</h6>
                            </td>
                            <td><span class="status exp"><i class="fa-solid fa-circle"></i> <span>Expired</span></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h6>Yearly Plan</h6>
                                <p>#00001 | 12-08-24</p>
                            </td>
                            <td>
                                <h6>N10,000.00</h6>
                            </td>
                            <td><span class="status exp"><i class="fa-solid fa-circle"></i> <span>Expired</span></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h6>Yearly Plan</h6>
                                <p>#00001 | 12-08-24</p>
                            </td>
                            <td>
                                <h6>N10,000.00</h6>
                            </td>
                            <td><span class="status"><i class="fa-solid fa-circle"></i> <span>Current</span></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h6>Yearly Plan</h6>
                                <p>#00001 | 12-08-24</p>
                            </td>
                            <td>
                                <h6>N10,000.00</h6>
                            </td>
                            <td><span class="status exp"><i class="fa-solid fa-circle"></i> <span>Expired</span></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h6>Yearly Plan</h6>
                                <p>#00001 | 12-08-24</p>
                            </td>
                            <td>
                                <h6>N10,000.00</h6>
                            </td>
                            <td><span class="status exp"><i class="fa-solid fa-circle"></i> <span>Expired</span></span></td>
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
@else
    <div class ="row mb-3">
        <div class = "col-sm ms-3 mt-3 mb-2 p-3 border border-primary overflow-hidden">
            <a class = "text-decoration-none text-dark" href = "{{ url('adtotalsales') }}">
                <span class = "ms-2 mt-3 profit">Total Profit</span><br>
                <span class  = "ms-2 mb-4 fw-bold fs-5  profit">$23, 523</span><span
                    class = "float-end rounded-5 mb-2 text-bg-success text-success p-2 bg-opacity-25 opacity-10 pe-3"
                    style = "font-size: 8px; profit"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10"
                        aria-hidden="true"></i>6.7%</span>
                <br><br>
                <span>Monthly goal</span>
                <span class = "float-end">70%</span>

                <div class="progress mb-3 mt-1" role="progressbar" aria-label="Basic example" aria-valuenow="75"
                    aria-valuemin="0" aria-valuemax="100" style = "height: 5px;">
                    <div class="progress-bar bg-primary" style="width: 75%"></div>
                </div>
            </a>
        </div>

        <div class = "col-sm ms-3 mt-3 mb-2 p-3 border border-primary overflow-hidden">
            <span class = "ms-2 mt-3">Total Administrators</span><br>
            <span class  = "ms-2 mb-4 fw-bold fs-5 ">{{ $totalAdmins }}</span><span
                class = "float-end rounded-5 mb-2 text-bg-success text-success p-2 bg-opacity-25 opacity-10 pe-3"
                style = "font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10"
                    aria-hidden="true"></i>6.7%</span>

            <br><br>

            {{-- <span>Monthly goal</span>
                <span class = "float-end">70%</span>
    
                <div class="progress mb-3 mt-1" role="progressbar" aria-label="Basic example" aria-valuenow="75"
                    aria-valuemin="0" aria-valuemax="100" style = "height: 5px;">
                    <div class="progress-bar bg-primary" style="width: 75%"></div>
                </div> --}}
        </div>
        <div class = "col-sm ms-3 mt-3 p-3 mb-2 border border-primary overflow-hidden">
            <span class = "ms-2 mt-3">Total Users</span><br>
            <span class  = "ms-2 mb-4 fw-bold fs-5 ">{{ $totalUsers }}</span><span
                class = "float-end rounded-5 mb-2 text-bg-success text-success p-2 bg-opacity-25 opacity-10 pe-3"
                style="font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10"
                    aria-hidden="true"></i>6.7%</span>

            <br><br>

            <span>Monthly goal</span>
            <span class = "float-end">70%</span>

            <div class="progress mb-3 mt-1" role="progressbar" aria-label="Basic example" aria-valuenow="75"
                aria-valuemin="0" aria-valuemax="100" style = "height: 5px;">
                <div class="progress-bar bg-primary" style="width: 75%"></div>
            </div>
        </div>
    </div>

    <div class = "row ms-2 border border-1 border-black p-2 mb-4">
        <div class = "border-bottom border-black border-1 ">
            <span>Stats Overview</span>
            <span class = "float-end  mb-2"><i class="fa fa-ellipsis-v mt-2" aria-hidden="true"></i></span>
        </div>
        <div class="d-flex justify-content-between border-bottom border-black border-1">
            <div class="m-0 pt-2" style = "width: 100px;">Today</div>
            <div class="p-2 text-black">Week to Date</div>
            <div class="p-2 text-black pe-5 float-start">Month to Date</div>
        </div>
        <div class="d-flex justify-content-between border-bottom border-black border-1">
            <a class = "col-12 col-md-6 me-3 mt-2 mb-3 text-decoration-none text-dark" href = "{{ url('totalsales') }}">
                <div class="">
                    <span class = "profit">Total Sales</span> <br>
                    <span class  = "fw-3 profit">$23, 523</span>
                    <span
                        class = "float-end rounded-5 mb-2 text-bg-success text-success p-2 bg-opacity-25 opacity-10 pe-3 profit"
                        style="font-size: 8px;">
                        <i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7%
                    </span>
                </div>
            </a>
            <a class = "col-12 col-md-6 me-3 mt-2 mb-3 col-12 col-md-6 border-start border-black border-1 text-decoration-none text-dark"
                href = "{{ url('order') }}">
                <div class="">
                    <span class = "ms-2 profit">Orders</span> <br>
                    <span class  = "fw-3 ms-2 profit">10</span><span
                        class = "float-end rounded-5 mb-2  me-3 text-bg-success text-success p-2  bg-opacity-25 opacity-10 pe-3 profit"
                        style="font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10"
                            aria-hidden="true"></i>6.7%</span>
                </div>
            </a>
        </div>
        <div class = "float-start  mt-2">
            <a href = "{{ url('detailedstat') }}" class = "float-start mb-1 text-decoration-none detailedstat">View
                detailed stats</a>
        </div>
    </div>

    <div class =" row border border-1 border-black mt-3 ms-2 mb-3 p-2">
        <span class = "float-start mt-2">Recent user
            <i class="fa fa-ellipsis-v float-end mt-1 mb-1" aria-hidden="true"></i></span>
    </div>

    @php $sn= 0;  @endphp
    <div class="table-responsive w-100 small float-start mt-2 ms-2 mb-5 pb-5">
        <table class="table custom-table mb-5 pb-5" id="userss">
            <thead class="bg-info">
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
