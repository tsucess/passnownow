@extends('layouts.dasboardtemp')

@section('admincontent')
    <section class="container-fluid profile__container">
        <div class="row">
            <div class="col-12 col-lg-7 profile_data">
                <div class="top">
                    @if ($user->role !== 'user')
                    <a href="/admins" class="btn btn-secondary p-2 px-5 mb-5 shadow">Back</a>
                    @else
                    <a href="/users" class="btn btn-secondary p-2 px-5 mb-5 shadow">Back</a>
                    @endif
                    <h5>Account Information</h5>
                </div>
                <form method="POST" action="{{ route('admin.update', $user->id) }}">
                    @csrf
                    @method('patch')

                    <div class="row shadow p-2 ">
                        <div class="mb-3">
                            <x-input-label for="firstname" :value="__('First Name')" class="form-label" />
                            <x-text-input id="firstname" name="first_name" type="text" class="form-control" :value="old('first_name', $user->first_name)" required autofocus autocomplete="fname" />
                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('first_name')" />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="lastname" :value="__('Last Name')" class="form-label" />
                            <x-text-input id="lastname" name="last_name" type="text" class="form-control" :value="old('last_name', $user->last_name)" required autofocus autocomplete="lname" />
                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('last_name')" />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="username" :value="__('User Name')" class="form-label" />
                            <x-text-input id="username" name="username" type="text" class="form-control" :value="old('username', $user->username)" disabled />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="email" :value="__('Email address')" class="form-label" />
                            <x-text-input id="email" name="email" type="text" class="form-control" :value="old('email', $user->email)" disabled  />
                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div>
                                    <p class="text-sm mt-2 text-danger">
                                        {{ __('Your email address is unverified.') }}

                                        <button form="send-verification" class="underline text-sm hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            {{ __('Click here to re-send the verification email.') }}
                                        </button>
                                    </p>
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-2 font-medium text-sm text-success">
                                            {{ __('A new verification link has been sent to your email address.') }}
                                        </p>
                                    @endif
                                </div>
                            @endif

                        </div>
                        @if ($user->role !== 'user' )
                            <div class="mb-3">
                                <x-input-label class="form-label" :value="__('User Role')" />
                                <select name="role" class="form-control py-2" :value="old('role', $user->role)">
                                    <option value ="{{$user->role}}">Select Role</option>
                                    <option value="sadmin">Super Admin</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            @else
                            <div class="mb-3">
                                <input type="hidden" value ="{{$user->role}}" name="role" class="form-control py-2" :value="old('role', $user->role)">
                            </div>
                        @endif
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Save changes" />
                            @if (session('status') === 'profile-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="bg-success-subtle w-100 text-center text-success mt-2 btn" >{{ __('Profile Updated Successfully.') }}</p>
                            @endif
                        </div>
                    </div>
                </form>
                <form method="post" action="{{ route('userpassword.update' , $user->id) }}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')
                    <div class="row shadow py-2">
                        <div class="mb-3">
                            <x-input-label for="update_password_password" :value="__('New Password')" class="form-label" />
                            <x-text-input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="form-label" />
                            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Save changes" />
                            @if (session('status') === 'success')
                                    <p  x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-success" >{{ __('Password successfully updated.') }}</p>
                            @endif
                            @if (session('status') === 'error')
                                    <p  x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-danger" >{{ __('Something went wrong.') }}</p>
                            @endif
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-12 col-lg-5 profile">
                <div class="image_wrapper">
                    {{-- <img src="{{asset('images/avatar.png')}}" class="profile_image" alt=""> --}}
                    <img src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('images/avatar.png') }}" class="profile_image" alt="Profile Photo">
                </div>
                {{-- <h5>Winner Effiong</h5> --}}
                {{-- <h6>{{ ucfirst(Auth::user()->first_name) }}  {{ ucfirst(Auth::user()->last_name) }} </h6> --}}
                <script>
                   var x =  document.getElementById('firstname').value;
                   var y =  document.getElementById('lastname').value;
                   var z = x + " " +  y
                   document.write(z +  "<br>");
                </script>

<form action="{{ route('profile.photo.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
                {{-- <button class="btn">Change profile photo</button> --}}
        <button type="submit" class="btn">Change Profile Photo</button>
        {{-- <input type="file" name="photo" style = "margin-left:70px;" accept="image/*" required> --}}
        <div class="form-group mb-3">
            <input type="file" name="photo" accept="image/*" required class="form-control">
          </div>

    </form>
                <br>

                <form action="{{ route('profile.photo.delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link text-dark text-decoration-none">Delete Profile Photo</button>
                </form>
                {{-- <a href="#">Delete profile photo</a href="#"> --}}

            </div>
        </div>
    </section>

    @if ($user->role === 'user' )
    <section class="container-fluid history__container">
        <div class="row">
            <div class="col-12 mt-5">
                <h2>Activities</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-3 mb-md-0 shadow subscription_history">
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
        </div>
    </section>
    @endif
@endsection
