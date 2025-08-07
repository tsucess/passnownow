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
            align-items: center;
            justify-content: space-between;
            background: #ffffff;
            border-radius: 10px;
        }

        /* .card-admin-chart {
            display: flex;
            overflow: hidden;
            width: 50%;
            align-items: center;
            justify-content: space-between;
            border: 1px solid #6c757d;
            border-radius: 10px;
        } */

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
            text-align: center
        }
    </style>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center p-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Candidate</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-md btn-outline-primary" data-bs-toggle="modal"
                    data-bs-target="#addModal">Add Candidate</button>
            </div>
        </div>
    </div>

    <div class="row p-4 gap-4 dashboard-cards-row">
        <!-- Admin Summary Card -->
        <div class="card-admin-summary col-12 col-md-5 col-xl-4  p-2 p-lg-3 text-white w-30">
            <div class="admin-count-summary">
                <h4 class="total-admin-count">{{ $countUsers }}</h4>
                <p class="label-total-admin">Total Candidate</p>
            </div>
            <div class="admin-status-details">
                <p class="label-active-admin">Active Candidate</p>
                <h6 class="active-admin-count">{{ $usersActive }}</h6> <br> <br>
                <p class="label-deactive-admin">Deactivated Candidate</p>
                <h6 class="deactive-admin-count">{{ $usersNotActive }}</h6>
            </div>
        </div>

        <!-- Admin Chart Card -->
        <div class="card-admin-chart col-12 col-md-6 col-lg-5 text-white  mobileanalytics p-0">
            <div class="chart-containers p-2">
                <canvas id="adminChart" class="chart-admin" height="220px"></canvas>
                <div class="chart-center-label">Candidate</div>
            </div>

            <!-- Gender Breakdown -->
            <div class="gender-breakdown p-2 p-lg-3">
                <div class="gender-male">
                    <h5 class="male-count" style="color:#313A46;">{{ $noOfMaleUsers }}</h5>
                    <span class="male-label text-dark">Male</span>
                </div>
                <div class="gender-female">
                    <h5 class="female-count" style="color:#313A46;">{{ $noOfFemaleUsers }}</h5>
                    <span class="female-label text-dark">Female</span>
                </div>
            </div>
        </div>

        <!-- Placeholder card -->
        <div class="card-placeholder col-12 col-md-4"></div>
    </div>


    @php $sn= 0;  @endphp
    <div class="table-responsive mb-5 p-4 pb-5">
        <table id="admin-table" class="table custom-table mb-5 pb-5">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fetchUsers as $User)
                    <tr>
                        <th>{{ ++$sn }}</th>
                        <td> {{ $User->first_name }} {{ $User->last_name }}</td>
                        <td>{{ $User->username }}</td>
                        <td>{{ $User->email }}</td>
                        <td>
                            {{ ucfirst($User->gender) }}
                        </td>
                        <td>{{ $User['created_at'] }}</td>
                        <td>
                            <a href="{{ route('admin.edit', ['data' => $User]) }}"
                                class="btn btn-primary controlbtn sub p-1 px-3">view</a>
                            <a href="{{ route('admin.destroy', ['data' => $User->id]) }}"
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

                                    <x-text-input class="form-control" type="text" name="role" :value="old('role')"
                                        value="user" required readonly />
                                    {{-- <x-input-label class="form-label" :value="__('User Role')" /> --}}
                                    {{-- <select name="role" class="form-control py-2">
                                     <option value ="undefined">Select Role</option>
                                     <option value="sadmin">Super Admin</option>
                                     <option value="admin">Admin</option>
                                     <option value="user">User</option>
                                 </select> --}}
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-input-label :value="__('Password')" />
                            <x-text-input type="password" class="form-control" :value="old('password')" name="password"
                                aria-describedby="passwordBlock" placeholder="password" required autocomplete="off" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                        </div>
                        <div class="mb-3">
                            <x-input-label :value="__('Confirm Password')" />
                            <x-text-input type="password" class="form-control" :value="old('password_confirmation ')"
                                name="password_confirmation" aria-describedby="passwordBlock"
                                placeholder="Repeat Password" autocomplete="off" />
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
        const maleCount = @json($noOfMaleUsers);
        const femaleCount = @json($noOfFemaleUsers);
        const ctx = document.getElementById('adminChart');

        const config = {
            type: 'doughnut',
            data: {
                labels: ['Male', 'Female'],
                datasets: [{
                    data: [maleCount, femaleCount],
                    backgroundColor: ['#55C2A5', '#eeeeee'],
                    borderWidth: 0,
                    cutout: '90%'
                }]
            }
        }

        new Chart(ctx, config);

        // {
        //     labels: [
        //         'Red',
        //         'Blue',
        //         'Yellow'
        //     ],
        //     datasets: [{
        //         label: 'My First Dataset',
        //         data: [300, 50, 100],
        //         backgroundColor: [
        //             'rgb(255, 99, 132)',
        //             'rgb(54, 162, 235)',
        //             'rgb(255, 205, 86)'
        //         ],
        //         hoverOffset: 4,
        //         cutout: '80%'
        //     }]
        // };
    </script>
@endsection
