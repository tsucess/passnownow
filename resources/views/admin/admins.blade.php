@extends('layouts.dasboardtemp')
@section('admincontent')

    <style>
        .card-admin-summary {
            background: #1A69AF;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .controlbtn {
            background-color: #0056b3;
            color: #ffffff;
        }

        .card-admin-chart {
            display: flex;
            /* overflow: hidden; */
            /* width: 50%; */
            align-items: center;
            justify-content: space-between;
            border: 1px solid #6c757d;
            border-radius: 10px;
        }

        .chart-containers {
            position: relative;
            width: 75%;
            /* height: 400px; */
            margin: 0;

        }


        .chart-center-label {
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-weight: 100;
            font-size: 0.7rem;
            color: #6c757d;
        }

        .gender-breakdown {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-evenly;
            height: 100%;
            width: 25%;
            text-align: center;
        }

        /*
                             .legend-label {
                              font-size: 0.9rem;
                              color: #6c757d;
                            } */
    </style>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center p-3 pb-2 mb-3 border-bottom px-md-4">
        <h1 class="h2">Administrators</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-md btn-outline-primary" data-bs-toggle="modal"
                    data-bs-target="#addModal">Add Administrator</button>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @elseif(\Session::has('error'))
        <div class="alert alert-danger">
            <p class="m-0">{{ \Session::get('error') }}</p>
        </div>
    @endif
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p class="m-0">{{ \Session::get('success') }}</p>
        </div>
    @endif

    {{-- <div class = "row mb-3 p-4 gap-4">
        <div class = "d-flex col-12 col-md-4 p-3 text-white h-50 w-30" style="background: #1A69AF; border-radius: 10px;">
            <div>
                <h4>2</h4>
                <p>Total Admin</p>
            </div>
            <div>
                <p>Active Admin</p>
                <h6>2</h6>
                <p>Deactived Admin</p>
                <h6>2</h6>
            </div>
        </div>

        <div class = "col-12 col-md-4 d-flex flex-row  align-items-start text-white bg-white shadow mobileanalytics"
            style="border-radius: 10px;"
            >
            <div class="chart-containers">
                <canvas id="adminChart" height="220px"></canvas>
                <div class="chart-center-label">Administrators</div>
            </div>

            <!-- New div added here -->
            <div class="d-flex flex-column justify-content-between mt-4" style = "height:140px;">
                <div>
                    <h5 style = "color:#313A46;">1,507</h5>
                    <span class = "text-dark">Male</span>
                </div>
                <div>
                    <h5 style = "color:#313A46;">854</h5>
                    <span class = "text-dark">Female</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4"></div>
    </div> --}}

    <div class="row p-4 gap-4 dashboard-cards-row">
        <!-- Admin Summary Card -->
        <div class="card-admin-summary col-12 col-md-5 col-xl-4  p-2 p-lg-3 text-white w-30">
            <div class="admin-count-summary">
                <h4 class="total-admin-count">2</h4>
                <p class="label-total-admin">Total Admin</p>
            </div>
            <div class="admin-status-details">
                <p class="label-active-admin">Active Admin</p>
                <h6 class="active-admin-count">2</h6> <br> <br>
                <p class="label-deactive-admin">Deactivated Admin</p>
                <h6 class="deactive-admin-count">2</h6>
            </div>
        </div>

        <!-- Admin Chart Card -->
        <div class="card-admin-chart col-12 col-md-6 col-lg-5 text-white  mobileanalytics p-0">
            <div class="chart-containers p-2">
                <canvas id="adminChart" class="chart-admin" height="100px"></canvas>
                <div class="chart-center-label">Administrators</div>
            </div>

            <!-- Gender Breakdown -->
            <div class="gender-breakdown p-2 p-lg-3">
                <div class="gender-male">
                    <h5 class="male-count" style="color:#313A46;">1,507</h5>
                    <span class="male-label text-dark">Male</span>
                </div>
                <div class="gender-female">
                    <h5 class="female-count" style="color:#313A46;">854</h5>
                    <span class="female-label text-dark">Female</span>
                </div>
            </div>
        </div>

        <!-- Placeholder card -->
        <div class="card-placeholder col-12 col-md-4"></div>
    </div>


    @php
        $sn = 0;
    @endphp
    <div class="table-responsive mb-5 p-4 pb-5 px-md-4">
        <table id="admin-table" class="table custom-table mb-5 pb-5">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fetchAdmins as $Admin)
                    <tr>
                        <th>{{ ++$sn }}</th>
                        <td> {{ $Admin->first_name }} {{ $Admin->last_name }}</td>
                        <td>{{ $Admin->username }}</td>
                        <td>{{ $Admin->email }}</td>
                        <td>
                            @if ($Admin->role === 'sadmin')
                                {{ 'Super Admin' }}
                            @elseif ($Admin->role === 'admin')
                                {{ 'Admin' }}
                            @else
                                {{ 'User' }}
                            @endif
                        </td>
                        <td>{{ $Admin['created_at'] }}</td>
                        <td>
                            <a href="{{ route('admin.edit', ['data' => $Admin]) }}"
                                class="btn controlbtn sub p-1 px-3">view</a>
                            <a href="{{ route('admin.destroy', ['data' => $Admin->id]) }}"
                                class="btn btn-danger p-1 px-3">Delete</a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>





    <!-- Add User Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="form_add">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Add Admin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('admin.store') }}">
                    @csrf
                    <div class="modal-body">
                        <x-text-input type="hidden" class="form-control" name="unique_id"
                            value="{{ rand(time(), 10000000) }}" />
                        <x-text-input type="hidden" class="form-control" name="terms" value="on" />
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <x-input-label :value="__('First Name')" />
                                    <x-text-input type="text" class="form-control" name="fname" :value="old('fname')"
                                        aria-describedby="textBlock" placeholder="First Name" required />
                                    <x-input-error :messages="$errors->get('fname')" class="mt-2 text-danger" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <x-input-label :value="__('Last Name')" />
                                    <x-text-input type="text" class="form-control" name="lname" :value="old('lname')"
                                        aria-describedby="textBlock" placeholder="Last Name" required />
                                    <x-input-error :messages="$errors->get('lname')" class="mt-2 text-danger" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <x-input-label :value="__('User Name')" />
                                    <x-text-input type="text" class="form-control" name="username" :value="old('username')"
                                        aria-describedby="textBlock" placeholder="User Name" required />
                                    <x-input-error :messages="$errors->get('username')" class="mt-2 text-danger" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <x-input-label for="email" :value="__('Email Address')" />
                                    <x-text-input class="form-control" type="email" name="email" :value="old('email')"
                                        aria-describedby="emailBlock" placeholder="example@email.com" required />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <x-input-label class="form-label" :value="__('User Role')" />
                                    <select name="role" class="form-control py-2">
                                        <option value ="undefined">Select Role</option>
                                        <option value="sadmin">Super Admin</option>
                                        <option value="admin">Admin</option>
                                        {{-- <option value="user">User</option> --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-input-label :value="__('Password')" />
                            <x-text-input type="password" class="form-control" :value="old('password')" name="password"
                                aria-describedby="passwordBlock" placeholder="password" required autocomplete=false />
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                        </div>
                        <div class="mb-3">
                            <x-input-label :value="__('Confirm Password')" />
                            <x-text-input type="password" class="form-control" :value="old('password_confirmation ')"
                                name="password_confirmation" aria-describedby="passwordBlock"
                                placeholder="Repeat Password" autocomplete=false />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="{{ 'js/table/jquery-3.3.1.min.js' }}"></script>
    <script src="{{ 'js/table/jquery.dataTables.min.js' }}"></script>
    <script src="{{ 'js/table/dataTables.bootstrap.min.js' }}"></script>

    <script>
        let table = new DataTable('#admin-table');
    </script>
    <script>
        const ctx = document.getElementById('adminChart');

        const config = {
            type: 'doughnut',
            data: {
                labels: ['Male', 'Female'],
                datasets: [{
                    data: [1507, 854],
                    backgroundColor: ['#55C2A5', '#eeeeee'],
                    borderWidth: 0,
                    cutout: '90%'
                }]
            }
        }

        new Chart(ctx, config);
    </script>


@endsection
