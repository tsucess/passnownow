{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 text-center ms-5 me-5 mx-auto" style = "padding-left: 200px; padding-right:200px;" >
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 ms-5 me-5 ps-5 pe-5 text-success text-center font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div class = "w-50 mx-auto mb-3">
                <div class="d-flex justify-content-between align-items-center">
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>

        </form>

        <form method="POST" action="{{ route('logout') }}" class=" align-items-center">
            @csrf

            <button type="submit" class="text-bg-secondary  rounded-3 p-2" style = "width:250px;">
                {{ __('Cancel') }}
            </button>
        </form>
    </div>


    </div>
    </div>
</x-guest-layout> --}}





<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 text-center mx-auto px-3 px-md-5">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 px-3 px-md-5 text-success text-center font-medium text-sm">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 d-flex flex-column flex-md-row justify-content-center align-items-center">
        <form method="POST" action="{{ route('verification.send') }}" class="mb-3 mb-md-0 me-md-3">
            @csrf
            <x-primary-button class="w-100 w-md-auto">
                {{ __('Resend Verification Email') }}
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-secondary w-100 w-md-auto">
                {{ __('Cancel') }}
            </button>
        </form>
    </div>
</x-guest-layout>
