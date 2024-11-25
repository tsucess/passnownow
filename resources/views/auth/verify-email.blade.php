<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 text-center ms-5 me-5" >
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

            <div class = "w-100 mx-auto mb-3">
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>

        </form>

        <form method="POST" action="{{ route('logout') }}" class="d-flex justify-content-center align-items-center">
            @csrf

            <button type="submit" class="text-bg-secondary mt-2 w-50 rounded-3 p-2">
                {{ __('Cancel') }}
            </button>
        </form>

    </div>
    </div>
</x-guest-layout>
