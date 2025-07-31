
@extends('layouts.dasboardtemp')

@section('admincontent')

<style>
    .controlbtn{
        background-color: #0056b3;
        color: #ffffff;
    }

 /* .chart-containers {
      position: relative;
      width: 100%;
      max-width: 600px;
      margin: 0;
      padding: 1rem;
    } */




    .chart-center-label {
      position: absolute;
      top: 70%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-weight: 100;
      font-size: 0.7rem;
      color: #6c757d;
    }

/*
     .legend-label {
      font-size: 0.9rem;
      color: #6c757d;
    } */
</style>
    <div class="container-fluid d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3" style = "background-color:#f1f1f1;">
        <h1 class="h2">Administrators</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-md text-white" data-bs-toggle="modal"
                    data-bs-target="#addModal" style = "background: #1A69AF;">Add Administrator</button>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>

    @elseif(\Session::has('error'))
    <div class="alert alert-danger">
        <p class="m-0">{{\Session::get('error')}}</p>
    </div>
    @endif

    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p class="m-0">{{\Session::get('success')}}</p>
        </div>
    @endif
        @php
            $sn= 0;
        @endphp


    <div class = "container-fluid">
        <div class = "row mb-3">

            <div class = "col-12 col-md-4 col-lg-4 p-3 text-white h-50 w-30" style="background: #1A69AF; border-radius: 10px;">
                <div class = "float-start">
                    <h4 style="font-family: montserrat;">2</h4>
                    <p>Total Admin</p>
                </div>

                <div class = "float-end">
                    <p>Active Admin</p>
                    <h6>2</h6><br>

                    <p>Deactived Admin</p>
                    <h6>2</h6><br>
                </div>

            </div>


        <div class = "col-12 col-md-6 col-lg-6 d-flex flex-row  align-items-start text-white bg-white mobileanalytics" style = "height: 200px;">


        <div class="chart-containers">

          <canvas id="adminChart"></canvas>
          <div class="chart-center-label">Administrators</div>
        </div>


    <!-- New div added here -->
    <div class="d-flex flex-column justify-content-between mt-4" style = "height:140px;">

            <div>
        <h5 style = "color:#313A46;">1,507</h5>
            <span class = "text-dark" style = "margin-left:5px;">Male</span>

    </div>

            <div>
        <h5 style = "color:#313A46; margin-left:2px;">854</h5>
            <span class = "text-dark">Female</span>

    </div>
</div>


            </div>



        </div>
    </div>
    


    <div class="container-fluid table-responsive mb-5 p-3 bg-white">
        <h6>ADMINISTRATORS PROFILE</h6>
        <p>Your awesome text goes here</p>

        <table id="admin-table" class="table custom-table mb-5 pb-5">

            <thead class="table-secondary">
                <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Gender</th>
                    <th scope="col">No of Uploads</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($fetchAdmins as $Admin)
                    <tr>
                        {{-- <th>{{  ++$sn }}</th> --}}
                        <th></th>
                        <td> {{ $Admin->first_name }} {{ $Admin->last_name }}</td>
                        <td>{{ $Admin->email }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        {{-- <button class="@if ($Admin->status === 0) btn btn-success @else btn btn-danger @endif">Button Text</button> --}}
                          {{-- <button class="@if ($Admin->status === 0) btn btn-success @else btn btn-danger @endif" style = "opacity: 0.7; width: 100%; border-radius: 40%;">
    <span style="display: inline-block;  width: 10px; height: 10px; border-radius: 80%; background-color: #fff; margin-right: 5px;"></span>
    @if ($Admin->status === 0) Active @else Deactivated @endif
</button> --}}
@if($Admin->status === 0)

<span class="status p-2 mt-1 mb-1 rounded-3" style = "background: #34c759;"><i class="fa-solid fa-circle text-white rounded-2"></i>
                                                    <span>Activated</span></span>
@else
<span class="status exp p-2 mt-1 mb-1 rounded-3" style = "background: #fd645b;"><i class="fa-solid fa-circle text-white rounded-2"></i>
                                                    <span>Deactivated</span></span>
@endif
                    </td>
                        <td>&hellip;</td>

                        {{-- <td>{{ $Admin->username }}</td> --}}
                        {{-- <td>{{ $Admin->phone number }}</td>
                        <td>{{ $Admin->gender }}</td> --}}

                        {{-- <td>
                            @if ($Admin->role === 'sadmin')
                            {{ 'Super Admin'}}
                            @elseif ($Admin->role === 'admin')
                            {{'Admin'}}
                            @else
                            {{ 'User'}}
                            @endif
                          </td>
                        <td>{{ $Admin['created_at'] }}</td>
                        <td>
                            <a href="{{ route('admin.edit', ['data' => $Admin])}}" class="btn controlbtn sub p-1 px-3">view</a>
                            <a href="{{ route('admin.destroy', ['data' => $Admin->id])}}" class="btn btn-danger p-1 px-3">Delete</a>
                        </td> --}}

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    {{-- <section>
    <iframe src="https://app.Lumi.education/api/v1/run/CSLOMd/embed" width="1088" height="720" frameborder="0" allowfullscreen="allowfullscreen" allow="geolocation *; microphone *; camera *; midi *; encrypted-media *"></iframe>
    <script src="https://app.Lumi.education/api/v1/h5p/core/js/h5p-resizer.js" charset="UTF-8"></script>
</section> --}}




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
                        <x-text-input type="hidden"  class="form-control" name="unique_id" value="{{ rand(time(), 10000000);}}" />
                        <x-text-input type="hidden"  class="form-control" name="terms" value="on" />
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <x-input-label :value="__('First Name')" />
                                    <x-text-input type="text" class="form-control" name="fname" :value="old('fname')" aria-describedby="textBlock" placeholder="First Name" required />
                                    <x-input-error :messages="$errors->get('fname')" class="mt-2 text-danger" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <x-input-label :value="__('Last Name')" />
                                    <x-text-input type="text" class="form-control" name="lname" :value="old('lname')" aria-describedby="textBlock" placeholder="Last Name" required />
                                    <x-input-error :messages="$errors->get('lname')" class="mt-2 text-danger" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                <x-input-label :value="__('User Name')" />
                                <x-text-input type="text"  class="form-control" name="username" :value="old('username')" aria-describedby="textBlock" placeholder="User Name" required />
                                <x-input-error :messages="$errors->get('username')" class="mt-2 text-danger" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <x-input-label for="email" :value="__('Email Address')" />
                                <x-text-input  class="form-control" type="email" name="email" :value="old('email')" aria-describedby="emailBlock" placeholder="example@email.com" required />
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
                                <x-text-input type="password"  class="form-control" :value="old('password')" name="password" aria-describedby="passwordBlock" placeholder="password"  required/>
                                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                        </div>
                        <div class="mb-3">
                            <x-input-label :value="__('Confirm Password')" />
                            <x-text-input type="password" class="form-control" :value="old('password_confirmation ')" name="password_confirmation" aria-describedby="passwordBlock" placeholder="Repeat Password" />
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


<script>
    const ctx = document.getElementById('adminChart').getContext('2d');
    const adminChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Male', 'Female'],
        datasets: [{
          data: [1507, 854],
          backgroundColor: ['#55C2A5', '#eeeeee'],
          borderWidth: 0,
          cutout: '75%'
        }]
      },
      options: {
        responsive: true,
        rotation: -90 * (Math.PI / 180), // Start from left
        plugins: {
          legend: {
            display: false
          },
          tooltip: {
            enabled: true
          }
        }
      }
    });
  </script>

    <script src="{{ 'js/table/jquery-3.3.1.min.js' }}"></script>
    <script src="{{ 'js/table/jquery.dataTables.min.js' }}"></script>
    <script src="{{ 'js/table/dataTables.bootstrap.min.js' }}"></script>



    <script>
        let table = new DataTable('#admin-table');
    </script>
@endsection
