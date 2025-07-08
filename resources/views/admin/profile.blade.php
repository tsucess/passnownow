@extends('layouts.dasboardtemp')

@section('admincontent')
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
                            <x-text-input id="username" name="username" type="text" class="form-control" :value="old('username', $user->username)" required autofocus autocomplete="username" disabled />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="email" :value="__('Email address')" class="form-label" />
                            <x-text-input id="email" name="email" type="text" class="form-control" :value="old('email', $user->email)" required autofocus autocomplete="email" disabled />
                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
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
                    </div>
                </form>
                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')
                    <div class="row shadow py-2">
                        <div class="mb-3">
                            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="form-label" />
                            <x-text-input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>
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
                            @if (session('status') === 'password-updated')
                        <p  x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-success" >{{ __('Saved.') }}</p>
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
                        <button data-bs-toggle="modal" data-bs-target="#deleteAccountModal"
                            type="button" class="btn btn-danger"  >{{ __('Delete Account') }} </button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5 profile">
                <div class="image_wrapper" style="position: relative; display: inline-block; width: 150px; height: 150px;">
                    <img
                        src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('images/avatar.png') }}"
                        class="profile_image"
                        alt="Profile Photo"
                        id="profilePreview"
                        style="width: 100%; height: 100%;  object-fit: contain; cursor: pointer;"
                        onclick="document.getElementById('profilePhotoInput').click();"
                    >

                    <i
                        class="fa fa-pencil"
                        style="position: absolute; bottom: 10px; right: 10px; background: rgba(0, 0, 0, 0.5); color: white; padding: 5px; border-radius: 50%; cursor: pointer;"
                        onclick="document.getElementById('profilePhotoInput').click();"
                    ></i>
                </div>

                <!-- Profile Photo Form -->
                <form action="{{ route('profile.photo.update') }}" method="POST" enctype="multipart/form-data" id="photoForm">
                    @csrf
                    <input
                        type="file"
                        id="profilePhotoInput"
                        name="photo"
                        accept="image/*"
                        style="display: none;"
                        onchange="previewProfilePhoto(event)"
                        required
                    >
                    <button type="submit" class="btn w-50" id="saveButton" disabled>Select Photo</button>
                </form>

                <!-- Delete Profile Photo Form -->
                <form action="{{ route('profile.photo.delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn bg-white text-danger">Delete Profile Photo</button>
                </form>
            </div>


        </div>
    </section>


        <!-- Modal -->
        <div class="modal fade" id="deleteAccountModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ route('profile.destroy') }}" >
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
                                <x-text-input id="password" name="password" type="password" class="form-control" placeholder="{{ __('Password') }}" />
                                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <x-secondary-button class="btn btn-secondary text-dark" data-bs-dismiss="modal"> {{ __('Cancel') }}</x-secondary-button>
                            <x-danger-button class="ms-3"> {{ __('Delete Account') }} </x-danger-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

<script>
    // Preview the selected profile photo
    function previewProfilePhoto(event) {
        const file = event.target.files[0]; // Get the selected file

        // Check if a file is selected
        if (!file) {
            console.error("No file selected.");
            return;
        }

        // Ensure the file is an image
        if (!file.type.startsWith('image/')) {
            console.error("The selected file is not an image.");
            alert("Please select a valid image file.");
            return;
        }

        const reader = new FileReader();

        reader.onload = function (e) {
            const profilePreview = document.getElementById('profilePreview');

            // Update the image preview
            profilePreview.src = e.target.result;

            // Enable the save button
            const saveButton = document.getElementById('saveButton');
            saveButton.textContent = 'Save Picture';
            saveButton.disabled = false;
        };

        reader.onerror = function (e) {
            console.error("Error reading file:", e);
            alert("There was an error reading the file. Please try again.");
        };

        reader.readAsDataURL(file); // Read the file as a data URL
    }
</script>

