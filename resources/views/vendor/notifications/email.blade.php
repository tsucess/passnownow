<x-mail::message>
    {{-- Greeting --}}
    @if (!empty($greeting))
        # {{ $greeting }}
    @else
        @if ($level === 'error')
            # Whoops!
        @else
            # Hi {{ $user->name ?? 'there' }},
        @endif
    @endif

    Welcome to {{ config('app.name') }}!

    We’re excited to have you! Please verify your email to get started.

    {{-- Intro Lines --}}
    @foreach ($introLines as $line)
        {{ $line }}
    @endforeach

    {{-- Action Button --}}
    @isset($actionText)
        <?php
        $color = match ($level) {
            'success', 'error' => $level,
            default => 'primary',
        };
        ?>
        <x-mail::button :url="$actionUrl" :color="$color">
            {{ $actionText }}
        </x-mail::button>
    @endisset

    {{-- Outro Lines --}}
    {{-- @foreach ($outroLines as $line)
        {{ $line }}
    @endforeach --}}
    If you didn’t sign up for {{ config('app.name') }}, you can safely ignore this email.

    {{-- Closing --}}
    Thanks for joining us!
    **The {{ config('app.name') }} Team**

    {{-- Subcopy --}}
    @isset($actionText)
        <x-slot:subcopy>
            If you have trouble clicking **{{ $actionText }}**, copy and paste this link in your browser:
            <span class="break-all">{{ $displayableActionUrl }}</span>
        </x-slot:subcopy>
    @endisset
</x-mail::message>
