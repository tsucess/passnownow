@extends('layouts.dasboardtemp')

@section('admincontent')
    <style>
        /* .select2-container--default .select2-selection--single {
                            height: auto !important;
                            padding: 0.7rem 0.5rem  !important;
                            border: 1px solid #ced4da;
                            border-radius: 0.375rem;
                        }

                        .select2-selection__rendered {
                            line-height: normal !important;
                        } */
    </style>
    <section class="container-fluid profile__container">
        <div class="row">
            <div class="col-12 col-lg-7 profile_data">
                <div class="top">
                    <h5>Account Information</h5>
                </div>

                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>
                <form method="post" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')

                    {{-- <div class="row shadow p-2 ">
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
                            <x-text-input id="username" name="username" type="text" class="form-control" :value="old('username', $user->username)" required autofocus autocomplete="username" disabled />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="email" :value="__('Email address')" class="form-label" />
                            <x-text-input id="email" name="email" type="text" class="form-control" :value="old('email', $user->email)" required autofocus autocomplete="email" disabled />
                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                <div>
                                    <p class="text-sm mt-2 text-danger">
                                        {{ __('Your email address is unverified.') }}

                                        <button form="send-verification" class="underline text-sm hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            {{ __('Click here to re-send the verification email.') }}
                                        </button>
                                    </p>

                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-2 font-medium text-sm text-success">
                                            {{ __('A new verification link has been sent to your email address.') }}
                                        </p>
                                    @endif
                                </div>
                            @endif

                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Save changes" />
                            @if (session('status') === 'profile-updated')
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="bg-success-subtle w-100 text-center text-success mt-2 btn" >{{ __('Profile Updated Successfully.') }}</p>
                        @endif
                        </div>
                    </div> --}}

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
                                :value="old('username', $user->username)" required autofocus autocomplete="username" disabled />
                        </div>

                        <div class="mb-3">
                            <x-input-label for="email" :value="__('Email address')" class="form-label" />
                            <x-text-input id="email" name="email" type="text" class="form-control"
                                :value="old('email', $user->email)" required autofocus autocomplete="email" disabled />

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                <div>
                                    <p class="text-sm mt-2 text-danger">
                                        {{ __('Your email address is unverified.') }}
                                        <button form="send-verification"
                                            class="underline text-sm hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            {{ __('Click here to re-send the verification email.') }}
                                        </button>
                                    </p>
                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-2 font-medium text-sm text-success">
                                            {{ __('A new verification link has been sent to your email address.') }}
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <!-- Countries Field -->
                        {{-- <div class="mb-3">
                            <x-input-label for="nationality" :value="__('Nationality')" class="form-label" />
                            <select id="nationality" name="nationality" class="form-control">
                                <option value="">Select Nationality</option>
                                @foreach (config('countries') as $country)
                                    <option value="{{ $country }}"
                                        {{ old('nationality', $user->nationality ?? '') == $country ? 'selected' : '' }}>
                                        {{ $country }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('nationality')" />
                        </div> --}}


                        <div class="mb-3">
                            <x-input-label for="nationality" :value="__('Nationality')" class="form-label" />
                            {{-- <select id="nationality" name="nationality" class="form-control select2">
                                <option value="">Select Nationality</option>
                                @foreach (config('countries') as $country)
                                    <option value="{{ $country }}">{{ $country }}</option>
                                @endforeach
                            </select> --}}
                            <select id="nationality" name="nationality" class="form-control select2">
                                <option value="">Select Nationality</option>
                                @foreach (config('countries') as $country)
                                    <option value="{{ $country }}"
                                        {{ old('nationality', $user->nationality ?? '') == $country ? 'selected' : '' }}>
                                        {{ $country }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('nationality')" />
                        </div>



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
                                    Other</option>
                            </select>
                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('gender')" />
                        </div>

                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Save changes" />
                            @if (session('status') === 'profile-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                    class="bg-success-subtle w-100 text-center text-success mt-2 btn">
                                    {{ __('Profile Updated Successfully.') }}
                                </p>
                            @endif
                        </div>
                    </div>

                </form>
                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')
                    <div class="row shadow py-2">
                        <div class="mb-3">
                            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="form-label" />
                            <x-text-input id="update_password_current_password" name="current_password" type="password"
                                class="form-control" autocomplete="current-password" />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="update_password_password" :value="__('New Password')" class="form-label" />
                            <x-text-input id="update_password_password" name="password" type="password" class="form-control"
                                autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')"
                                class="form-label" />
                            <x-text-input id="update_password_password_confirmation" name="password_confirmation"
                                type="password" class="form-control" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Save changes" />
                            @if (session('status') === 'password-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-success">{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </div>
                </form>
                <div class="row shadow py-2">
                    <div class="mb-3">
                        <h2>Delete Account</h2>
                        <p>
                            Once your account is deleted, all of its resources and data will be permanently deleted.
                            Before deleting your account, please download any data or information that
                            you wish to retain.
                        </p>
                    </div>
                    <div class="mb-3">
                        {{-- <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                            type="submit" >{{ __('Delete Account') }} </x-danger-button> --}}
                        <button data-bs-toggle="modal" data-bs-target="#deleteAccountModal" type="button"
                            class="btn btn-danger">{{ __('Delete Account') }} </button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5 profile">
                <div class="image_wrapper">
                    <img src="{{ asset('images/avatar.png') }}" class="profile_image" alt="">
                </div>
                <h5>{{ $user->first_name . ' ' . $user->last_name }}</h5>
                <button class="btn">Change profile photo</button>
                <br>
                <a href="#">Delete profile photo</a href="#">
            </div>


        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="deleteAccountModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Are you sure you want to delete your account?') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>
                        <div class="mt-6">
                            <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                            <x-text-input id="password" name="password" type="password" class="form-control"
                                placeholder="{{ __('Password') }}" />
                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <x-secondary-button class="btn btn-secondary text-dark" data-bs-dismiss="modal">
                            {{ __('Cancel') }}</x-secondary-button>
                        <x-danger-button class="ms-3"> {{ __('Delete Account') }} </x-danger-button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Select2 JS -->
    <script src="{{ asset('js/select2.min.js') }}"></script>

    <!-- jQuery (required for Select2) -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            $('#nationality').select2({
                placeholder: "Select or type a country",
                allowClear: true,
                width: '100%'
            });
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            $('#nationality').select2({
                placeholder: "Select or type a country",
                allowClear: true
            });
        });
    </script>


@endsection
