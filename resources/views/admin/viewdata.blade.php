@extends('layouts.dasboardtemp')

@section('admincontent')
    <section class="container-fluid profile__container">
        <div class="row">
            <div class="col-12 col-lg-7 profile_data">
                <div class="top">
                    {{-- @if ($user->role !== 'user') --}}
                        <a href="{{ URL::previous() }}" class="btn btn-secondary p-2 px-5 mb-5 shadow">Back</a>
                    {{-- @else
                        <a href="{{ URL::previous() }}" class="btn btn-secondary p-2 px-5 mb-5 shadow">Back</a>
                    @endif --}}
                    <h5>Account Information</h5>
                </div>
                <form method="POST" action="{{ route('admin.update', $user->id) }}">
                    @csrf
                    @method('patch')
                    <div class="row shadow p-2 ">
                        <div class="mb-3">
                            <x-input-label for="firstname" :value="__('First Name')" class="form-label" />
                            <x-text-input id="firstname" name="first_name" type="text" class="form-control"
                                :value="old('first_name', $user->first_name)" required autofocus autocomplete="fname" />
                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('first_name')" />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="lastname" :value="__('Last Name')" class="form-label" />
                            <x-text-input id="lastname" name="last_name" type="text" class="form-control"
                                :value="old('last_name', $user->last_name)" required autofocus autocomplete="lname" />
                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('last_name')" />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="username" :value="__('User Name')" class="form-label" />
                            <x-text-input id="username" name="username" type="text" class="form-control"
                                :value="old('username', $user->username)" disabled />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="email" :value="__('Email address')" class="form-label" />
                            <x-text-input id="email" name="email" type="text" class="form-control"
                                :value="old('email', $user->email)" disabled />
                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                <div>
                                    <p class="text-sm mt-2 text-danger">
                                        {{ __('Your email address is unverified.') }}

                                        <button form="send-verification"
                                            class="underline text-sm hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            {{ __('Click here to re-send the verification email.') }}
                                        </button>
                                    </p>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
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
                        @if ($user->role !== 'user')
                        <div class="mb-3">
                            <x-input-label class="form-label" :value="__('User Role')" />
                            <select name="role" class="form-control py-2" :value="old('role', $user->role)">
                                <option value ="{{ $user->role }}">Select Role</option>
                                <option value="sadmin" {{ old('role', $user->role) == 'sadmin' ? 'selected' : '' }}>
                                    Super Admin</option>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                                    Admin</option>
                                {{-- <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>
                                    User</option> --}}
                            </select>
                        </div>
                        @endif

                        <!-- Gender Field -->
                        <div class="mb-3">
                            <x-input-label for="gender" :value="__('Gender (Optional)')" class="form-label" />
                            <select id="gender" name="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male
                                </option>
                                <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>
                                    Female</option>
                                <option value="other" {{ old('gender', $user->gender) == 'other' ? 'selected' : '' }}>
                                    Other
                                </option>
                            </select>
                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('gender')" />
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Save changes" />
                            @if (session('status') === 'profile-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                    class="bg-success-subtle w-100 text-center text-success mt-2 btn">
                                    {{ __('Profile Updated Successfully.') }}</p>
                            @endif
                        </div>
                    </div>
                </form>
                <form method="post" action="{{ route('userpassword.update', $user->id) }}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')
                    <div class="row shadow py-2">
                        <div class="mb-3">
                            <x-input-label for="update_password_password" :value="__('New Password')" class="form-label" />
                            <x-text-input id="update_password_password" name="password" type="password" class="form-control"
                                autocomplete="off" />
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')"
                                class="form-label" />
                            <x-text-input id="update_password_password_confirmation" name="password_confirmation"
                                type="password" class="form-control" autocomplete="off" />
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Save changes" />
                            @if (session('status') === 'success')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-success">{{ __('Password successfully updated.') }}</p>
                            @endif
                            @if (session('status') === 'error')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-danger">{{ __('Something went wrong.') }}</p>
                            @endif
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-12 col-lg-5 profile">
                <div class="image_wrapper">
                    <img src="{{ asset('images/avatar.png') }}" class="profile_image" alt="">
                </div>
                <h5>Winner Effiong</h5>
                <button class="btn">Change profile photo</button>
                <br>
                <a href="#">Delete profile photo</a href="#">
            </div>
        </div>
    </section>

    @if ($user->role === 'user')
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
                                <td>
                                    <h6>N10,000.00</h6>
                                </td>
                                <td><span class="status"><i class="fa-solid fa-circle"></i> <span>Current</span></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Yearly Plan</h6>
                                    <p>#00001 | 12-08-24</p>
                                </td>
                                <td>
                                    <h6>N10,000.00</h6>
                                </td>
                                <td><span class="status exp"><i class="fa-solid fa-circle"></i>
                                        <span>Expired</span></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Yearly Plan</h6>
                                    <p>#00001 | 12-08-24</p>
                                </td>
                                <td>
                                    <h6>N10,000.00</h6>
                                </td>
                                <td><span class="status exp"><i class="fa-solid fa-circle"></i>
                                        <span>Expired</span></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Yearly Plan</h6>
                                    <p>#00001 | 12-08-24</p>
                                </td>
                                <td>
                                    <h6>N10,000.00</h6>
                                </td>
                                <td><span class="status"><i class="fa-solid fa-circle"></i> <span>Current</span></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Yearly Plan</h6>
                                    <p>#00001 | 12-08-24</p>
                                </td>
                                <td>
                                    <h6>N10,000.00</h6>
                                </td>
                                <td><span class="status exp"><i class="fa-solid fa-circle"></i>
                                        <span>Expired</span></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Yearly Plan</h6>
                                    <p>#00001 | 12-08-24</p>
                                </td>
                                <td>
                                    <h6>N10,000.00</h6>
                                </td>
                                <td><span class="status exp"><i class="fa-solid fa-circle"></i>
                                        <span>Expired</span></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    @endif
@endsection
